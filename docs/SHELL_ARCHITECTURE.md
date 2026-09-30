# Wening UI — Application Shell Architecture

**Phase:** 3A — Shell Contract & Information Architecture
**Tracking issue:** #14
**Status:** SPEC_READY

## Purpose

Define Wening's reusable application frame before implementation begins.

The shell provides structure and navigation only. It must not silently become a generic primitive library, dashboard framework, data system, workflow engine, or public frontend.

## 1. Shell anatomy

Canonical application anatomy:

```text
App Shell
├── Desktop Sidebar
│   ├── Product / App Identity
│   ├── Primary Navigation
│   │   ├── Navigation Group
│   │   └── Navigation Item
│   ├── Flexible Spacer
│   └── Secondary / Account Navigation Slot
├── Main Column
│   ├── Topbar
│   │   ├── Mobile Navigation Trigger
│   │   ├── Workspace / Context Slot
│   │   └── Action / User Slot
│   └── Main
│       ├── Page Header
│       │   ├── Title / Description
│       │   └── Page Action Slot
│       └── Content Frame
└── Mobile Navigation Dialog
```

The shell owns layout and navigation hierarchy.

Page/domain content is supplied through slots and remains outside shell internals.

## 2. Reference layout measurements

Desktop reference measurements:

```text
sidebar expanded   256px
sidebar collapsed   72px
topbar               64px
desktop page gutter  24px
wide page gutter     32px
mobile page gutter   16px
```

These values are shell reference defaults and may later become shell-specific tokens if repeated component evidence justifies it.

The application content frame should use available working width rather than forcing a narrow marketing-style max-width.

For very wide displays, page composition may later introduce readable internal regions without globally constraining the shell.

## 3. Desktop sidebar

### Structure

The sidebar:

- occupies the full viewport height;
- uses a neutral/surface background;
- uses a semantic 1px border to separate it from the work area;
- does not use decorative shadow;
- remains persistent on desktop;
- supports expanded and collapsed states;
- keeps product identity at the top;
- allows primary grouped navigation;
- allows a secondary/account slot near the bottom.

### Expanded state

Expanded width: **256px**.

Navigation items display:

- icon;
- text label;
- optional trailing structural affordance only when justified.

### Collapsed state

Collapsed width: **72px**.

Requirements:

- icons remain visually centered;
- link accessible names remain intact;
- labels may be visually hidden but not removed from the accessibility tree;
- a later shell visual-state lane may add hover/focus tooltip treatment;
- collapsed state must not become icon-only ambiguity for assistive technology.

### Navigation item visual direction

Default item:

- neutral foreground;
- transparent/neutral background;
- modest radius;
- no shadow.

Current item:

- semantic primary-soft background;
- semantic primary-soft foreground or primary foreground role appropriate to contrast;
- icon follows the same semantic current-state intent;
- `aria-current="page"`.

Hover:

- restrained neutral/primary-soft shift;
- not stronger than current state.

The Digdaya-style soft green active navigation is a direction reference only; Wening uses its own semantic tokens and spacing.

## 4. Navigation information architecture

Navigation data must represent structure rather than hard-coded page markup.

Conceptual group contract:

```text
group
├── label (optional)
└── items[]
    ├── label
    ├── href / route
    ├── current
    ├── icon
    └── accessible label when needed
```

Phase 3 does not freeze application-specific route names.

The reference specimen may use neutral examples such as:

- Overview;
- Management;
- Review;
- Reports;
- Settings.

These are verification content only.

### Current-state ownership

Current route/page state belongs to server/Blade evaluation.

Do not use client-side state as the authority for which route is current.

## 5. Topbar

Reference height: **64px**.

The topbar:

- belongs to the main column;
- uses a neutral/surface background;
- has a bottom 1px semantic border;
- does not use normal decorative shadow;
- remains structurally quiet;
- may be sticky when evidence shows it improves long work surfaces.

Slots:

### Context slot

May show:

