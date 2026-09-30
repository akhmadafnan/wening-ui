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

    <title>Wening UI — Application Shell</title>

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
    <x-wening.shell.app>
        <x-slot:sidebar>
            <x-wening.shell.sidebar
                brand="Wening UI"
                subtitle="Application shell"
            >
                <x-wening.shell.sidebar-section>
                    <x-wening.shell.nav-item
                        :href="route('shell')"
                        label="Overview"
                        :current="request()->routeIs('shell')"
                    >
                        <x-slot:icon>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="3" width="7" height="7" rx="1.5" />
                                <rect x="14" y="3" width="7" height="7" rx="1.5" />
                                <rect x="3" y="14" width="7" height="7" rx="1.5" />
                                <rect x="14" y="14" width="7" height="7" rx="1.5" />
                            </svg>
                        </x-slot:icon>
                    </x-wening.shell.nav-item>
                </x-wening.shell.sidebar-section>

                <x-wening.shell.sidebar-section label="Workspace">
                    <x-wening.shell.nav-item href="#" label="Submissions">
                        <x-slot:icon>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M5 4.5h9l5 5V19a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 4 19V6A1.5 1.5 0 0 1 5.5 4.5Z" />
                                <path d="M14 4.5V10h5" />
                            </svg>
                        </x-slot:icon>
                    </x-wening.shell.nav-item>

                    <x-wening.shell.nav-item href="#" label="Reviews">
                        <x-slot:icon>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M4 5.5h16v11H9l-5 4v-15Z" />
                                <path d="M8 9h8M8 12.5h5" />
                            </svg>
                        </x-slot:icon>
                    </x-wening.shell.nav-item>

                    <x-wening.shell.nav-item href="#" label="Reports">
                        <x-slot:icon>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M5 19.5V11M12 19.5V5M19 19.5v-7" />
                            </svg>
                        </x-slot:icon>
                    </x-wening.shell.nav-item>
                </x-wening.shell.sidebar-section>

                <x-wening.shell.sidebar-section label="System">
                    <x-wening.shell.nav-item
                        :href="route('tokens')"
                        label="Design tokens"
                    >
                        <x-slot:icon>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" />
                                <path d="m4 7.5 8 4.5 8-4.5M12 12v9" />
                            </svg>
                        </x-slot:icon>
                    </x-wening.shell.nav-item>

                    <x-wening.shell.nav-item href="#" label="Settings">
                        <x-slot:icon>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="3" />
                                <path d="M19 12a7.2 7.2 0 0 0-.1-1.2l2-1.5-2-3.4-2.4 1a7.8 7.8 0 0 0-2-1.2L14.2 3h-4.4l-.4 2.7a7.8 7.8 0 0 0-2 1.2l-2.4-1-2 3.4 2 1.5A7.2 7.2 0 0 0 5 12c0 .4 0 .8.1 1.2l-2 1.5 2 3.4 2.4-1a7.8 7.8 0 0 0 2 1.2l.4 2.7h4.4l.4-2.7a7.8 7.8 0 0 0 2-1.2l2.4 1 2-3.4-2-1.5c.1-.4.1-.8.1-1.2Z" />
                            </svg>
                        </x-slot:icon>
                    </x-wening.shell.nav-item>
                </x-wening.shell.sidebar-section>

                <x-slot:footer>
                    <div class="flex items-center gap-3 rounded-w-md px-2 py-2">
                        <div
                            class="flex size-9 shrink-0 items-center justify-center rounded-full bg-w-primary-soft text-w-sm font-semibold text-w-primary-soft-fg"
                            aria-hidden="true"
                        >
                            AU
                        </div>
                        <div class="min-w-0">
                            <p class="truncate text-w-sm font-medium text-w-fg">Application User</p>
                            <p class="truncate text-w-xs text-w-fg-muted">Administrator</p>
                        </div>
                    </div>
                </x-slot:footer>
            </x-wening.shell.sidebar>
        </x-slot:sidebar>

        <x-slot:topbar>
            <x-wening.shell.topbar>
                <x-slot:context>
                    <div>
                        <p class="truncate text-w-sm font-semibold text-w-fg">Wening Workspace</p>
                        <p class="truncate text-w-xs text-w-fg-muted">Reference application</p>
                    </div>
                </x-slot:context>

                <x-slot:actions>
                    <a
                        href="{{ route('tokens') }}"
                        class="hidden text-w-sm font-medium text-w-fg-muted transition-colors hover:text-w-fg sm:inline"
                    >
                        Tokens
                    </a>

                    <fieldset>
                        <legend class="sr-only">Theme</legend>
                        <div class="flex rounded-w-md border border-w-border bg-w-surface p-1" data-testid="shell-theme-controls">
                            @foreach (['light' => 'Light', 'dark' => 'Dark', 'system' => 'System'] as $value => $label)
                                <button
                                    type="button"
                                    data-w-theme-option="{{ $value }}"
                                    aria-pressed="false"
                                    class="rounded-w-sm px-2 py-1 text-w-xs font-medium text-w-fg-muted transition-colors hover:text-w-fg data-[selected=true]:bg-w-primary-soft data-[selected=true]:text-w-primary-soft-fg"
                                >
                                    {{ $label }}
                                </button>
                            @endforeach
                        </div>
                    </fieldset>

                    <div
                        class="flex size-9 items-center justify-center rounded-full bg-w-primary-soft text-w-xs font-semibold text-w-primary-soft-fg"
                        aria-label="Application User"
                    >
                        AU
                    </div>
                </x-slot:actions>
            </x-wening.shell.topbar>
        </x-slot:topbar>

        <x-wening.shell.content>
            <x-wening.shell.page-header
                title="Overview"
                description="A calm application frame for serious administrative work."
            />

            <section class="mt-8" aria-labelledby="summary-heading">
                <div class="flex items-end justify-between gap-4">
                    <div>
                        <h2 id="summary-heading" class="text-w-lg font-semibold text-w-fg">Today at a glance</h2>
                        <p class="mt-1 text-w-sm text-w-fg-muted">Information-first metrics stay unboxed by default.</p>
                    </div>
                    <span class="font-w-mono text-w-xs text-w-fg-subtle">phase/03-shell</span>
                </div>

                <dl class="mt-6 grid grid-cols-2 gap-x-6 gap-y-7 md:grid-cols-4">
                    @foreach ([
                        ['Open items', '18'],
                        ['Awaiting review', '7'],
                        ['Completed', '42'],
                        ['Attention', '3'],
                    ] as [$label, $value])
                        <div>
                            <dt class="text-w-sm text-w-fg-muted">{{ $label }}</dt>
                            <dd class="mt-1 text-w-3xl font-semibold tabular-nums tracking-tight text-w-fg">{{ $value }}</dd>
                        </div>
                    @endforeach
                </dl>
            </section>

            <section class="mt-9 border-t border-w-border pt-8" aria-labelledby="activity-heading">
                <div>
                    <h2 id="activity-heading" class="text-w-lg font-semibold text-w-fg">Recent work</h2>
                    <p class="mt-1 text-w-sm text-w-fg-muted">
                        Representative content only; the data-system component layer belongs to Phase 5.
                    </p>
                </div>

                <div class="mt-5 overflow-hidden rounded-w-md border border-w-border bg-w-surface">
                    @foreach ([
                        ['Submission 2026-014', 'Ready for review', 'Today, 14:20'],
                        ['Submission 2026-012', 'Revision received', 'Today, 11:05'],
                        ['Report September', 'Generated', 'Yesterday, 16:45'],
                    ] as [$name, $status, $time])
                        <div class="flex flex-col gap-2 border-b border-w-border px-4 py-4 last:border-b-0 sm:flex-row sm:items-center sm:justify-between">
                            <div class="min-w-0">
                                <p class="truncate text-w-sm font-medium text-w-fg">{{ $name }}</p>
                                <p class="mt-0.5 text-w-xs text-w-fg-muted">{{ $status }}</p>
                            </div>
                            <time class="shrink-0 font-w-mono text-w-xs text-w-fg-subtle">{{ $time }}</time>
                        </div>
                    @endforeach
                </div>
            </section>
        </x-wening.shell.content>
    </x-wening.shell.app>
</body>
</html>
