# Wening UI — Design Direction

**Status:** LOCKED REFERENCE DIRECTION
**Phase established:** PHASE 2
**Authority:** Product-owner visual direction + Wening locked design principles

## Purpose

This document translates Wening's abstract design principles into a concrete visual/product direction for public, authentication, application, and operational surfaces.

It does **not** replace the existing design principles. It narrows how those principles should be interpreted in later phases.

## Core expression

Wening should feel:

- calm;
- institutional;
- modern without looking fashionable for its own sake;
- information-first;
- highly legible;
- operationally efficient;
- restrained in color, radius, shadow, and animation;
- visually coherent across public and application contexts.

A useful shorthand is:

> **Institutional ecosystem identity outside; operational clarity inside.**

## 1. Reference identity

Wening's reference implementation uses a restrained **institutional green** as its primary identity.

Reference Light primary:

```text
#0F7A45
```

Reference Dark primary:

```text
#66C493
```

This is the reference identity, not a permanent requirement for every host product.

The public semantic contract remains:

```text
primary
primary-hover
primary-active
primary-foreground
primary-soft
primary-soft-foreground
primary-border
```

Host products may override those roles as long as accessibility/state pairings remain valid.

## 2. Typography

Wening has three typography roles.

### Display / brand

**Sora**

Use selectively for:

- public hero titles;
- major public section headings;
- product identity statements;
- selected large metrics;
- occasional high-level application identity.

Sora is not a blanket heading font.

### UI / reading

**Inter**

Inter is the default Wening workhorse.

Use for:

- body;
- navigation;
- controls;
- labels;
- forms;
- tables;
- filters;
- badges;
- modal/dialog content;
- dense application text;
- most backend/application headings.

### Technical

**Geist Mono / system monospace fallback**

Use only when the content itself is technical:

- IDs;
- hashes;
- versions;
- logs;
- code;
- selected aligned technical metadata.

### System UI

`system-ui` is a fallback, not Wening's canonical identity.

## 3. Public / frontend direction

Public Wening surfaces use an **institutional ecosystem product** composition.

Desired characteristics:

- bright, predominantly neutral canvas;
- meaningful whitespace;
- selective green emphasis rather than green everywhere;
- Sora-led hero/major section identity;
- Inter for navigation, body, actions, cards, search, filters, and functional copy;
- compact, disciplined navigation;
- clear product/service taxonomy;
- structured content sections;
- restrained cards with thin borders;
- soft green washes where they communicate brand hierarchy;
- stronger institutional footer or terminal section when appropriate.

### Public cards

Cards are acceptable when they represent a real product, service, feature grouping, article, or navigation destination.

Avoid generic decorative cards for plain text/statistics.

### Public hero

A public hero may be more expressive than application chrome, but should remain:

- typographically driven;
- accessible;
- readable;
- not dependent on decorative gradients or illustrations;
- responsive without losing the content hierarchy.

## 4. Authentication / entry direction

Branded authentication may use a **split composition**:

- identity/benefit panel;
- focused authentication/form panel.

The identity side may use:

- stronger green field or visual treatment;
- logo/product identity;
- concise value proposition;
- limited feature/status messaging.

The form side remains:

- light;
- quiet;
- task-focused;
- highly readable;
- minimally decorated.

The split pattern is optional product composition, not a dependency of core form components.

## 5. Backend / application direction

Application surfaces use **operational admin clarity**.

### Shell character

The later application shell should favor:

- light sidebar;
- light/top neutral topbar;
- thin separators;
- green active/navigation states;
- calm page background;
- strong content alignment;
- predictable page heading/action area;
- direct access to search/filter/workflow actions.

### Typography

Backend/application UI is **Inter-dominant**.

Sora may appear only in selected:

- product/app identity;
- page titles where a stronger branded moment helps;
- major KPI values.

Do not mix Sora and Inter indiscriminately.

### Dashboard

A Wening dashboard is a working surface, not a showcase.

Use:

- concise metrics;
- operational alerts;
- task queues;
- tables;
- recent activity;
- filters;
- meaningful grouped summaries.

Avoid:

- unnecessary charts;
- decorative gradients;
- oversized metric cards;
- card grids whose only purpose is visual filling.

### Metrics

Plain label + number is the preferred default when no interaction/grouping boundary is needed.

A metric card is justified when it adds:

- context;
- interaction;
- status;
- comparison;
- navigation;
- grouping.