- workspace/institution/project name;
- breadcrumb-like high-level context later.

It must not duplicate the page title mechanically.

### Action slot

May hold structural controls such as:

- theme control;
- density control;
- notifications slot;
- user/account slot.

Phase 3 does not implement full notification/account workflows.

### Mobile trigger

Visible only when persistent desktop sidebar is unavailable.

It must expose:

- accessible name;
- expanded state;
- controlled mobile navigation relationship.

## 6. Page header

Page header is part of the shell/content frame, not the topbar.

It provides:

- `h1` page title;
- optional description;
- optional page-action slot.

Typography:

- Inter by default;
- Sora only when a product/app context deliberately needs a stronger identity moment;
- ordinary administrative pages should remain Inter-dominant.

The page header should not automatically be wrapped in a card.

## 7. Content frame

The content frame:

- uses page background from semantic tokens;
- provides token-driven responsive gutters;
- sets `min-width: 0` on flex/grid children where needed;
- permits tables/forms/workflows to own their later layout needs;
- does not impose a generic card around page content;
- does not impose dashboard widgets.

## 8. Responsive behavior

### Wide desktop

```text
>= 1280px
```

Reference behavior:

- persistent expanded sidebar by default;
- user may collapse it;
- full topbar/content frame.

### Desktop / small laptop

```text
>= 1024px and < 1280px
```

Reference behavior:

- persistent sidebar still supported;
- reference app may remember user collapse preference;
- content remains primary.

### Tablet / mobile

```text
< 1024px
```

Reference behavior:

- persistent sidebar is removed from normal layout;
- mobile navigation uses a modal navigation surface;
- content receives the full available width;
- desktop collapse preference does not force mobile behavior.

Breakpoint details are implementation choices tied to Tailwind's responsive system; the behavioral boundary above is canonical.

## 9. Mobile navigation

Wening's reference mobile navigation should use a native **`<dialog>`-backed modal drawer** where browser support in the supported baseline is sufficient.

Why:

- native modal/top-layer semantics;
- built-in Escape close behavior;
- clearer focus behavior than a visually hidden off-canvas div;
- avoids adding a UI runtime solely for modal mechanics.

The drawer may use Alpine for local open/close coordination where needed, but the underlying modal semantics remain native.

Requirements:

- opening control has an accessible name;
- modal navigation has a clear label;
- Escape closes;
- close button is keyboard reachable;
- background content is not interactive while modal;
- closed dialog descendants are not keyboard reachable;
- reduced motion is respected;
- drawer width remains task-appropriate, not full desktop-sidebar compression.

Reference mobile drawer width:

```text
min(320px, calc(100vw - 32px))
```

## 10. Shell local state

### Server-owned state

- current route;
- application/workspace identity when supplied by the host;
- permission-filtered navigation when supplied by the host.

### Browser-local state

- desktop sidebar expanded/collapsed preference;
- mobile drawer open/closed;
- existing theme preference;
- existing density context where exposed.

### Reference persistence

Desktop sidebar preference may use:

```text
key: wening-shell-sidebar
values: expanded | collapsed
```

Invalid/missing value falls back to **expanded**.

Mobile drawer state is transient and is not persisted.

## 11. State implementation boundary

Phase 3 follows the locked responsibility hierarchy:

```text
HTML/CSS → Blade → Blade + Alpine → Livewire
```

Rules:

- native `dialog` behavior is preferred where it solves modal semantics;
- Blade owns rendered shell/navigation structure;
- root-level pre-paint preference state (theme/sidebar geometry) may use a tiny Wening-owned browser module because it must resolve before normal component initialization;
- Alpine remains the preferred declarative layer for richer local component interaction once a component actually benefits from it;
- Livewire is prohibited for purely local shell state;
- server-driven navigation/permissions may later be passed into Blade without making the shell itself Livewire.

