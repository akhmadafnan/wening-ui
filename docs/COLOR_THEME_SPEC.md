# Wening UI — Color & Theme Semantics

**Phase:** 2B
**Tracking issue:** #7
**Status:** SPEC_GREEN

## Objective

Define a calm, accessible, brand-overridable semantic color system for Light, Dark, and System themes.

The values below are the Wening reference baseline. Integrating products may override approved semantic brand roles without changing component structure.

## Accessibility targets

Wening targets at least:

- WCAG 2.2 AA text contrast: 4.5:1 for normal text;
- 3:1 for large text where the criterion permits it;
- 3:1 for required non-text UI boundaries/states;
- focus treatment designed to remain visually distinct against adjacent surfaces.

Disabled/inactive controls are treated separately by WCAG, but Wening still keeps them legible.

## Reference color direction

The reference identity is a restrained institutional green accent over neutral Light surfaces and blue-black Dark surfaces.

This is Wening's default reference identity, not a mandatory product brand. The architecture remains brand-overridable through semantic tokens.

## Light semantic values

| Token | Value | Intended role |
|---|---:|---|
| `--w-color-page` | `#F7F8FA` | page/canvas |
| `--w-color-surface` | `#FFFFFF` | primary surface |
| `--w-color-surface-subtle` | `#F0F2F5` | subtle grouped region |
| `--w-color-surface-elevated` | `#FFFFFF` | overlay/elevated base |
| `--w-color-fg` | `#16181D` | primary text |
| `--w-color-fg-muted` | `#59616D` | secondary text |
| `--w-color-fg-subtle` | `#676F7B` | lowest normal-text emphasis |
| `--w-color-fg-inverse` | `#FFFFFF` | text on dark/strong fills |
| `--w-color-border` | `#E5E7EB` | decorative separators |
| `--w-color-border-strong` | `#868E98` | identifiable control boundary |
| `--w-color-primary` | `#0F7A45` | primary action/accent |
| `--w-color-primary-hover` | `#0C6A3B` | primary hover |
| `--w-color-primary-active` | `#095C33` | primary active |
| `--w-color-primary-fg` | `#FFFFFF` | foreground on primary |
| `--w-color-primary-soft` | `#EFFAF4` | subtle primary surface |
| `--w-color-primary-soft-fg` | `#0C6A3B` | foreground on soft primary |
| `--w-color-primary-border` | `#BCE8D0` | primary-tinted border |
| `--w-color-link` | `#0C6A3B` | link foreground |
| `--w-color-focus-ring` | `#0C6A3B` | keyboard focus ring |
| `--w-color-selection` | `#DDF5E8` | text/selection background |
| `--w-color-disabled-bg` | `#F0F2F5` | disabled surface |
| `--w-color-disabled-fg` | `#9AA1AB` | disabled text/icon |
| `--w-color-disabled-border` | `#D1D5DB` | disabled border |

## Dark semantic values

| Token | Value | Intended role |
|---|---:|---|
| `--w-color-page` | `#0A0E1A` | page/canvas |
| `--w-color-surface` | `#11182A` | primary surface |
| `--w-color-surface-subtle` | `#151D32` | subtle grouped region |
| `--w-color-surface-elevated` | `#1B2740` | overlay/elevated base |
| `--w-color-fg` | `#E6EAF2` | primary text |
| `--w-color-fg-muted` | `#AAB3C3` | secondary text |
| `--w-color-fg-subtle` | `#8B95A8` | lowest normal-text emphasis |
| `--w-color-fg-inverse` | `#0A0E1A` | foreground on light/strong fills |
| `--w-color-border` | `#24304A` | decorative separators |
| `--w-color-border-strong` | `#586587` | identifiable control boundary |
| `--w-color-primary` | `#66C493` | primary action/accent |
| `--w-color-primary-hover` | `#7CCDA3` | primary hover |
| `--w-color-primary-active` | `#93D8B5` | primary active |
| `--w-color-primary-fg` | `#0A0E1A` | foreground on primary |
| `--w-color-primary-soft` | `#143124` | subtle primary surface |
| `--w-color-primary-soft-fg` | `#93D8B5` | foreground on soft primary |
| `--w-color-primary-border` | `#2D684A` | primary-tinted border |
| `--w-color-link` | `#93D8B5` | link foreground |
| `--w-color-focus-ring` | `#93D8B5` | keyboard focus ring |
| `--w-color-selection` | `#1F4A35` | text/selection background |
| `--w-color-disabled-bg` | `#151D32` | disabled surface |
| `--w-color-disabled-fg` | `#647087` | disabled text/icon |
| `--w-color-disabled-border` | `#24304A` | disabled border |

