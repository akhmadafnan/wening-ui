# Wening UI — Typography & Density

**Phase:** 2C
**Tracking issue:** #8
**Status:** SPEC_GREEN

## Objective

Freeze a highly legible typography system and a deliberate comfortable/compact density model suitable for institutional, data-heavy, and operational applications.

## Font-family contract

Wening uses three typography roles:

```text
display / brand  → Sora
UI / reading     → Inter
technical        → Geist Mono / system monospace fallback
```

These are roles, not three equally dominant visual voices.

### Display / brand

```css
--w-font-display:
    Sora,
    Inter,
    ui-sans-serif,
    system-ui,
    sans-serif;
```

**Sora** provides controlled personality for high-emphasis product-facing typography.

Use it selectively for:

- public/frontend hero headings;
- major public section headings;
- strong product/brand statements;
- selected major metrics or application identity moments.

Do not use Sora mechanically for every heading, card title, form label, table header, or navigation item.

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

**Inter** is Wening's default workhorse font because of its neutral, work-oriented legibility and broad weight coverage.

Inter owns:

- body and long-form UI reading;
- navigation;
- buttons/actions;
- form labels and inputs;
- tables and dense data;
- filters/toolbars;
- badges/status text;
- modal/dialog copy;
- most backend/admin typography.

### Frontend/public usage

The default public-facing direction is **Sora + Inter**:

- Sora supplies identity and hierarchy;
- Inter supplies reading comfort and functional UI consistency.

This avoids a generic system-font public surface without turning the entire frontend into display typography.

### Backend/application usage

The default backend/application direction is **Inter-dominant**.

Sora may appear only as a restrained accent for:

- application/product identity;
- selected page titles;
- selected major KPI/metric values where visual hierarchy benefits.

Backend controls, tables, forms, filters, navigation, dense metadata, and workflow text remain Inter by default.

The intended distribution is conceptually **mostly Inter with selective Sora**, not a 50/50 mixture.

### System-font boundary

`system-ui` is a fallback, not Wening's canonical visual identity.

Using `system-ui` as the primary family would produce materially different typography across Windows, macOS, Android, and Linux. Wening therefore keeps explicit preferred faces first while retaining resilient system fallbacks.

### Font delivery

Wening core does **not** require a remote font CDN.

The semantic font contract is independent from delivery. Reference-app self-hosting or package-based font delivery may be added deliberately, but failure to load a preferred face must degrade cleanly to the declared fallbacks.

Font asset packaging remains separate from the token contract and may be refined during packaging/release work.

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

- public hero title: 32–40px, 600–700, display role;
- public section heading: 20–32px, 600, display role when identity benefits;
- backend page title: 24/32, 600, sans by default; display is optional and selective;
- section heading: 20/28, 600, sans by default;
- subheading: 16/24, 600;
- body: 14/22, 400;
- secondary body: 13/20, 400;
- label/action: 13–14px, 500;
- caption/technical meta: 12/16, 400–500;
- large metric: 32/40, 600, display optional;
- compact metric: 24/32, 600.

These are semantic conventions, not reusable components.

Typography hierarchy should come first from size, weight, whitespace, and placement. Font-family switching is an accent tool, not the primary hierarchy mechanism.

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
