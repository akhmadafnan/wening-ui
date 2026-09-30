# Wening UI — Design Principles

These principles are product constraints, not decoration guidance. Component and page decisions should be explainable against them.

## 1. Information before chrome

The content is the interface. Typography, alignment, spacing, and hierarchy should carry more weight than decorative containers.

A screen may be visually quiet and still be highly usable.

## 2. Calm hierarchy

Users should quickly understand:

- where they are;
- what matters most;
- what changed;
- what they can do next.

Use emphasis deliberately. Not every number, row, or action deserves equal visual weight.

## 3. Do not card everything

Cards are for meaningful grouping, interaction boundaries, or elevation.

Plain metrics, headings, tables, and content regions should remain unboxed when a container does not add meaning.

## 4. Light-first, dark-native

The default design direction is light-first because many institutional and operational contexts benefit from a bright, low-noise interface.

Dark mode is not an afterthought. Light, dark, and system modes must be supported by semantic tokens rather than page-specific recoloring.

## 5. Adaptive density

Wening supports both:

- **comfortable density** for reading, public pages, and general work;
- **compact density** for data-heavy and operational work.

Density is a system decision, not arbitrary per-page spacing.

## 6. Data components are first-class

Tables, filters, search, pagination, selection, row actions, empty states, loading states, and error states deserve the same design attention as dashboards.

A beautiful dashboard with a poor table is a failed application system.

## 7. Operational focus is a distinct layout mode

Some tasks should not inherit the full admin shell.

Gate/check-in, scanner, kiosk, verification, presentation, and monitoring screens may use a focused layout with minimal navigation and maximum task clarity.

## 8. Semantic design tokens

Components consume semantic roles such as:

- background;
- surface;
- border;
- text;
- muted text;
- primary;
- success;
- warning;
- danger.

Product branding may change values without changing component structure.

## 9. Restrained shape and elevation

Default visual language:

- modest corner radius;
- thin borders;
- minimal shadows;
- elevation only when hierarchy or overlay behavior requires it.

Avoid excessive rounding, floating cards, and decorative shadows.

## 10. Typography does the heavy lifting

Primary interface typography should remain highly legible.

A monospace face may be used selectively for IDs, versions, timestamps, technical metadata, logs, or aligned numerical data—not as a stylistic blanket.

## 11. Motion explains change

Animation is used to clarify state, hierarchy, and spatial change.

It must be subtle, fast enough for work interfaces, and compatible with `prefers-reduced-motion`.

## 12. Accessibility is a design input

Keyboard behavior, visible focus, contrast, labels, touch targets, semantic markup, and assistive-technology behavior are considered during component design—not bolted on after visual polish.

## 13. Responsive means task-preserving

Responsive behavior must preserve the task, not merely shrink components.

Data-heavy layouts may change structure, reveal alternate controls, or move secondary information instead of forcing desktop composition into a narrow viewport.

## 14. Public and application surfaces share DNA

Public pages can use more whitespace and editorial composition. Application pages can use more density.

They should still feel like one product through typography, color semantics, controls, radius, iconography, and interaction behavior.

Wening's reference direction distinguishes the emphasis without splitting the product identity:

- public/frontend: Sora-led display moments, Inter functional text, bright institutional ecosystem composition, restrained green identity;
- backend/application: Inter-dominant operational typography, neutral work surfaces, green active/primary states, tables/forms/filters first;
- auth/entry: branded composition may be stronger, while the actual form remains focused and quiet.

The shared semantic-token system—not copied page layouts—keeps these surfaces coherent.

## 15. Consistency beats novelty

A component that behaves consistently across twenty screens is more valuable than twenty individually “creative” screens.

New patterns must justify why existing patterns cannot solve the problem.
