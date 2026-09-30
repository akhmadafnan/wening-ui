# Wening UI — Motion, Focus & Interaction-State Tokens

**Phase:** 2E
**Tracking issue:** #10
**Status:** SPEC_READY

## Objective

Freeze a restrained motion/focus system that explains change without making serious work interfaces feel animated for animation's sake.

## Motion principle

Motion is allowed when it clarifies:

- state change;
- appearance/disappearance;
- spatial relationship;
- progressive disclosure;
- feedback that an action occurred.

Motion is not used as decorative personality in normal application workflows.

## Duration scale

| Token | Value | Intended use |
|---|---:|---|
| `--w-motion-instant` | 0ms | immediate state |
| `--w-motion-fast` | 120ms | hover/press/color |
| `--w-motion-normal` | 180ms | small reveal/overlay state |
| `--w-motion-slow` | 240ms | larger local transition |
| `--w-motion-deliberate` | 320ms | rare larger spatial change |

320ms is an upper reference, not a default.

## Easing scale

```css
--w-ease-standard: cubic-bezier(0.2, 0, 0, 1);
--w-ease-enter: cubic-bezier(0, 0, 0.2, 1);
--w-ease-exit: cubic-bezier(0.4, 0, 1, 1);
--w-ease-linear: linear;
```

Use:

- standard: ordinary state transitions;
- enter: appearing/revealing;
- exit: disappearing;
- linear: progress/continuous technical movement only.

## Transition categories

Normal Wening transitions should be narrow rather than `transition: all`.

Allowed common categories:

- color/background/border: fast;
- opacity: fast/normal;
- transform for small disclosure/overlay: normal;
- shadow/elevation: fast/normal.

Avoid animating layout dimensions by default because they are more expensive and can make work UIs feel sluggish.

## Transform restraint

Normal state feedback should not use exaggerated scale/bounce.

Guidance:

- button/control press may use a very small translation/scale only if it does not disturb layout;
- hover should not make cards float dramatically;
- operational/data screens prioritize stability;
- no spring/bounce baseline in Wening core.

## Reduced-motion contract

Wening respects `prefers-reduced-motion: reduce`.

Under reduced motion:

- Wening duration variables resolve to effectively immediate changes;
- non-essential transforms/animations are removed;
- no functionality depends on an animation completing;
- state remains understandable without motion;
- continuous decorative animation is prohibited.

Reference behavior:

```css
@media (prefers-reduced-motion: reduce) {
    :root {
        --w-motion-fast: 0ms;
        --w-motion-normal: 0ms;
        --w-motion-slow: 0ms;
        --w-motion-deliberate: 0ms;
    }
}
```

Components must not depend on CSS `transitionend` for correctness.

## Focus contract

Keyboard focus must be obvious, stable, and theme-aware.

Tokens:

```css
--w-focus-width: 2px;
--w-focus-offset: 2px;
--w-focus-style: solid;
```

Color comes from:

```css
--w-color-focus-ring
```

Reference rendering direction:

```css
outline: var(--w-focus-width) var(--w-focus-style) var(--w-color-focus-ring);
outline-offset: var(--w-focus-offset);
```

The exact component selector is defined later, but the token contract is fixed here.

## Focus rules

- Never remove focus visibility without a replacement.
- Prefer `:focus-visible` for author styling where appropriate.
- Focus must not rely solely on subtle shadow/glow.
- Focus treatment must remain discernible on page, surface, and elevated surfaces.
- Focus must not be clipped by routine overflow decisions.
- Later overlay/sticky components must satisfy focus-not-obscured behavior.

## Interaction-state semantics

### Hover

- Hover is enhancement, not the only cue.
- Touch devices must not depend on hover.
- Color changes should use semantic hover roles.
- Avoid large positional movement.

### Active / pressed

- Active state should be perceptible immediately.
- Primary actions use semantic active roles.
- Pressed state must not imply success/completion until the actual action succeeds.

### Disabled

- Disabled state uses dedicated disabled semantic colors.
- Disabled state is not the same as loading.
- Disabled controls should not receive normal hover/active styling.
- Inactive UI is intentionally lower emphasis but remains understandable.

### Selected / current

Selection/current-state semantics are separate from hover/active.

Future components should combine:

- semantic color/state;
- shape/icon/text cues when meaning would otherwise depend on color alone;
- appropriate ARIA/programmatic state.

## Loading/progress boundary

Phase 2 does not define spinner/progress components.

Later loading indicators must:

- use the motion scale;
- respect reduced motion;
- keep status available programmatically;
- avoid making continuous animation the only indication of loading.

## Tailwind integration direction

Phase 2F may map duration/easing tokens into Tailwind theme variables where useful.

Wening core should prefer semantic Wening motion values over arbitrary per-component durations.

## Verification requirements

Phase 2G must prove at minimum:

- focus-visible token rendering;
- focus ring contrast/visibility on representative Light/Dark surfaces;
- reduced-motion media behavior;
- theme switching does not leave stale focus colors;
- no runtime error when OS motion preference changes.

## Non-scope

This phase does not implement Button, Dialog, Dropdown, Toast, Spinner, or other reusable interaction components.

It freezes the interaction-state substrate those later components consume.
