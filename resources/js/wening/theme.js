const STORAGE_KEY = 'wening-theme';
const VALID_PREFERENCES = new Set(['light', 'dark', 'system']);

export function normalizeThemePreference(value) {
    return VALID_PREFERENCES.has(value) ? value : 'light';
}

export function getThemePreference() {
    try {
        return normalizeThemePreference(window.localStorage.getItem(STORAGE_KEY));
    } catch {
        return 'light';
    }
}

export function applyThemePreference(preference, { persist = false } = {}) {
    const normalized = normalizeThemePreference(preference);

    document.documentElement.dataset.wTheme = normalized;

    if (persist) {
        try {
            window.localStorage.setItem(STORAGE_KEY, normalized);
        } catch {
            // Storage may be unavailable; the applied theme remains valid for this page.
        }
    }

    window.dispatchEvent(new CustomEvent('wening:theme-change', {
        detail: { preference: normalized },
    }));

    return normalized;
}

export function setThemePreference(preference) {
    return applyThemePreference(preference, { persist: true });
}

export function initThemePreference() {
    return applyThemePreference(getThemePreference());
}

window.addEventListener('storage', (event) => {
    if (event.key === STORAGE_KEY) {
        applyThemePreference(event.newValue);
    }
});
