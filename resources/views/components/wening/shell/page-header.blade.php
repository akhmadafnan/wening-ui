@props([
    'title',
    'description' => null,
])

<div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
    <div class="min-w-0">
        <h1 class="text-w-2xl font-semibold tracking-tight text-w-fg">
            {{ $title }}
        </h1>

        @if ($description)
            <p class="mt-1 max-w-3xl text-w-sm text-w-fg-muted">
                {{ $description }}
            </p>
        @endif
    </div>

    @isset($actions)
        <div class="shrink-0">
            {{ $actions }}
        </div>
    @endisset
</div>