## Status families

Each status family has:

- strong fill: `--w-color-<status>`;
- foreground on strong fill: `--w-color-<status>-fg`;
- subtle background: `--w-color-<status>-soft`;
- text/icon on subtle background: `--w-color-<status>-soft-fg`;
- subtle border: `--w-color-<status>-border`.

### Light

| Family | Strong | Strong fg | Soft | Soft fg | Border |
|---|---:|---:|---:|---:|---:|
| success | `#17824B` | `#FFFFFF` | `#ECF9F1` | `#157743` | `#B7E3C7` |
| warning | `#9A6700` | `#FFFFFF` | `#FFF7E0` | `#8A5D00` | `#EBCF83` |
| danger | `#C5393F` | `#FFFFFF` | `#FFF0F0` | `#B83238` | `#F0B7BA` |
| info | `#2563B9` | `#FFFFFF` | `#EEF5FF` | `#1F579F` | `#B8D4FA` |

### Dark

| Family | Strong | Strong fg | Soft | Soft fg | Border |
|---|---:|---:|---:|---:|---:|
| success | `#45C985` | `#0A0E1A` | `#132C24` | `#70DCA0` | `#275C47` |
| warning | `#F0B429` | `#0A0E1A` | `#302610` | `#FFD36A` | `#6B5220` |
| danger | `#FF7A85` | `#0A0E1A` | `#341A21` | `#FF9CA4` | `#713541` |
| info | `#78A7FF` | `#0A0E1A` | `#17243D` | `#9EC1FF` | `#35547F` |

## Verified representative contrast

Representative pairs calculated against WCAG relative luminance:

| Pair | Ratio |
|---|---:|
| Light fg / page | 16.71:1 |
| Light muted / page | 5.89:1 |
| Light subtle / page | 4.78:1 |
| Light subtle / subtle surface | 4.53:1 |
| Light primary / primary fg | 5.40:1 |
| Light primary soft fg / soft | 6.26:1 |
| Light strong control border / page | 3.12:1 |
| Dark fg / page | 15.97:1 |
| Dark muted / surface | 8.37:1 |
| Dark subtle / surface | 5.86:1 |
| Dark primary / primary fg | 9.06:1 |
| Dark primary soft fg / soft | 8.52:1 |
| Dark strong control border / surface | 3.05:1 |

All strong status foreground pairs exceed 4.5:1 in the reference mapping.

## Primary-green meaning

Wening's reference primary is intentionally green because the product-owner direction favors an institutional green identity for public and application surfaces.

Primary green and semantic success are **not interchangeable meanings**:

- primary = brand/action/navigation emphasis;
- success = positive completion/verified state.

Future components must preserve this semantic distinction through labels, icons, placement, and state behavior rather than relying on hue alone.

## Border rule

`border` is a low-noise decorative separator and is not sufficient by itself when the border is the only visual cue needed to identify an interactive control.

Use `border-strong` for an essential control boundary/state that must satisfy non-text contrast.

## Theme rules

- Light is the fallback/default reference theme.
- Dark is a full semantic remap, not a transparent overlay on Light.
- System uses the same Light/Dark mappings and follows the OS/browser preference.
- Semantic token names never contain `light` or `dark`.
- Normal product markup must not carry parallel Light/Dark color utility lists.

## Brand override rule

Integrating products may override at least the primary role family:

- primary;
- primary hover;
- primary active;
- primary foreground;
- primary soft;
- primary soft foreground;
- primary border;
- link/focus where brand policy requires it.

An override is incomplete if its required foreground/state pairings fail accessibility evidence.

## Non-color communication

Status meaning must not rely on color alone once status components exist. Icons, text labels, shapes, or other programmatic/visual cues remain required where meaning would otherwise be color-only.

## Evidence basis

- WCAG 2.2 contrast minimum and non-text contrast;
- Wening Phase 0 design principles;
- Gate Muktamar NU light-side information hierarchy;
- Hermes Reflect dark-side surface hierarchy;
- Phase 2A semantic-token contract.
