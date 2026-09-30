# Wening UI — Typography & Density

**Phase:** 2C
**Tracking issue:** #8
**Status:** SPEC_READY

## Objective

Freeze a highly legible typography system and a deliberate comfortable/compact density model suitable for institutional, data-heavy, and operational applications.

## Font-family contract

### Primary UI sans

```css
--w-font-sans:
    Inter,
    ui-sans-serif,
    system-ui,
    -apple-system,
    BlinkMacSystemFont,
    "Segoe UI",
    sans-serif;
```

**Inter** is Wening's preferred UI face because of its neutral, work-oriented legibility and broad weight coverage.

Wening core does not require a remote font CDN.

If an integrating application does not provide Inter, the system fallback remains valid.

Font asset packaging is intentionally separate from the semantic typography contract and may be refined during packaging/release work.

### Technical monospace

```css
--w-font-mono:
    "Geist Mono",
    "SFMono-Regular",
    Consolas,
    "Liberation Mono",
    monospace;
```

Monospace is reserved for:

- IDs;
- hashes/versions;
- timestamps where alignment matters;
- code/logs;
- technical metadata;
- intentionally tabular technical values.

It is not Wening's general UI body face.

## Type scale

Wening uses a restrained scale rather than many near-duplicate sizes.

| Token | Size | Line height | Default use |
|---|---:|---:|---|
| `--w-text-xs` | 12px | 16px | caption, technical metadata |
| `--w-text-sm` | 13px | 20px | labels, dense secondary content |
| `--w-text-md` | 14px | 22px | default application body |
| `--w-text-lg` | 16px | 24px | emphasized body/subheading |
| `--w-text-xl` | 20px | 28px | section heading |
| `--w-text-2xl` | 24px | 32px | page title / strong metric |
| `--w-text-3xl` | 32px | 40px | major metric / focused title |
| `--w-text-4xl` | 40px | 48px | exceptional display/operational metric |

Corresponding line-height tokens are explicit so typography remains predictable.

## Weight scale

Wening uses only the weights it can justify:

| Token | Weight | Use |
|---|---:|---|
| `--w-font-normal` | 400 | body |
| `--w-font-medium` | 500 | labels/actions |
| `--w-font-semibold` | 600 | headings/important values |
| `--w-font-bold` | 700 | exceptional emphasis |

Avoid routine use of bold for ordinary hierarchy. Whitespace, size, and placement should do more work.

## Role guidance

Recommended role mapping:

- page title: 24/32, 600;
- section heading: 20/28, 600;
- subheading: 16/24, 600;
- body: 14/22, 400;
- secondary body: 13/20, 400;
- label/action: 13–14px, 500;
- caption/technical meta: 12/16, 400–500;
- large metric: 32/40, 600;
- compact metric: 24/32, 600.

These are semantic conventions, not reusable components.

## Letter spacing

Default body and heading tracking remains `normal`.

Additional tracking is allowed only when it improves a specific pattern:

- small uppercase metadata: approximately `0.04em`;
- technical labels where scanning benefits;
- never as a blanket visual style.

Avoid all-caps for ordinary labels.

## Numeric alignment

For changing/tabular numeric data, Wening may use:

```css
font-variant-numeric: tabular-nums;
```

This does not imply monospace typography.

## Density contract

Wening supports exactly two standard density contexts:

```text
comfortable
compact
```

Root/subtree contract:

```html
<div data-w-density="comfortable">
<div data-w-density="compact">
```

Default when unspecified: **comfortable**.

Density may be applied to an application root or bounded work area. It must not require duplicate markup.

## Density sizing baseline

### Comfortable

| Role | Value |
|---|---:|
| small control height | 32px |
| default control height | 40px |
| large control height | 48px |
| default data row target | 48px |
| compact-internal gap | 8px |
| standard control horizontal padding | 12–16px |

### Compact

| Role | Value |
|---|---:|
| small control height | 28px |
| default control height | 36px |
| large control height | 44px |
| default data row target | 40px |
| compact-internal gap | 6px |
| standard control horizontal padding | 10–12px |

The exact control implementation belongs to later component phases. These values define the shared sizing contract those components consume.

## Density rules

- Compact means denser, not cramped.
- Font size does not automatically shrink merely because density is compact.
- Interactive targets must remain keyboard/focus usable.
- Operational touch-first screens may deliberately use larger target sizing even when surrounding data is compact.
- Density is a context-level choice, not arbitrary per-control styling.
- Public/editorial surfaces normally prefer comfortable density.
- Data-heavy tables/toolbars may use compact density.

## Responsive relationship

Responsive layout and density are independent concerns.

Mobile must not automatically mean compact. A narrow touchscreen often needs *larger* interaction targets even when information is reflowed.

## Accessibility/readability constraints

- Default body text is not below 14px.
- Normal muted text must remain contrast-compliant through color semantics.
- Zoom/text resizing must not depend on fixed-height containers that clip text.
- Line height remains sufficient for scanning data-heavy screens.
- Essential information must not depend on unusually light font weights.

## Tailwind mapping direction

Phase 2F may map Wening fonts/text metrics into prefixed or canonical Tailwind theme variables where doing so creates a stable utility contract.

The Wening semantic/scale variables remain authoritative.

## Non-scope

This phase does not create Heading, Text, Label, Metric, Button, Input, or Table components.

It freezes the typography/density substrate those later components will use.
