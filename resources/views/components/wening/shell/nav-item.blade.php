@props([
    'href' => '#',
    'label',
    'current' => false,
])

<a
    href="{{ $href }}"
    aria-label="{{ $label }}"
    data-w-shell-nav-item
    @if ($current) aria-current="page" @endif
    @class([
        'flex min-h-[var(--w-shell-nav-row)] items-center gap-3 rounded-w-md px-3 text-w-sm font-medium transition-colors',
        'text-w-primary-soft-fg bg-w-primary-soft' => $current,
        'text-w-fg-muted hover:bg-w-surface-subtle hover:text-w-fg' => ! $current,
    ])
>
    @isset($icon)
        <span class="flex size-5 shrink-0 items-center justify-center" aria-hidden="true">
            {{ $icon }}
        </span>
    @endisset

    <span class="min-w-0 truncate" data-w-shell-expanded-only>{{ $label }}</span>
</a>
