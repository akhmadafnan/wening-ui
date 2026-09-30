import { expect, test } from '@playwright/test';

test('desktop shell renders the frozen sidebar and topbar geometry', async ({ page }) => {
    await page.setViewportSize({ width: 1366, height: 768 });
    await page.goto('/');

    const sidebar = page.getByTestId('desktop-sidebar');
    const topbar = page.getByTestId('shell-topbar');

    await expect(sidebar).toBeVisible();
    await expect(topbar).toBeVisible();

    const sidebarBox = await sidebar.boundingBox();
    const topbarBox = await topbar.boundingBox();

    expect(sidebarBox).not.toBeNull();
    expect(topbarBox).not.toBeNull();
    expect(Math.round(sidebarBox.width)).toBe(256);
    expect(Math.round(topbarBox.height)).toBe(64);
});

test('shell exposes semantic application landmarks and current navigation', async ({ page }) => {
    await page.goto('/');

    await expect(page.getByRole('navigation', { name: 'Primary navigation' })).toBeVisible();
    await expect(page.getByRole('main')).toBeVisible();
    await expect(page.getByRole('heading', { level: 1, name: 'Overview' })).toBeVisible();

    const current = page.getByRole('link', { name: 'Overview' });

    await expect(current).toHaveAttribute('aria-current', 'page');
});

test('shell keeps the accepted theme runtime active', async ({ page }) => {
    await page.goto('/');

    await expect(page.locator('html')).toHaveAttribute('data-w-theme', 'light');

    await page.getByRole('button', { name: 'Dark' }).click();

    await expect(page.locator('html')).toHaveAttribute('data-w-theme', 'dark');
    await expect.poll(async () => (
        page.locator('body').evaluate((element) => getComputedStyle(element).backgroundColor)
    )).toBe('rgb(10, 14, 26)');
});

test('token specimen remains available as a separate verification route', async ({ page }) => {
    const response = await page.goto('/tokens');

    expect(response).not.toBeNull();
    expect(response.ok()).toBe(true);
    await expect(page.getByRole('heading', { level: 1, name: 'Design tokens, without the noise.' })).toBeVisible();
});


test('desktop sidebar collapse persists without changing server-owned current navigation', async ({ page }) => {
    await page.setViewportSize({ width: 1366, height: 768 });
    await page.goto('/');

    const sidebar = page.getByTestId('desktop-sidebar');
    const collapse = page.getByRole('button', { name: 'Collapse sidebar' });

    await collapse.click();

    await expect(page.locator('html')).toHaveAttribute('data-w-shell-sidebar', 'collapsed');

    const expand = page.getByRole('button', { name: 'Expand sidebar' });

    await expect(expand).toHaveAttribute('aria-expanded', 'false');
    await expect.poll(async () => {
        const box = await sidebar.boundingBox();

        return box ? Math.round(box.width) : null;
    }).toBe(72);

    expect(await page.evaluate(() => window.localStorage.getItem('wening-shell-sidebar')))
        .toBe('collapsed');

    await expect(page.getByRole('link', { name: 'Overview' }))
        .toHaveAttribute('aria-current', 'page');

    await page.reload();

    await expect(page.locator('html')).toHaveAttribute('data-w-shell-sidebar', 'collapsed');
    await expect(page.getByRole('button', { name: 'Expand sidebar' })).toHaveAttribute('aria-expanded', 'false');
    await expect.poll(async () => {
        const box = await page.getByTestId('desktop-sidebar').boundingBox();

        return box ? Math.round(box.width) : null;
    }).toBe(72);
});
