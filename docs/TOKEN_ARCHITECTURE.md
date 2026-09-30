# Wening UI — Token Architecture

**Phase:** 2A — Token Architecture & Naming Contract
**Status:** SPEC_READY
**Tracking issue:** #6

## Purpose

This document defines the canonical contract between raw design values, Wening semantic roles, Tailwind CSS utilities, theme switching, and future Wening components.

The goal is to let later components consume stable intent-based tokens while Light, Dark, System, and product branding can change values without rewriting component structure.

## Architecture summary

Wening uses three conceptual token layers:

```text
REFERENCE / PRIMITIVE VALUES
          ↓
WENING SEMANTIC TOKENS
          ↓
TAILWIND ALIASES / FUTURE COMPONENT CONSUMPTION
```

The canonical runtime contract is the **Wening semantic-token layer**, not Tailwind's default palette.

## 1. Namespace contract

All canonical Wening CSS custom properties use the `--w-` prefix.

Required naming families:

```text
--w-ref-*       reference/primitive values
--w-color-*     semantic color roles
--w-font-*      semantic font roles
--w-text-*      semantic type metrics
--w-space-*     Wening spacing steps/roles
--w-size-*      semantic sizing where justified
--w-radius-*    radius scale
--w-border-*    border widths/styles where tokenized
--w-shadow-*    elevation/shadow scale
--w-z-*         layering tokens where justified
--w-motion-*    duration/easing/motion values
--w-focus-*     focus treatment values
```

Future component-specific variables, when genuinely needed, use:

```text
--w-<component>-*
```

Component-token catalogs are **not** pre-created in Phase 2.

## 2. Reference / primitive layer

Reference tokens store raw design values such as neutral ramps, accent ramps, spacing increments, radius values, and motion durations.

Example shape:

```css
--w-ref-neutral-0: ...;
--w-ref-neutral-950: ...;
--w-ref-brand-500: ...;
```

Reference tokens are implementation inputs.

Rules:

- Wening component markup must not normally consume reference colors directly.
- A theme may remap semantic roles to different reference values.
- Reference values may change without forcing public component markup changes.
- Reference token names describe the value family/step, not UI intent.

## 3. Semantic layer

Semantic tokens describe UI intent and are the default public consumption contract.

Initial color-role families to be completed in Phase 2B:

```text
page
surface
surface-subtle
surface-elevated

fg
fg-muted
fg-subtle
fg-inverse

border
border-strong

primary
primary-hover
primary-active
primary-soft
primary-fg

success
warning
danger
info
(and required soft/border/foreground companions)

link
focus-ring
selection

disabled-bg
disabled-fg
disabled-border
```

Naming rule:

- use role/intent names;
- do not encode Light/Dark into token names;
- do not encode a product's brand name into core semantic token names;
- do not name core semantic roles after a raw hue such as `purple`, `green`, or `slate`.

## 4. Tailwind integration

Tailwind CSS is a **consumer-facing styling engine**, not Wening's canonical token store.

Wening keeps normal CSS custom properties for runtime semantics and maps selected semantic variables into Tailwind's theme-variable namespaces.

Canonical pattern:

```css
:root {
    --w-color-page: ...;
    --w-color-fg: ...;
    --w-color-primary: ...;
}

@theme inline {
    --color-w-page: var(--w-color-page);
    --color-w-fg: var(--w-color-fg);
    --color-w-primary: var(--w-color-primary);
}
```

This exposes utilities such as:

```text
bg-w-page
text-w-fg
bg-w-primary
border-w-border
```

while keeping `--w-color-*` as the canonical semantic value.

### Why Wening-prefixed Tailwind aliases

The `w-` utility-token segment:

- avoids collisions with host-application token names;
- makes Wening-owned semantics easy to audit;
- avoids replacing Tailwind's entire default palette;
- lets host applications keep their own Tailwind utilities;
- supports future package extraction without claiming generic names globally.

Wening does **not** disable Tailwind's complete default color namespace in Phase 2.

Instead, Wening-owned source is guarded against bypassing semantic tokens.

## 5. Hard-coded color policy

Normal Wening core implementation must not hard-code product colors outside approved token-definition files.

Allowed locations for literal color values:

- reference/token definition files;
- test fixtures specifically proving parser/guard behavior;
- exceptional assets where a literal value is intrinsic and documented.

Disallowed in Wening core/component implementation:

- arbitrary hex/rgb/hsl/oklch literals;
- raw Tailwind palette classes used as Wening product semantics, such as `bg-indigo-500` or `text-slate-700`;
- page-specific Light/Dark recoloring that bypasses semantic tokens.

The guard is implemented in Phase 2G and expanded as component directories appear.

## 6. Theme preference contract

Wening supports exactly three theme preferences:

```text
light
dark
system
```

Root attribute:

```html
<html data-w-theme="light">
<html data-w-theme="dark">
<html data-w-theme="system">
```

### Default

If no application/user preference has been persisted, Wening's reference behavior defaults to **Light**.

