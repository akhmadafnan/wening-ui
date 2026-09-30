@props([
    'brand' => 'Wening UI',
    'subtitle' => 'Application',
])

<aside
    id="desktop-sidebar"
    class="hidden h-dvh w-[var(--w-shell-sidebar-current)] flex-col border-r border-w-border bg-w-surface lg:flex"
    aria-label="Application sidebar"
    data-w-shell-sidebar
    data-testid="desktop-sidebar"
>
    <div
        class="flex h-[var(--w-shell-topbar-height)] shrink-0 items-center gap-3 border-b border-w-border px-4"
        data-w-shell-brand
    >
        <div
            class="flex size-9 shrink-0 items-center justify-center rounded-w-md bg-w-primary-soft font-w-display text-w-sm font-semibold text-w-primary-soft-fg"
            aria-hidden="true"
        >
            W
        </div>

        <div class="min-w-0" data-w-shell-expanded-only>
            <p class="truncate text-w-md font-semibold text-w-fg">{{ $brand }}</p>
            <p class="truncate text-w-xs text-w-fg-muted">{{ $subtitle }}</p>
        </div>
    </div>

    <nav
        aria-label="Primary navigation"
        class="min-h-0 flex-1 overflow-y-auto px-3 py-4"
    >
        {{ $slot }}
    </nav>

    <div class="shrink-0 border-t border-w-border p-3">
        <button
            type="button"
            class="flex min-h-[var(--w-shell-nav-row)] w-full items-center gap-3 rounded-w-md px-3 text-w-sm font-medium text-w-fg-muted transition-colors hover:bg-w-surface-subtle hover:text-w-fg"
            aria-controls="desktop-sidebar"
            aria-expanded="true"
            aria-label="Collapse sidebar"
            data-w-shell-toggle
        >
            <span class="flex size-5 shrink-0 items-center justify-center" aria-hidden="true">
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    data-w-shell-toggle-icon
                >
                    <path d="m14.5 6-6 6 6 6" />
                </svg>
            </span>
            <span data-w-shell-expanded-only>Collapse sidebar</span>
        </button>

        @isset($footer)
            <div class="mt-2" data-w-shell-footer>
                {{ $footer }}
            </div>
        @endisset
    </div>
</aside>