The reference app must not load the full Livewire runtime merely to obtain Alpine. Phase 3 may keep root shell persistence in a minimal Wening-owned JavaScript module and defer a direct Alpine package dependency until a concrete declarative interaction requires it.

## 12. Shell-specific Blade boundaries

Initial proposed shell component tree:

```text
resources/views/components/wening/shell/
├── app.blade.php
├── sidebar.blade.php
├── sidebar-section.blade.php
├── nav-item.blade.php
├── topbar.blade.php
├── page-header.blade.php
├── content.blade.php
└── mobile-nav.blade.php
```

This is a shell API, not the Phase 4 generic primitive API.

Allowed responsibilities:

- structure;
- semantic shell classes;
- slots;
- navigation/current state;
- shell accessibility;
- shell-specific data attributes.

Disallowed responsibilities:

- generic button design system;
- generic dropdown/modal APIs;
- generic form controls;
- domain/business logic.

## 13. Shell class/token policy

Shell styling consumes Phase 2 semantics.

Examples:

```text
bg-w-page
bg-w-surface
text-w-fg
text-w-fg-muted
border-w-border
bg-w-primary-soft
text-w-primary-soft-fg
```

Do not introduce raw Tailwind product colors.

Shell-specific repeated dimensions may become `--w-shell-*` component-level variables because the shell now exists as a real component domain.

Proposed variables:

```text
--w-shell-sidebar-expanded
--w-shell-sidebar-collapsed
--w-shell-topbar-height
--w-shell-content-gutter
```

These are legitimate Phase 3 component-level tokens, unlike speculative component tokens before the shell existed.

## 14. Density behavior

Comfortable is the shell reference default.

Compact may reduce:

- navigation row height;
- topbar internal gaps;
- selected shell paddings.

Compact must not:

- shrink readable typography below the Phase 2 contract;
- reduce mobile touch safety;
- collapse landmarks or labels.

## 15. Theme behavior

The shell must use semantic token roles only.

Normal shell markup must not maintain separate Light/Dark class lists.

Light, Dark, and System should change through the existing Phase 2 semantic-variable runtime.

## 16. Accessibility contract

Required landmarks:

- one primary application `nav` landmark for sidebar/mobile navigation;
- `header` for topbar;
- one `main` for page content.

Requirements:

- navigation landmark has an accessible label;
- current link uses `aria-current="page"`;
- buttons have accessible names;
- collapsed navigation keeps names;
- mobile trigger communicates expanded/control state;
- focus treatment uses Phase 2 focus tokens;
- hidden/collapsed structures do not expose unusable interactive descendants;
- no keyboard trap;
- dialog close returns focus to a sensible trigger through native/browser behavior or explicit Alpine handling where necessary.

## 17. Reference specimen content

The shell specimen may show:

- Wening UI identity;
- a fictional workspace/institution name;
- 2–3 navigation groups;
- a page title and short description;
- plain information-first metrics or neutral placeholder content only where needed to judge the frame.

It must not become a dashboard implementation.

## 18. Phase boundaries

Deferred to Phase 4:

- generic Button;
- Input;
- Select;
- Checkbox/Radio;
- Badge;
- Dropdown;
- Dialog abstraction;
- Tooltip abstraction;
- feedback primitives.

Deferred to Phase 5:

- real metrics component API;
- data tables;
- filters;
- pagination;
- bulk actions.

Deferred to Phase 7:

- operational/focus shell.

Deferred to Phase 8:

- public/frontend/auth production patterns.

## 3A acceptance criteria

3A is ready to close when:

- shell anatomy is accepted;
- 256px / 72px / 64px reference measurements are accepted;
- page header/content-frame boundary is accepted;
- current route remains server-owned;
- desktop collapse/mobile drawer remain browser-local;
- native dialog is accepted for reference mobile navigation;
- Alpine is the client-local coordination layer when needed;
- shell-specific Blade component boundary is accepted;
- `--w-shell-*` component-level tokens are allowed;
- no Phase 4+ generic primitive implementation has begun.
