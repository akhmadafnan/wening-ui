# PHASE 1 Plan — Repository & Engineering Baseline

**Tracking issue:** #3  
**Branch:** `phase/01-engineering-baseline`  
**Status:** IN PROGRESS

## Objective

Operationalize the Phase 0 technical north star into a reproducible engineering baseline before any Wening visual/component implementation begins.

## Execution sequence

Phase 1 is intentionally split into bounded workstreams:

1. **1A — Runtime & Version Freeze — CLOSED_GREEN**
2. **1B — Bootstrap & Repository Topology — CLOSED_GREEN**
3. **1C — Quality Toolchain — CLOSED_GREEN**
4. **1D — Browser, Accessibility & Visual Evidence**
5. **1E — CI & GitHub Governance**
6. **1F — Minimal Engineering Bootstrap & Proof**
7. **1G — Phase 1 Closeout**

Do not jump to 1F merely because framework installation is easy. Decisions and evidence must precede implementation.

## 1A — Runtime & Version Freeze

### Official evidence at phase start

Laravel 13:

- release line: 13.x;
- released March 17, 2026;
- PHP compatibility: 8.3–8.5;
- minimum PHP: 8.3;
- security-fix window currently extends to March 17, 2028.

Source:
https://laravel.com/framework/docs/releases

PHP:

- PHP 8.5 is the current stable branch at phase start;
- PHP 8.5 remains under active support through December 31, 2027;
- PHP 8.4 and 8.3 are also supported, but have shorter remaining support windows.

Sources:
https://www.php.net/supported-versions.php
https://www.php.net/downloads.php

Livewire:

- current documentation line: 4.x;
- supports Laravel 10+ and PHP 8.1+;
- Livewire includes/initializes Alpine and warns against loading Alpine twice.

Source:
https://livewire.laravel.com/docs/4.x/installation

Tailwind:

- current Laravel/Vite guidance uses `tailwindcss` plus `@tailwindcss/vite`;
- CSS is imported with `@import "tailwindcss"`.

Source:
https://tailwindcss.com/docs/installation/framework-guides/laravel/vite

Node.js:

- Node 24 (Krypton) is LTS;
- Node 26 is Current at phase start;
- for a reproducible application baseline, an LTS line is the default candidate unless tooling evidence requires otherwise.

Source:
https://nodejs.org/en/about/previous-releases

### Frozen result — CLOSED_GREEN

See `docs/RUNTIME_VERSION_POLICY.md`.

- PHP compatibility floor: **8.3**
- PHP recommended baseline: **8.4**
- PHP CI matrix: **8.3 / 8.4 / 8.5**
- Laravel: **13.x**
- Livewire: **4.x**, initial constraint `^4.4`
- Composer: **2.10.x**
- Node.js: **24 LTS**
- npm: **11.x**
- Tailwind CSS: **4.x**
- Vite: **8.x**
- Laravel Vite plugin: **3.x**
- Lockfiles committed; CI uses `composer install` + `npm ci`

Product-owner approval for the PHP policy has been recorded. Phase 1A is closed; Phase 1B is the next allowed workstream.

## 1B — Bootstrap & Repository Topology — CLOSED_GREEN

See `docs/BOOTSTRAP_TOPOLOGY.md`.

Frozen result:

- fresh minimal Laravel 13 application;
- **no official starter kit** in Phase 1;
- app-first reference implementation at repository root;
- package extraction deferred until component contracts stabilize;
- no authentication scaffold in the engineering bootstrap;
- SQLite default for local development/tests;
- internal style-guide/reference surface will live in the same app when components exist;
- conventional Laravel source placement for Wening Blade/CSS/Livewire code;
- `.env.example` committed; secrets/generated dependency/build trees excluded.

Phase 1C is the next allowed workstream.

## 1C — Quality Toolchain — CLOSED_GREEN

See `docs/QUALITY_TOOLCHAIN.md`.

Frozen baseline:

- Laravel Pint 1.x;
- Larastan 3.x + PHPStan 2.x at level 8, no generated baseline;
- Pest 4.x + Pest Laravel plugin 4.x;
- Pest 5 deliberately rejected while PHP 8.3 is supported;
- Pest architecture tests for enforceable contracts;
- Laravel PAO retained as the agent-optimized feedback layer;
- Composer/npm dependency audits;
- Vite production build as a required engineering check;
- Rector/ESLint/Stylelint deferred until evidence shows they are needed.

Phase 1D is the next allowed workstream.

## 1D — Browser, Accessibility & Visual Evidence

Decide how Wening will prove UI quality later without prematurely implementing UI.

Required capabilities:

- headless browser/E2E;
- screenshots;
- visual-regression comparison;
- automated accessibility checks;
- browser-console error detection;
- deterministic viewport matrix.

## 1E — CI & GitHub Governance

Create a CI baseline that can eventually enforce:

- install/reproducibility;
- format/lint/static checks;
- tests;
- production asset build;
- dependency audit as appropriate.

Define which checks become required before merge once GitHub branch protection is enabled.

## 1F — Minimal Engineering Bootstrap

Only after the preceding decisions are documented:

- create the minimal Laravel reference app baseline;
- install the approved Livewire/Tailwind integration;
- prove build and tests;
- add no Wening product UI beyond a minimal technical smoke surface if necessary;
- record canonical commands.

## 1G — Closeout

Phase 1 closes only after:

- exact toolchain is recorded;
- install/build/test is reproducible;
- CI is green;
- agent/reviewer evidence is sufficient;
- product owner approves the engineering baseline;
- Phase 2 is explicitly authorized.

## Stop conditions

Stop and surface a blocker if:

- a candidate runtime is incompatible with another locked dependency;
- a starter/bootstrap path introduces unwanted UI opinions;
- a quality tool cannot run reproducibly in CI;
- branch/CI policy cannot be enforced as documented;
- the work starts drifting into design-token/component implementation.
