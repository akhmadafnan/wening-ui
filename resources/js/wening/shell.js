const STORAGE_KEY = 'wening-shell-sidebar';
const VALID_PREFERENCES = new Set(['expanded', 'collapsed']);

export function normalizeShellSidebarPreference(value) {
    return VALID_PREFERENCES.has(value) ? value : 'expanded';
}

export function getShellSidebarPreference() {
    try {
        return normalizeShellSidebarPreference(window.localStorage.getItem(STORAGE_KEY));
    } catch {
        return 'expanded';
    }
}

export function applyShellSidebarPreference(preference, { persist = false } = {}) {
    const normalized = normalizeShellSidebarPreference(preference);
    const expanded = normalized === 'expanded';

    document.documentElement.dataset.wShellSidebar = normalized;

    for (const button of document.querySelectorAll('[data-w-shell-toggle]')) {
        button.setAttribute('aria-expanded', expanded ? 'true' : 'false');
        button.setAttribute('aria-label', expanded ? 'Collapse sidebar' : 'Expand sidebar');
        button.dataset.state = normalized;
    }

    if (persist) {
        try {
            window.localStorage.setItem(STORAGE_KEY, normalized);
        } catch {
            // Storage can be unavailable while the applied page state remains valid.
        }
    }

    window.dispatchEvent(new CustomEvent('wening:shell-sidebar-change', {
        detail: { preference: normalized },
    }));

    return normalized;
}

export function setShellSidebarPreference(preference) {
    return applyShellSidebarPreference(preference, { persist: true });
}

export function toggleShellSidebarPreference() {
    return setShellSidebarPreference(
        getShellSidebarPreference() === 'expanded' ? 'collapsed' : 'expanded',
    );
}

export function initShellSidebarPreference() {
    return applyShellSidebarPreference(getShellSidebarPreference());
}

document.addEventListener('click', (event) => {
    const toggle = event.target.closest('[data-w-shell-toggle]');

    if (toggle) {
        toggleShellSidebarPreference();
    }
});

window.addEventListener('storage', (event) => {
    if (event.key === STORAGE_KEY) {
        applyShellSidebarPreference(event.newValue);
    }
});
