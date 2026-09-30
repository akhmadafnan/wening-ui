@props([
    'label' => null,
])

<section {{ $attributes->class(['mt-5 first:mt-0']) }}>
    @if ($label)
        <h2 class="mb-2 px-3 text-w-xs font-medium uppercase tracking-[0.04em] text-w-fg-subtle">
            {{ $label }}
        </h2>
    @endif

    <div class="space-y-1">
        {{ $slot }}
    </div>
</section>