### Tables/forms

Tables, filters, forms, search, empty states, bulk actions, pagination, validation, and workflow status are first-class design-system problems.

They are not secondary content placed below a dashboard.

## 6. Operational / focus direction

Operational mode remains distinct from the admin shell.

Use it for:

- gate/check-in;
- scanning;
- verification;
- kiosk;
- monitoring;
- presentation;
- high-focus task stations.

Characteristics:

- minimal navigation;
- large task hierarchy;
- immediate status feedback;
- no admin chrome that does not serve the task;
- touch-safe interaction when needed;
- semantic tokens shared with the main system.

## 7. Color behavior

### Neutral dominance

Most screen area should remain neutral.

Green is used for:

- primary action;
- active/current navigation;
- links where appropriate;
- focus;
- selected brand moments;
- soft brand emphasis.

It should not turn every container, border, icon, heading, and status into green.

### Primary vs success

Primary and success may share a green family but have different semantics.

- **primary** = brand/action/navigation;
- **success** = verified/complete/positive status.

Components must preserve meaning through text, icons, context, and programmatic state—not hue alone.

### Other statuses

Warning, danger, and info retain independent semantic families.

Wening must not recolor every status into the brand green.

## 8. Shape and elevation

Default direction:

- 6–8px controls;
- 8px common surface radius;
- 12px only for meaningful larger surfaces/overlays;
- 1px borders;
- almost no shadow on normal work surfaces;
- stronger shadow only for real overlay/elevation.

Avoid a soft, bubbly, over-rounded SaaS aesthetic.

## 9. Density

Two standard contexts remain:

- **comfortable**
- **compact**

Public/editorial surfaces usually default comfortable.

Backend/application areas may use comfortable or compact based on work density.

Mobile does not automatically mean compact.

## 10. Cross-surface DNA

Public and backend surfaces may look different in density and composition, but should still share:

- semantic green identity;
- Sora/Inter role logic;
- neutral surface hierarchy;
- radius/border language;
- focus treatment;
- status semantics;
- motion restraint;
- icon philosophy;
- accessibility standards.

The product should feel related without forcing identical page layouts.

## 11. Reference interpretation

### Gate Muktamar NU

Use for:

- information-first hierarchy;
- unboxed metrics;
- whitespace;
- focused operational presentation.

### Hermes Reflect

Use for:

- Dark theme atmosphere;
- dense operational surfaces;
- muted surface hierarchy;
- restrained technical feel.

Do not inherit its indigo/violet as Wening's reference brand.

### Digdaya NU

Use for:

- institutional green confidence;
- public ecosystem/product composition;
- branded entry/auth direction;
- light operational admin clarity.

Do not copy NU branding, assets, exact layouts, or code.

### Tabler

Use for:

- completeness;
- mature responsive/admin behavior.

### shadcn/ui

Use for:

- anatomy;
- composability;
- accessibility/state discipline.

### Flux UI

Use for:

- Livewire-oriented API/interaction ergonomics.

## 12. Do / don't

### Do

- make hierarchy readable before adding containers;
- keep most working surfaces neutral;
- use green deliberately;
- use Sora to create selected identity moments;
- use Inter for serious work;
- make filters/tables/forms excellent;
- preserve whitespace;
- use borders before shadows;
- make active/focus/status states unmistakable;
- let products override semantic brand roles.

### Don't

- turn Wening into a Digdaya clone;
- put every metric in a card;
- use green for every visual element;
- use Sora throughout dense tables/forms;
- make system-ui the default identity;
- introduce decorative dashboard charts by default;
- use giant radii and floating cards everywhere;
- rely on shadow instead of structure;
- use dark-mode utility duplication as the normal theme architecture;
- bypass semantic tokens with raw palette classes.

## 13. Phase mapping

This direction affects later phases as follows:

- **Phase 3 — Application Shell:** operational-admin sidebar/topbar/content frame;
- **Phase 4 — Core Primitives:** semantic typography, controls, state behavior;
- **Phase 5 — Data UI:** table/filter/search/pagination hierarchy;
- **Phase 6 — Workflow UI:** operational workflow density/state;
- **Phase 7 — Operational Mode:** Gate-like focused task layout;
- **Phase 8 — Public Frontend:** institutional ecosystem/public composition;
- authentication examples: branded split composition where product scope requires it.

No later phase may reinterpret these directions silently. Material change requires a new decision-register entry and product-owner acceptance.
