# Wening UI — Spatial & Shape System

**Phase:** 2D
**Tracking issue:** #9
**Status:** SPEC_READY

## Objective

Freeze Wening's spacing, sizing, radius, border, elevation, and layering scales so later UI remains calm and consistent instead of accumulating one-off values.

## Spacing principle

Wening uses a 4px base rhythm with a small set of intentional intermediate/large steps.

Canonical scale:

| Token | Value |
|---|---:|
| `--w-space-0` | 0 |
| `--w-space-0_5` | 2px |
| `--w-space-1` | 4px |
| `--w-space-1_5` | 6px |
| `--w-space-2` | 8px |
| `--w-space-2_5` | 10px |
| `--w-space-3` | 12px |
| `--w-space-4` | 16px |
| `--w-space-5` | 20px |
| `--w-space-6` | 24px |
| `--w-space-8` | 32px |
| `--w-space-10` | 40px |
| `--w-space-12` | 48px |
| `--w-space-16` | 64px |
| `--w-space-20` | 80px |
| `--w-space-24` | 96px |

Rules:

- prefer the shared scale;
- do not add a token for every one-off measurement;
- 2px/6px/10px exist for compact internal alignment, not page layout;
- page/section composition should usually use 16px and above;
- component internals typically use 4–16px;
- dense data UI may use 4–12px without shrinking typography.

## Shape / radius

Wening uses modest radii.

| Token | Value | Direction |
|---|---:|---|
| `--w-radius-none` | 0 | flush/table/internal joins |
| `--w-radius-xs` | 4px | small technical surfaces |
| `--w-radius-sm` | 6px | compact controls |
| `--w-radius-md` | 8px | default controls/surfaces |
| `--w-radius-lg` | 12px | overlays/meaningful groups |
| `--w-radius-full` | 9999px | pills/avatars only |

Rules:

- 8px is the default upper-middle Wening shape, not 16–24px rounded-card styling;
- 12px is reserved for meaningful larger surfaces/overlays;
- `full` is semantic for pills/circles, not a general control default;
- nested elements should not mechanically repeat the same radius if the shape hierarchy becomes visually noisy.

## Border system

| Token | Value |
|---|---:|
| `--w-border-0` | 0 |
| `--w-border-1` | 1px |
| `--w-border-2` | 2px |

Default structural border width: **1px**.

2px is reserved for stronger state/focus/selected boundaries where justified.

Color semantics determine whether a border is decorative (`border`) or required for control identification (`border-strong`).

## Elevation philosophy

Normal Wening surfaces should prefer:

1. spacing;
2. background/surface contrast;
3. thin borders;
4. only then shadow.

Cards do not receive shadows merely because they are cards.

Canonical shadow scale:

### Light reference

```css
--w-shadow-none: none;
--w-shadow-raised:
    0 1px 2px rgb(15 23 42 / 0.06),
    0 1px 3px rgb(15 23 42 / 0.04);
--w-shadow-overlay:
    0 12px 32px rgb(15 23 42 / 0.16),
    0 2px 8px rgb(15 23 42 / 0.08);
```

### Dark reference

```css
--w-shadow-none: none;
--w-shadow-raised:
    0 1px 2px rgb(0 0 0 / 0.28);
--w-shadow-overlay:
    0 16px 36px rgb(0 0 0 / 0.42),
    0 2px 10px rgb(0 0 0 / 0.24);
```

Usage:

- normal content region: none;
- meaningful floating/raised surface: raised, sparingly;
- dropdown/popover/modal/dialog: overlay;
- no decorative multi-layer glow in core UI.

## Layering / z-index

Wening uses named layering roles rather than arbitrary values:

| Token | Value | Intended layer |
|---|---:|---|
| `--w-z-base` | 0 | normal document |
| `--w-z-sticky` | 10 | sticky local chrome |
| `--w-z-dropdown` | 20 | dropdown/popover |
| `--w-z-overlay` | 40 | overlay/backdrop |
| `--w-z-modal` | 50 | modal/dialog |
| `--w-z-toast` | 60 | transient global notification |

A later component may justify a new layer only if it cannot fit one of these roles.

## Sizing rules

Phase 2 does not define every future component width.

General rules:

- content should size to task and readability, not arbitrary card dimensions;
- controls consume the density sizing contract from 2C;
- icons align to a small predictable scale, later finalized with components;
- fixed heights must not clip zoomed/reflowed text;
- tables and operational layouts may overflow/scroll intentionally when that preserves the task.

## Card restraint

A bordered/radius surface is justified when it represents:

- meaningful grouping;
- an interaction boundary;
- elevation/overlay;
- a distinct state.

Plain metrics, headings, tables, and content regions should remain unboxed when grouping adds no meaning.

## Tailwind integration direction

Phase 2F may expose Wening-prefixed Tailwind aliases for radius/shadow where normal consumption benefits.

The Wening variables remain the design contract; arbitrary utility values should not become the normal Wening core pattern.

## Non-scope

This phase does not define Card, Modal, Dropdown, Table, Sidebar, or other reusable component APIs.

It only freezes the shared spatial/shape substrate.
