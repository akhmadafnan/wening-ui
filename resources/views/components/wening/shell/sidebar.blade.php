@props([
    'brand' => 'Wening UI',
    'subtitle' => 'Application',
])

<aside
    class="hidden h-dvh w-[var(--w-shell-sidebar-expanded)] flex-col border-r border-w-border bg-w-surface lg:flex"
    aria-label="Application sidebar"
    data-testid="desktop-sidebar"
>
    <div class="flex h-[var(--w-shell-topbar-height)] shrink-0 items-center gap-3 border-b border-w-border px-4">
        <div
            class="flex size-9 shrink-0 items-center justify-center rounded-w-md bg-w-primary-soft font-w-display text-w-sm font-semibold text-w-primary-soft-fg"
            aria-hidden="true"
        >
            W
        </div>

        <div class="min-w-0">
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

    @isset($footer)
        <div class="shrink-0 border-t border-w-border p-3">
            {{ $footer }}
        </div>
    @endisset
</aside>
