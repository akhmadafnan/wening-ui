# Wening UI — Current State

**Canonical phase:** PHASE 3 — Application Shell
**Phase 0 status:** CLOSED_GREEN  
**Tracking issue:** #14
**Phase 1 status:** CLOSED_GREEN
**Phase 2 status:** CLOSED_GREEN
**Phase 3 status:** IN PROGRESS
**Previous phase:** PHASE 1 — CLOSED_GREEN
**Implementation status:** APPLICATION SHELL IN PROGRESS — CORE PRIMITIVES/DATA/WORKFLOW NOT YET STARTED
**Active workstream:** PHASE 3A — Shell Contract & Information Architecture

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

**PHASE 2 — CLOSED_GREEN**

Tracking issue: **#6**

Branch: `phase/02-design-tokens-theme`

Execution plan: `docs/PHASE2_PLAN.md`

Phase 2 is intentionally limited to the design-token and theme foundation that later Wening components will consume.

## Phase 2A result

**PHASE 2A — Token Architecture & Naming Contract: CLOSED_GREEN**

Frozen contracts:

- reference/primitive → semantic → component-consumption layering;
- canonical `--w-*` runtime namespace;
- Wening-prefixed Tailwind aliases mapped with CSS-first theme variables;
- Tailwind default palette remains available to host apps while Wening core uses semantic tokens;
- Light/Dark/System root theme contract through `data-w-theme`;
- Light fallback/default; System follows `prefers-color-scheme`;
- theme switching by semantic-variable remapping rather than duplicated per-component dark color classes;
- brand-primary semantics are overridable without changing component structure;
- hard-coded product colors/raw palette bypass is prohibited in normal Wening core;
- local theme preference storage contract uses `wening-theme`.

See `docs/TOKEN_ARCHITECTURE.md` and decisions D-058 through D-065.

## Phase 2B–2E result

**PHASE 2B–2E — SPEC_GREEN**

Accepted domain specifications:

- #7 / `docs/COLOR_THEME_SPEC.md`;
- #8 / `docs/TYPOGRAPHY_DENSITY_SPEC.md`;
- #9 / `docs/SPATIAL_SHAPE_SPEC.md`;
- #10 / `docs/MOTION_FOCUS_SPEC.md`.

These specifications are accepted for integrated implementation. Exact visual values remain subject to the combined Phase 2 product-owner UAT in 2G.

## Phase 2F result

**PHASE 2F — IMPLEMENTATION_GREEN**

Integrated implementation is complete under `resources/css/wening` plus the bounded theme runtime/specimen harness.

Verified checkpoint:

- commit: `be049da4c767208d7da6b153f386e7a49b93bf69`;
- GitHub Actions run: `36691878437`;
- PHP Quality — GREEN;
- PHP Tests (8.3) — GREEN;
- PHP Tests (8.4) — GREEN;
- PHP Tests (8.5) — GREEN;
- Frontend — GREEN;
- Browser / Chromium — GREEN.

Corrective evidence included semantic-token guard hardening, axe-driven Light subtle-text contrast correction, and browser-independent reduced-motion assertion.

## Product-owner typography refinement

Typography direction is now LOCKED through D-066…D-068:

- Sora = selective display/brand personality;
- Inter = primary UI/reading workhorse;
- frontend/public = Sora + Inter;
- backend/application = Inter-dominant with selective Sora;
- monospace = technical metadata only;
- system-ui = fallback, not canonical identity;
- no required remote font CDN.

## Product-owner visual-direction refinement

Reference direction is now LOCKED through D-069…D-073:

- default Wening reference primary = institutional green;
- semantic primary remains brand-overridable;
- Digdaya NU is an additional reference, never a cloning/dependency target;
- public/frontend = institutional ecosystem product UI;
- backend/application = operational admin clarity;
- auth/entry may use restrained split branded composition;
- previous information-first, no-card-everywhere, Light/Dark/System, density, accessibility, and originality decisions remain unchanged.
- canonical direction document: `docs/DESIGN_DIRECTION.md`.

## Phase 2G result

**PHASE 2G — CLOSED_GREEN**

Product-owner visual/design UAT: **PASS**.

Final accepted implementation checkpoint:

- commit: `b2838be4ce4e652e8c239cb2492c993c8d21ba29`;
- GitHub Actions run: `36700975097`;
- all six required CI jobs GREEN.

Canonical closeout: `docs/PHASE2_CLOSEOUT.md`.

## Phase 3 orientation

**PHASE 3 — IN PROGRESS**

Tracking issue: **#14**

Branch: `phase/03-application-shell`

Execution plan: `docs/PHASE3_PLAN.md`

Phase 3 turns the accepted backend/application direction into Wening's reusable application frame.

## Current allowed work

Phase 3A may now:

- audit the existing token/theme specimen and Laravel view structure;
- freeze shell anatomy and shell-specific component boundaries;
- define desktop sidebar/topbar/content-frame behavior;
- define navigation metadata/current-state semantics;
- define local shell state ownership;
- define responsive/mobile drawer behavior;
- define accessibility/keyboard requirements;
- prepare bounded shell implementation workstreams.

After 3A is frozen, shell implementation may proceed in bounded 3B–3F workstreams.

## Still NOT allowed

Until the relevant Phase 3 workstream is approved, do not:

- build the generic Core Primitives library;
- build data-table/search/filter/bulk-action systems;
- build workflow/Kanban/timeline systems;
- implement operational Gate/focus-mode production surfaces;
- implement public/frontend or production auth surfaces;
- introduce new UI runtime dependencies;
- extract Wening into a package;
- copy implementation code from references.

A bounded shell specimen may use representative placeholder navigation/content only to prove the shell.

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

## Next expected phase

**PHASE 3 — Application Shell**
