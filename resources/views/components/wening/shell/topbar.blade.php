<header
    class="flex h-[var(--w-shell-topbar-height)] items-center justify-between gap-4 border-b border-w-border bg-w-surface px-4 sm:px-6 lg:px-6 2xl:px-8"
    data-testid="shell-topbar"
>
    <div class="min-w-0">
        {{ $context ?? '' }}
    </div>

    <div class="flex shrink-0 items-center gap-3">
        {{ $actions ?? '' }}
    </div>
</header>
