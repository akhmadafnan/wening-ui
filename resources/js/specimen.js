import {
    getThemePreference,
    initThemePreference,
    setThemePreference,
} from './wening/theme';

const themeButtons = () => document.querySelectorAll('[data-w-theme-option]');
const densityButtons = () => document.querySelectorAll('[data-w-density-option]');

function syncThemeControls(preference) {
    for (const button of themeButtons()) {
        const selected = button.dataset.wThemeOption === preference;
        button.setAttribute('aria-pressed', selected ? 'true' : 'false');
        button.dataset.selected = selected ? 'true' : 'false';
    }
}

function syncDensityControls(density) {
    for (const button of densityButtons()) {
        const selected = button.dataset.wDensityOption === density;
        button.setAttribute('aria-pressed', selected ? 'true' : 'false');
        button.dataset.selected = selected ? 'true' : 'false';
    }
}

initThemePreference();
syncThemeControls(getThemePreference());

document.addEventListener('click', (event) => {
    const themeButton = event.target.closest('[data-w-theme-option]');

    if (themeButton) {
        syncThemeControls(setThemePreference(themeButton.dataset.wThemeOption));

        return;
    }

    const densityButton = event.target.closest('[data-w-density-option]');

    if (densityButton) {
        const density = densityButton.dataset.wDensityOption === 'compact'
            ? 'compact'
            : 'comfortable';

        document.documentElement.dataset.wDensity = density;
        syncDensityControls(density);
    }
});

syncDensityControls(document.documentElement.dataset.wDensity ?? 'comfortable');

window.addEventListener('wening:theme-change', (event) => {
    syncThemeControls(event.detail.preference);
});
