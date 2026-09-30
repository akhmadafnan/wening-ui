<div
    data-w-shell
    class="min-h-dvh w-full bg-w-page text-w-fg"
>
    <div
        class="min-h-dvh w-full lg:grid lg:grid-cols-[var(--w-shell-sidebar-current)_minmax(0,1fr)]"
        data-w-shell-grid
        data-testid="app-shell"
    >
        {{ $sidebar }}

        <div class="min-w-0 w-full">
            {{ $topbar }}

            <main
                id="main-content"
                class="min-w-0 w-full"
                tabindex="-1"
                data-w-shell-main
            >
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
