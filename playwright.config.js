import { defineConfig, devices } from '@playwright/test';

export default defineConfig({
    testDir: './tests/Browser',
    fullyParallel: true,
    forbidOnly: !!process.env.CI,
    retries: process.env.CI ? 2 : 0,
    workers: process.env.CI ? 1 : undefined,

    reporter: [
        ['list'],
        ['html', {
            outputFolder: 'storage/framework/testing/playwright-report',
            open: 'never',
        }],
    ],

    use: {
        baseURL: 'http://127.0.0.1:8017',
        trace: 'retain-on-failure',
        screenshot: 'only-on-failure',
        video: 'retain-on-failure',
    },

    outputDir: 'storage/framework/testing/playwright-results',

    webServer: {
        command: 'php artisan serve --host=127.0.0.1 --port=8017',
        url: 'http://127.0.0.1:8017',
        reuseExistingServer: false,
        timeout: 120000,
    },

    projects: [
        {
            name: 'chromium',
            use: {
                ...devices['Desktop Chrome'],
                viewport: {
                    width: 1366,
                    height: 768,
                },
            },
        },
        {
            name: 'firefox',
            use: {
                ...devices['Desktop Firefox'],
                viewport: {
                    width: 1366,
                    height: 768,
                },
            },
        },
        {
            name: 'webkit',
            use: {
                ...devices['Desktop Safari'],
                viewport: {
                    width: 1366,
                    height: 768,
                },
            },
        },
    ],
});