This preserves the locked Light-first direction.

### Dark

`data-w-theme="dark"` maps semantic color variables to the Dark theme and declares native `color-scheme: dark`.

### System

`data-w-theme="system"` resolves semantic colors using `prefers-color-scheme`.

The System theme must respond to OS/browser preference changes without requiring a page reload.

Native browser chrome/form controls must receive a compatible `color-scheme` signal.

### Runtime persistence

The reference implementation may persist the preference using a small Wening-owned browser script.

Storage contract:

```text
key: wening-theme
values: light | dark | system
```

Rules:

- invalid/missing values fall back to `light`;
- theme resolution must occur early enough to avoid an obvious wrong-theme flash;
- theme preference is local browser state unless an integrating application intentionally synchronizes it server-side;
- no Livewire round trip is required merely to switch local theme preference.

This follows the existing responsibility rule: local theme preference belongs to native browser/Alpine-level state unless application persistence requires server ownership.

## 7. Theme implementation rule

Normal theme switching must happen by changing semantic-variable values.

A future Wening component should usually be able to write:

```html
<div class="bg-w-surface text-w-fg border-w-border">
```

without adding parallel Light/Dark color class lists.

A Tailwind `dark:*` variant may remain available for exceptional content/assets, but it is not the normal Wening color-theme architecture.

## 8. Brand override contract

Wening's semantic primary color is configurable.

Core components must depend on roles such as:

```text
--w-color-primary
--w-color-primary-hover
--w-color-primary-active
--w-color-primary-soft
--w-color-primary-fg
```

not on a globally hard-coded violet/indigo/green identity.

An integrating product may override approved semantic tokens in CSS loaded after Wening theme definitions or inside a deliberate scope.

Rules:

- overrides should target semantic tokens first;
- host applications need not replace Wening reference ramps merely to change brand identity;
- Wening must retain accessible foreground/state pairings after overrides;
- the reference theme has a Wening default identity, but the architecture is not coupled to that hue.

## 9. Source ownership

Phase 2 implementation is expected under:

```text
resources/css/wening/
```

The final split may be:

```text
tokens.css       reference/non-theme scales and Tailwind aliases
theme-light.css  Light semantic mappings
theme-dark.css   Dark semantic mappings
theme.css        theme preference/system composition
```

`resources/css/app.css` remains the integration entry point.

Files may be consolidated if implementation evidence shows a simpler layout is clearer, but responsibilities must remain explicit.

## 10. Typography, spacing, shape, motion

The same architecture applies outside color:

- primitive values define scales;
- semantic roles expose stable Wening intent;
- Tailwind aliases are added only when they improve normal consumption;
- later components consume semantic/scale contracts rather than inventing local values.

The exact values are frozen in 2C–2E.

## 11. Density

Density is a design-system context, not ad-hoc per-page padding.

Phase 2C will define:

```text
comfortable
compact
```

The architecture must support applying density at an application root or bounded subtree without duplicating component markup.

## 12. Accessibility contract

Token selection must support accessibility by construction.

Phase 2B/2E/2G must verify:

- foreground/background contrast for representative text roles;
- interactive/focus visibility;
- semantic status readability beyond color alone when components exist;
- disabled-state legibility;
- reduced-motion behavior;
- browser/OS theme behavior.

Automated evidence complements, not replaces, product-owner visual UAT.

## 13. Tailwind/default-theme boundary

Wening deliberately **does not replace Tailwind's whole default theme** in Phase 2.

Reason:

- Wening is intended for integration into real Laravel applications;
- host applications may use their own utilities;
- removing all Tailwind defaults would make Wening unnecessarily invasive;
- Wening can enforce its own semantic discipline through prefixed tokens and repository guards.

The restriction is on **Wening-owned implementation**, not on every host application class.

## 14. No component leakage

A Phase 2 specimen may render token examples using ordinary HTML solely to verify the system.

It must not establish public reusable Button/Input/Card/etc. APIs.

Reusable component contracts begin in their approved later phase.

## 15. Evidence basis

The architecture intentionally uses Tailwind CSS 4's CSS-first theme variables and `@theme inline` mapping for CSS-variable-backed utilities.

Official references:

- https://tailwindcss.com/docs/theme
- https://tailwindcss.com/docs/dark-mode
- https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/At-rules/@media/prefers-color-scheme
- https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/Properties/color-scheme

## 2A acceptance criteria

Phase 2A is ready to close when:

- `--w-*` is accepted as the canonical runtime namespace;
- reference → semantic → consumption layering is accepted;
- Wening-prefixed Tailwind aliases are accepted;
- Light/Dark/System root-attribute behavior is accepted;
- Light fallback is accepted;
- semantic-variable-based theme switching is accepted;
- brand override boundary is accepted;
- hard-coded-color guard policy is accepted;
- no reusable component implementation has begun.

## Next after 2A

Once these contracts are frozen, 2B–2E may proceed in parallel as distinct token-domain specifications before 2F integrates them into CSS.
