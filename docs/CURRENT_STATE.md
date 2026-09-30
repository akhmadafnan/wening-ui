# Wening UI — Current State

**Canonical phase:** PHASE 2 — Design Tokens & Theme Architecture
**Phase 0 status:** CLOSED_GREEN  
**Tracking issue:** #6
**Phase 1 status:** CLOSED_GREEN
**Phase 2 status:** IN PROGRESS
**Previous phase:** PHASE 1 — CLOSED_GREEN
**Implementation status:** TOKEN/THEME ARCHITECTURE ONLY — REUSABLE COMPONENT IMPLEMENTATION NOT YET STARTED
**Active workstream:** PHASE 2A — Token Architecture & Naming Contract

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

## Phase 1B result

**PHASE 1B — Bootstrap & Repository Topology: CLOSED_GREEN**

Frozen bootstrap:

- fresh minimal Laravel 13 app;
- no starter kit;
- app-first root topology;
- package extraction deferred;
- no auth scaffold in Phase 1;
- SQLite local/test default;
- internal reference/style-guide surface in the same app later;
- conventional Wening source locations;
- strict environment/generated-file policy.

See `docs/BOOTSTRAP_TOPOLOGY.md`.

## Phase 1C result

**PHASE 1C — Quality Toolchain: CLOSED_GREEN**

Frozen quality baseline:

- Laravel Pint 1.x;
- Larastan 3.x / PHPStan 2.x, level 8;
- Pest 4.x + pest-plugin-laravel 4.x;
- architecture tests via Pest;
- Laravel PAO retained for agent-optimized tool output;
- dependency audits + production asset build;
- no unnecessary frontend lint/refactor stack yet.

See `docs/QUALITY_TOOLCHAIN.md`.

## Phase 1D result

**PHASE 1D — Browser, Accessibility & Visual Evidence: CLOSED_GREEN**

Frozen browser evidence:

- Playwright Test 1.x;
- axe integration;
- Chromium canonical visual baseline;
- Firefox/WebKit behavioral smoke;
- committed/reviewed screenshot baselines;
- deterministic viewport matrix;
- console/page/network error policy;
- manual accessibility/UAT retained.

See `docs/BROWSER_EVIDENCE.md`.

## Phase 1E result

**PHASE 1E — CI & GitHub Governance: CLOSED_GREEN**

Frozen CI/governance:

- GitHub Actions with explicit quality/test/frontend/browser jobs;
- PHP 8.3/8.4/8.5 test matrix;
- PHP 8.4 primary quality lane;
- Node 24 frontend lane;
- Chromium browser evidence;
- PR/squash-merge project policy for main;
- least privilege and non-mutating CI;
- Dependabot update workflow.

See `docs/CI_GOVERNANCE.md`.

## Phase 1F result

**PHASE 1F — Minimal Engineering Bootstrap & Proof: CLOSED_GREEN**

Implementation and CI evidence are recorded in `docs/PHASE1F_CLOSEOUT.md`.

## Phase 1 closeout

**PHASE 1 — CLOSED_GREEN**

Product-owner UAT: **PASS**.

Canonical closeout evidence is recorded in `docs/PHASE1_CLOSEOUT.md`.

## Phase 2 orientation

**PHASE 2 — IN PROGRESS**

Tracking issue: **#6**

Branch: `phase/02-design-tokens-theme`

Execution plan: `docs/PHASE2_PLAN.md`

Phase 2 is intentionally limited to the design-token and theme foundation that later Wening components will consume.

## Current allowed work

Phase 2A may now:

- audit the existing Tailwind/CSS baseline;
- define token taxonomy and naming boundaries;
- define the runtime theme contract for Light, Dark, and System;
- define Tailwind-to-Wening semantic-variable integration;
- define customization/brand-override boundaries;
- define enforceable rules preventing hard-coded product color usage in Wening core;
- update canonical documentation for accepted Phase 2 architecture.

Specification/audit work for 2B–2E may proceed in parallel where it does not mutate shared implementation or bypass 2A decisions.

## Still NOT allowed

Until the relevant Phase 2 workstream is approved, do not:

- build reusable Button/Input/Select/Badge/etc. component APIs;
- build the sidebar/topbar/application shell;
- build dashboards/tables/workflows;
- implement the operational Gate screen;
- build public/auth product surfaces;
- introduce Bootstrap, shadcn/ui, Flux UI, or another runtime UI framework;
- extract Wening into a package;
- copy/adapt implementation code from references.

A bounded token/theme specimen page is allowed only as a verification surface. It must not become an accidental component library.

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
