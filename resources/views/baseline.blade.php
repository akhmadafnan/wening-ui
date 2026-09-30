<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    data-w-theme="light"
    data-w-density="comfortable"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">

    <title>Wening UI — Token Specimen</title>

    <script>
        (() => {
            try {
                const value = window.localStorage.getItem('wening-theme');
                document.documentElement.dataset.wTheme = ['light', 'dark', 'system'].includes(value)
                    ? value
                    : 'light';
            } catch {
                document.documentElement.dataset.wTheme = 'light';
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-w-page font-w-sans text-w-fg antialiased">
    <main class="mx-auto max-w-6xl px-5 py-8 sm:px-8 lg:px-10 lg:py-12">
        <header class="border-b border-w-border pb-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-2xl">
                    <p class="text-w-sm font-medium text-w-primary">Wening UI · Phase 2</p>
                    <h1 class="mt-2 text-w-3xl font-semibold tracking-tight">
                        Design tokens, without the noise.
                    </h1>
                    <p class="mt-3 max-w-xl text-w-md text-w-fg-muted">
                        A bounded verification surface for semantic color, typography, density,
                        shape, focus, motion, and Light/Dark/System theme behavior.
                    </p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-end">
                    <fieldset>
                        <legend class="mb-2 text-w-xs font-medium text-w-fg-muted">Theme</legend>
                        <div class="flex gap-2" data-testid="theme-controls">
                            @foreach (['light' => 'Light', 'dark' => 'Dark', 'system' => 'System'] as $value => $label)
                                <button
                                    type="button"
                                    data-w-theme-option="{{ $value }}"
                                    aria-pressed="false"
                                    class="rounded-w-sm border border-w-border-strong bg-w-surface px-3 py-2 text-w-sm font-medium text-w-fg transition-colors hover:border-w-primary hover:text-w-primary data-[selected=true]:border-w-primary data-[selected=true]:bg-w-primary-soft data-[selected=true]:text-w-primary-soft-fg"
                                >
                                    {{ $label }}
                                </button>
                            @endforeach
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="mb-2 text-w-xs font-medium text-w-fg-muted">Density</legend>
                        <div class="flex gap-2" data-testid="density-controls">
                            @foreach (['comfortable' => 'Comfortable', 'compact' => 'Compact'] as $value => $label)
                                <button
                                    type="button"
                                    data-w-density-option="{{ $value }}"
                                    aria-pressed="false"
                                    class="rounded-w-sm border border-w-border-strong bg-w-surface px-3 py-2 text-w-sm font-medium text-w-fg transition-colors hover:border-w-primary hover:text-w-primary data-[selected=true]:border-w-primary data-[selected=true]:bg-w-primary-soft data-[selected=true]:text-w-primary-soft-fg"
                                >
                                    {{ $label }}
                                </button>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
            </div>
        </header>

        <section class="py-9" aria-labelledby="metrics-heading">
            <div class="flex items-baseline justify-between gap-6">
                <div>
                    <h2 id="metrics-heading" class="text-w-xl font-semibold">Information-first metrics</h2>
                    <p class="mt-1 text-w-sm text-w-fg-muted">No mandatory stat-card container.</p>
                </div>
                <span class="font-w-mono text-w-xs text-w-fg-subtle">token/specimen</span>
            </div>

            <dl class="mt-7 grid grid-cols-2 gap-x-6 gap-y-8 md:grid-cols-4">
                @foreach ([
                    ['Total', '488'],
                    ['Masuk', '322'],
                    ['Keluar', '2'],
                    ['Belum masuk', '164'],
                ] as [$label, $value])
                    <div>
                        <dt class="text-w-sm text-w-fg-muted">{{ $label }}</dt>
                        <dd class="mt-1 text-w-3xl font-semibold tabular-nums tracking-tight">{{ $value }}</dd>
                    </div>
                @endforeach
            </dl>
        </section>

        <section class="border-t border-w-border py-9" aria-labelledby="surface-heading">
            <h2 id="surface-heading" class="text-w-xl font-semibold">Surface hierarchy</h2>
            <p class="mt-1 text-w-sm text-w-fg-muted">
                Page, surface, subtle, and elevated roles stay semantic across themes.
            </p>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div class="rounded-w-md border border-w-border bg-w-surface p-5">
                    <p class="text-w-xs font-medium text-w-fg-subtle">SURFACE</p>
                    <p class="mt-2 text-w-md font-medium">Primary working surface</p>
                    <p class="mt-1 text-w-sm text-w-fg-muted">Thin border, no decorative shadow.</p>
                </div>

                <div class="rounded-w-md border border-w-border bg-w-surface-subtle p-5">
                    <p class="text-w-xs font-medium text-w-fg-subtle">SUBTLE</p>
                    <p class="mt-2 text-w-md font-medium">Grouped secondary region</p>
                    <p class="mt-1 text-w-sm text-w-fg-muted">Quiet separation without a card stack.</p>
                </div>

                <div class="rounded-w-lg border border-w-border bg-w-surface-elevated p-5 shadow-w-overlay">
                    <p class="text-w-xs font-medium text-w-fg-subtle">ELEVATED</p>
                    <p class="mt-2 text-w-md font-medium">Overlay-level surface</p>
                    <p class="mt-1 text-w-sm text-w-fg-muted">Shadow is reserved for real elevation.</p>
                </div>
            </div>
        </section>

        <section class="border-t border-w-border py-9" aria-labelledby="status-heading">
            <h2 id="status-heading" class="text-w-xl font-semibold">Semantic status families</h2>
            <p class="mt-1 text-w-sm text-w-fg-muted">Strong and soft states preserve readable foreground pairings.</p>

            <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-w-md border border-w-success-border bg-w-success-soft p-4 text-w-success-soft-fg">
                    <p class="text-w-sm font-semibold">Success</p>
                    <p class="mt-1 text-w-xs">Verified / completed</p>
                </div>
                <div class="rounded-w-md border border-w-warning-border bg-w-warning-soft p-4 text-w-warning-soft-fg">
                    <p class="text-w-sm font-semibold">Warning</p>
                    <p class="mt-1 text-w-xs">Needs attention</p>
                </div>
                <div class="rounded-w-md border border-w-danger-border bg-w-danger-soft p-4 text-w-danger-soft-fg">
                    <p class="text-w-sm font-semibold">Danger</p>
                    <p class="mt-1 text-w-xs">Blocking / destructive</p>
                </div>
                <div class="rounded-w-md border border-w-info-border bg-w-info-soft p-4 text-w-info-soft-fg">
                    <p class="text-w-sm font-semibold">Info</p>
                    <p class="mt-1 text-w-xs">Context / guidance</p>
                </div>
            </div>
        </section>

        <section class="border-t border-w-border py-9" aria-labelledby="type-heading">
            <h2 id="type-heading" class="text-w-xl font-semibold">Typography scale</h2>
            <p class="mt-1 text-w-sm text-w-fg-muted">Inter-first UI stack, selective monospace for technical metadata.</p>

            <div class="mt-6 grid gap-5 lg:grid-cols-[1fr_18rem]">
                <div class="space-y-4">
                    <p class="text-w-4xl font-semibold tracking-tight">40 / 48 — exceptional display</p>
                    <p class="text-w-3xl font-semibold tracking-tight">32 / 40 — major metric</p>
                    <p class="text-w-2xl font-semibold">24 / 32 — page title</p>
                    <p class="text-w-xl font-semibold">20 / 28 — section heading</p>
                    <p class="text-w-lg font-medium">16 / 24 — emphasized body</p>
                    <p class="text-w-md">14 / 22 — default application body</p>
                    <p class="text-w-sm text-w-fg-muted">13 / 20 — secondary content</p>
                    <p class="text-w-xs text-w-fg-subtle">12 / 16 — caption and metadata</p>
                </div>

                <div class="rounded-w-md border border-w-border bg-w-surface p-5">
                    <p class="text-w-xs font-medium text-w-fg-muted">TECHNICAL METADATA</p>
                    <dl class="mt-4 space-y-3 font-w-mono text-w-xs">
                        <div>
                            <dt class="text-w-fg-subtle">commit</dt>
                            <dd class="mt-1">abb7bda</dd>
                        </div>
                        <div>
                            <dt class="text-w-fg-subtle">theme</dt>
                            <dd class="mt-1" data-testid="theme-readout">semantic</dd>
                        </div>
                        <div>
                            <dt class="text-w-fg-subtle">density</dt>
                            <dd class="mt-1">context-aware</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>

        <section class="border-t border-w-border py-9" aria-labelledby="density-heading">
            <h2 id="density-heading" class="text-w-xl font-semibold">Density and interaction substrate</h2>
            <p class="mt-1 text-w-sm text-w-fg-muted">
                Compact changes sizing rhythm, not typography readability.
            </p>

            <div class="mt-6 max-w-2xl overflow-hidden rounded-w-md border border-w-border bg-w-surface">
                @foreach ([
                    ['Proposal #2026-014', 'Ready for review'],
                    ['Proposal #2026-015', 'Needs revision'],
                    ['Proposal #2026-016', 'Validated'],
                ] as [$name, $status])
                    <div
                        class="flex items-center justify-between gap-4 border-b border-w-border px-4 last:border-b-0"
                        style="min-height: var(--w-size-data-row)"
                        data-testid="density-row"
                    >
                        <span class="text-w-sm font-medium">{{ $name }}</span>
                        <span class="text-w-xs text-w-fg-muted">{{ $status }}</span>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex flex-wrap items-center gap-3">
                <button
                    type="button"
                    class="rounded-w-md bg-w-primary px-4 py-2.5 text-w-sm font-medium text-w-primary-fg transition-colors hover:bg-w-primary-hover active:bg-w-primary-active"
                    data-testid="focus-probe"
                >
                    Focus probe
                </button>

                <label class="text-w-sm font-medium" for="token-input">Strong control boundary</label>
                <input
                    id="token-input"
                    type="text"
                    value="Semantic tokens"
                    class="rounded-w-md border border-w-border-strong bg-w-surface px-3 py-2 text-w-sm text-w-fg"
                >
            </div>
        </section>

        <footer class="border-t border-w-border pt-6 text-w-xs text-w-fg-subtle">
            Verification surface only — no public reusable component contract is defined here.
        </footer>
    </main>
</body>
</html>
