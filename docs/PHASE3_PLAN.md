# PHASE 3 Plan — Application Shell

**Tracking issue:** #14
**Branch:** `phase/03-application-shell`
**Status:** IN PROGRESS
**Active workstream:** 3B — Desktop Application Shell

## Objective

Turn the CLOSED_GREEN Phase 2 design-token foundation into Wening's reusable application frame for serious Laravel applications.

The shell must establish:

- desktop sidebar;
- topbar;
- page/content frame;
- navigation hierarchy;
- current-page semantics;
- responsive/mobile navigation;
- local shell state;
- Light/Dark/System behavior;
- keyboard/focus baseline;
- reusable shell-specific Blade contracts.

It must not become a dashboard, data-table system, generic component library, or public frontend.

## Execution model

Phase 3 uses four waves.

### Wave A — Contract

**3A — Shell Contract & Information Architecture — CLOSED_GREEN**

Freeze:

- shell anatomy;
- layout measurements;
- navigation model;
- shell-specific component boundaries;
- local state ownership;
- responsive behavior;
- accessibility requirements;
- allowed placeholder specimen content;
- Phase 4+ boundaries.

Exit:

- `docs/SHELL_ARCHITECTURE.md` accepted;
- relevant decisions locked;
- no production shell code before contract freeze.

### Wave B — Static shell structure

**3B — Desktop Shell — ACTIVE** — tracked by #18

Implement:

- application layout;
- desktop sidebar;
- topbar;
- page header/content frame;
- grouped navigation;
- active/current states;
- Light/Dark semantic styling;
- Comfortable/Compact compatibility.

This lane may use static/default state first.

### Wave C — Behavior and responsive shell

**3C — Shell Navigation & Local State** — tracked by #19

Implement:

- collapsed/expanded sidebar;
- persistence where justified;
- local-state ownership;
- theme/density integration reuse.

**3D — Responsive / Mobile Shell** — tracked by #20

Implement:

- mobile navigation trigger;
- accessible mobile navigation surface;
- overlay/backdrop;
- close behavior;
- task-preserving content reflow.

**3E — Shell Visual States** — tracked by #21

Cover:

- hover;
- current;
- focus-visible;
- collapsed labels/accessibility;
- user/action slots;
- shell-only structural states.

### Wave D — Verification

**3F — Accessibility & Keyboard Baseline** — tracked by #22

Verify:

- landmarks;
- `aria-current`;
- keyboard navigation;
- mobile open/close semantics;
- Escape behavior;
- focus visibility;
- overlay focus behavior;
- reduced motion;
- runtime error policy.

**3G — Verification, Visual UAT & Closeout** — tracked by #23

Evidence:

- required CI;
- browser tests;
- viewport matrix;
- Light/Dark/System;
- Comfortable/Compact regression;
- axe;
- reviewed visual evidence;
- product-owner UAT;
- closeout docs.

## Shell scope boundary

Phase 3 may create shell-specific Blade contracts under:

```text
resources/views/components/wening/shell/
resources/views/layouts/
```

Likely shell components:

```text
app
sidebar
sidebar-section
nav-item
topbar
page-header
content-frame
mobile-nav
```

Names may be refined by 3A.

Shell-specific controls do not establish the public Phase 4 Core Primitives API.

## Visual direction

Canonical direction: `docs/DESIGN_DIRECTION.md`.

Application shell interpretation:

- Inter-dominant;
- institutional green for current/primary states;
- neutral surfaces dominate;
- light sidebar/topbar reference direction;
- thin separators;
- modest radius;
- little/no shadow for normal chrome;
- clear content frame;
- operational rather than showcase-dashboard composition.

## Proposed measurements

Subject to 3A freeze:

- expanded sidebar: 256px;
- collapsed sidebar: 72px;
- topbar: 64px;
- desktop content padding: 24–32px;
- mobile content padding: 16px;
- sidebar/nav row target: 40px comfortable, 36px compact;
- sidebar section gap: token-driven;
- shell border: 1px semantic border;
- desktop shell should use available width rather than forcing a narrow marketing max-width.

## State principles

Use the lowest-complexity owner.

- route/current state: server/Blade;
- sidebar collapse: local browser state;
- mobile open/close: local browser state;
- theme: existing Phase 2 theme runtime;
- density: existing Phase 2 density contract;
- application/user/business state: deferred unless genuinely required.

Phase 3 must not introduce server round-trips for purely local shell interaction.

## Responsive principles

Desktop:

- persistent sidebar;
- topbar and content frame remain stable.

Tablet:

- shell may use collapsed rail or drawer based on width/task evidence;
- content remains primary.

Mobile:

- no permanently occupying sidebar;
- navigation opens from a clear trigger;
- working content keeps full width;
- no desktop layout squeezed into a narrow viewport.

## Accessibility principles

- use semantic `nav`, `header`, `main`, and appropriate labels;
- current navigation uses `aria-current="page"`;
- mobile nav control exposes state;
- visible focus survives Light/Dark;
- controls keep meaningful accessible names in collapsed mode;
- Escape closes modal/drawer navigation when open;
- no hidden interactive descendants remain keyboard reachable;
- reduced motion remains respected.

## Non-scope

Do not implement:

- public Button/Input/Select/etc. APIs;
- production data tables;
- production dashboard analytics;
- workflow UI;
- operational Gate shell;
- public/frontend/auth production pages;
- product-specific business logic;
- package extraction.

## Exit criteria

Phase 3 closes when:

1. 3A–3F accepted;
2. reusable desktop/mobile shell works;
3. navigation/current states work;
4. shell local state ownership is correct;
5. Light/Dark/System work;
6. viewport matrix works;
7. keyboard/axe/runtime evidence passes;
8. no later-phase scope leaks;
9. product-owner shell UAT passes;
10. closeout recorded;
11. `CURRENT_STATE.md` authorizes Phase 4 — Core Primitives.

## Stop conditions

Stop if:

- shell implementation bypasses semantic tokens;
- reference-specific layout/code is copied;
- generic primitive APIs start expanding inside shell work;
- shell state is moved to Livewire without server-state justification;
- mobile navigation is visually hidden but keyboard reachable;
- accessibility/browser gates fail;
- responsive behavior merely compresses desktop without preserving the task.
