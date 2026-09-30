import { expect, test } from '@playwright/test';

async function resetTheme(page) {
    await page.addInitScript(() => {
        window.localStorage.removeItem('wening-theme');
    });
}

async function contrastRatio(page, foregroundSelector, backgroundSelector) {
    return page.evaluate(({ foregroundSelector, backgroundSelector }) => {
        const parseRgb = (value) => {
            const channels = value.match(/[\d.]+/g)?.slice(0, 3).map(Number);

            if (!channels || channels.length !== 3) {
                throw new Error(`Unable to parse color: ${value}`);
            }

            return channels.map((channel) => channel / 255);
        };

        const linearize = (channel) => (
            channel <= 0.04045
                ? channel / 12.92
                : ((channel + 0.055) / 1.055) ** 2.4
        );

        const luminance = (value) => {
            const [red, green, blue] = parseRgb(value).map(linearize);

            return (0.2126 * red) + (0.7152 * green) + (0.0722 * blue);
        };

        const foreground = getComputedStyle(document.querySelector(foregroundSelector)).color;
        const background = getComputedStyle(document.querySelector(backgroundSelector)).backgroundColor;

        const lighter = Math.max(luminance(foreground), luminance(background));
        const darker = Math.min(luminance(foreground), luminance(background));

        return (lighter + 0.05) / (darker + 0.05);
    }, { foregroundSelector, backgroundSelector });
}

test('defaults to the light Wening theme when no preference is stored', async ({ page }) => {
    await resetTheme(page);
    await page.goto('/tokens');

    await expect(page.locator('html')).toHaveAttribute('data-w-theme', 'light');

    const background = await page.locator('body').evaluate((element) => getComputedStyle(element).backgroundColor);

    expect(background).toBe('rgb(247, 248, 250)');
});

test('persists and applies an explicit dark preference', async ({ page }) => {
    await resetTheme(page);
    await page.goto('/tokens');

    await page.getByRole('button', { name: 'Dark' }).click();

    await expect(page.locator('html')).toHaveAttribute('data-w-theme', 'dark');

    const persisted = await page.evaluate(() => window.localStorage.getItem('wening-theme'));
    const background = await page.locator('body').evaluate((element) => getComputedStyle(element).backgroundColor);

    expect(persisted).toBe('dark');
    expect(background).toBe('rgb(10, 14, 26)');
});

test('system preference follows live operating-system color-scheme changes', async ({ page }) => {
    await resetTheme(page);
    await page.emulateMedia({ colorScheme: 'dark' });
    await page.goto('/tokens');

    await page.getByRole('button', { name: 'System' }).click();
    await expect(page.locator('html')).toHaveAttribute('data-w-theme', 'system');

    let background = await page.locator('body').evaluate((element) => getComputedStyle(element).backgroundColor);
    expect(background).toBe('rgb(10, 14, 26)');

    await page.emulateMedia({ colorScheme: 'light' });

    await expect.poll(async () => (
        page.locator('body').evaluate((element) => getComputedStyle(element).backgroundColor)
    )).toBe('rgb(247, 248, 250)');
});

test('compact density remaps the shared data-row sizing contract', async ({ page }) => {
    await resetTheme(page);
    await page.goto('/tokens');

    const row = page.getByTestId('density-row').first();

    expect(await row.evaluate((element) => getComputedStyle(element).minHeight)).toBe('48px');

    await page.getByRole('button', { name: 'Compact' }).click();

    await expect(page.locator('html')).toHaveAttribute('data-w-density', 'compact');
    expect(await row.evaluate((element) => getComputedStyle(element).minHeight)).toBe('40px');
});

test('reduced motion collapses Wening transition duration tokens', async ({ page }) => {
    await resetTheme(page);
    await page.emulateMedia({ reducedMotion: 'reduce' });
    await page.goto('/tokens');

    const duration = await page.locator('html').evaluate((element) => (
        getComputedStyle(element).getPropertyValue('--w-motion-normal').trim()
    ));

    expect(Number.parseFloat(duration)).toBe(0);
});

test('keyboard focus receives the Wening focus treatment', async ({ page }) => {
    await resetTheme(page);
    await page.goto('/tokens');

    await page.keyboard.press('Tab');

    const activeElement = page.locator(':focus');
    await expect(activeElement).toHaveAttribute('data-w-theme-option', 'light');

    const focus = await activeElement.evaluate((element) => {
        const style = getComputedStyle(element);

        return {
            width: style.outlineWidth,
            style: style.outlineStyle,
        };
    });

    expect(focus.width).toBe('2px');
    expect(focus.style).toBe('solid');
});

test('representative semantic text pairs meet normal-text contrast in light and dark', async ({ page }) => {
    await resetTheme(page);
    await page.goto('/tokens');

    for (const theme of ['light', 'dark']) {
        await page.getByRole('button', { name: theme === 'light' ? 'Light' : 'Dark' }).click();

        const bodyRatio = await contrastRatio(page, 'body', 'body');
        const primaryRatio = await contrastRatio(page, '[data-testid="focus-probe"]', '[data-testid="focus-probe"]');

        expect(bodyRatio).toBeGreaterThanOrEqual(4.5);
        expect(primaryRatio).toBeGreaterThanOrEqual(4.5);
    }
});


test('reference primary identity resolves to the accepted institutional green in light and dark', async ({ page }) => {
    await resetTheme(page);
    await page.goto('/tokens');

    const probe = page.getByTestId('focus-probe');

    await page.getByRole('button', { name: 'Light' }).click();
    expect(await probe.evaluate((element) => getComputedStyle(element).backgroundColor))
        .toBe('rgb(15, 122, 69)');

    await page.getByRole('button', { name: 'Dark' }).click();

    await expect.poll(async () => (
        probe.evaluate((element) => getComputedStyle(element).backgroundColor)
    )).toBe('rgb(102, 196, 147)');
});

test('typography exposes Sora display and Inter UI roles', async ({ page }) => {
    await resetTheme(page);
    await page.goto('/tokens');

    const displayFamily = await page.locator('h1').evaluate((element) => getComputedStyle(element).fontFamily);
    const bodyFamily = await page.locator('body').evaluate((element) => getComputedStyle(element).fontFamily);

    expect(displayFamily).toContain('Sora');
    expect(bodyFamily).toContain('Inter');
});
