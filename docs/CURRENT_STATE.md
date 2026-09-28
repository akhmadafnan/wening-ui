# Wening UI — Current State

**Canonical phase:** PHASE 1 — Repository & Engineering Baseline  
**Phase 0 status:** CLOSED_GREEN  
**Tracking issue:** #3  
**Previous phase:** PHASE 0 — CLOSED_GREEN  
**Implementation status:** ENGINEERING BASELINE ONLY — UI IMPLEMENTATION NOT YET STARTED  
**Active workstream:** PHASE 1B — Bootstrap & Repository Topology

## Phase 0 closeout

Phase 0 was accepted by the product owner after the product/design baseline and technical north star were reviewed.

The accepted baseline includes:

- Wening UI identity and product positioning;
- information-first, calm, structured design principles;
- Light + Dark + System theme direction;
- operational/focus mode as a first-class product requirement;
- Gate Muktamar NU, Hermes Reflect, Tabler, shadcn/ui, and Flux as references/benchmarks rather than Wening runtime identity;
- GitHub as canonical system of record;
- bounded agentic workflow with stop-on-failure behavior;
- Laravel + Blade + Livewire + Alpine + Tailwind as the first reference-implementation north star;
- Wening-owned design tokens, component APIs, and visual language;
- Blade/Alpine/Livewire responsibility boundaries.

See `docs/PHASE0_CLOSEOUT.md` and `docs/DECISION_REGISTER.md`.

## Phase 1A result

**PHASE 1A — Runtime & Version Freeze: CLOSED_GREEN**

Frozen baseline:

- PHP 8.3 compatibility floor;
- PHP 8.4 recommended runtime/development baseline;
- PHP 8.3 / 8.4 / 8.5 CI matrix;
- Laravel 13.x;
- Livewire 4.x with initial `^4.4` constraint;
- Composer 2.10.x;
- Node 24 LTS + npm 11.x;
- Tailwind 4.x + Vite 8.x + laravel-vite-plugin 3.x;
- committed Composer/npm lockfiles and reproducible install commands.

See `docs/RUNTIME_VERSION_POLICY.md`.

## Current allowed work

Phase 1B may now:

- audit current stable runtime/framework versions;
- choose exact supported versions;
- decide minimal bootstrap/starter strategy;
- define repository topology;
- establish local development commands;
- establish formatter/lint/static-analysis policy;
- establish unit/feature/component/browser testing baseline;
- establish accessibility and visual-regression tooling;
- establish dependency/update policy;
- establish CI and required evidence;
- establish GitHub branch/PR protection strategy.

## Still NOT allowed

Until Phase 1 itself is frozen, do not:

- implement Wening design tokens;
- build reusable UI components;
- build the sidebar/app shell;
- build dashboards/tables/workflows;
- copy/adapt implementation code from references;
- begin packaging/release work.

A minimal framework bootstrap may be created during Phase 1 only when it is part of the approved engineering-baseline plan and exists to verify tooling/reproducibility—not to start product UI implementation.

## Locked technical north star

```text
Laravel
  └── Blade
       ├── Wening presentational components
       ├── Alpine.js for local browser state
       └── Livewire for server/application state

Tailwind CSS
  └── styling engine beneath Wening-owned tokens/components
```

Responsibility rule:

`HTML/CSS → Blade → Blade + Alpine → Livewire`

Use the lowest-complexity layer that correctly owns the state.

## Phase 1 exit

Phase 1 closes only when:

1. exact supported runtime/framework versions are recorded;
2. repository/bootstrap strategy is reproducible;
3. development/test/build commands are canonical;
4. CI and static-quality gates exist and pass;
5. dependency policy and update policy are explicit;
6. browser/E2E, accessibility, and visual-regression strategy are decided;
7. GitHub workflow/branch policy is documented;
8. product owner accepts the engineering baseline;
9. `CURRENT_STATE.md` points to Phase 2 as the next allowed phase.

## Next expected phase after Phase 1

**PHASE 2 — Design Tokens & Theme Architecture**
