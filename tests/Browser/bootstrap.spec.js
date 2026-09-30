import AxeBuilder from '@axe-core/playwright';
import { expect, test } from '@playwright/test';

test('Laravel bootstrap renders without runtime or accessibility errors', async ({ page }) => {
    const consoleErrors = [];
    const pageErrors = [];
    const failedApplicationRequests = [];

    page.on('console', (message) => {
        if (message.type() === 'error') {
            consoleErrors.push(message.text());
        }
    });

    page.on('pageerror', (error) => {
        pageErrors.push(error.message);
    });

    page.on('requestfailed', (request) => {
        if (request.url().startsWith('http://127.0.0.1:8017')) {
            failedApplicationRequests.push(
                `${request.method()} ${request.url()} — ${request.failure()?.errorText ?? 'unknown error'}`
            );
        }
    });

    const response = await page.goto('/');

    expect(response).not.toBeNull();
    expect(response.ok()).toBe(true);

    await expect(page.locator('body')).toBeVisible();

    const accessibility = await new AxeBuilder({ page })
        .withTags([
            'wcag2a',
            'wcag2aa',
            'wcag21a',
            'wcag21aa',
        ])
        .analyze();

    expect(accessibility.violations).toEqual([]);
    expect(consoleErrors).toEqual([]);
    expect(pageErrors).toEqual([]);
    expect(failedApplicationRequests).toEqual([]);
});
