<div
    data-w-shell
    class="min-h-dvh bg-w-page text-w-fg"
>
    <div
        class="min-h-dvh lg:grid lg:grid-cols-[var(--w-shell-sidebar-expanded)_minmax(0,1fr)]"
        data-testid="app-shell"
    >
        {{ $sidebar }}

        <div class="min-w-0">
            {{ $topbar }}

            <main
                id="main-content"
                class="min-w-0"
                tabindex="-1"
            >
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
