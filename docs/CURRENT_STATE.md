# Wening UI — Current State

**Canonical phase:** PHASE 0 — Product, Design & Agentic Governance Freeze  
**Tracking issue:** #1  
**Implementation status:** NOT STARTED BY DESIGN

## What exists

- GitHub repository initialized.
- Product name and high-level identity established.
- Phase 0 governance work is being prepared on a dedicated branch.
- Canonical product/design/agent documents are being introduced before implementation.
- Technical north star for the first reference implementation has been approved at the architecture level.

## Current accepted direction

Wening UI is intended to be an original, reusable, information-first application design system.

The current baseline includes:

- calm and structured visual language;
- light-first design with native dark/system modes;
- semantic theming;
- data-heavy application support;
- focused operational mode;
- public and authenticated surfaces sharing one design language;
- GitHub-first agentic engineering;
- Laravel + Blade + Livewire as the first server-driven application direction;
- Alpine.js for local browser state;
- Tailwind CSS as the styling engine beneath Wening-owned components;
- shadcn/ui, Flux, Tabler, Reflect, and Gate Muktamar used as references/benchmarks rather than runtime identity.

See `docs/DECISION_REGISTER.md` and `docs/TECHNICAL_DIRECTION.md` for decision status and responsibility boundaries.

## What is intentionally NOT decided yet

Do not infer answers for these items:

- exact framework/package versions;
- starter-kit choice or no starter kit;
- package/repository distribution model;
- icon library;
- chart library;
- font delivery strategy;
- testing and static-analysis tooling;
- browser/E2E tooling;
- visual-regression tooling;
- accessibility tooling;
- public license.

These belong to Phase 1 or later and must be evaluated explicitly.

## Allowed work now

Only Phase 0 work is allowed:

- review/refine product vision;
- review/refine design principles;
- confirm reference boundaries;
- confirm agent/Git governance;
- refine roadmap, quality gates, and UAT protocol;
- record decisions;
- review the approved technical north star without installing it yet.

## Not allowed yet

Do not:

- install Laravel;
- install Livewire/Tailwind;
- implement tokens in CSS;
- build components;
- build the sidebar/dashboard;
- import Reflect CSS;
- adapt Tabler/shadcn/Flux source as Wening core;
- start packaging.

## Phase 0 exit

Phase 0 closes only when:

1. all canonical Phase 0 documents are present;
2. product owner reviews the baseline;
3. conflicts/open questions that block Phase 1 are resolved or explicitly deferred;
4. the Phase 0 PR passes review;
5. `CURRENT_STATE.md` is updated to identify the next allowed phase.

## Next expected phase

**PHASE 1 — Repository & Engineering Baseline**

Phase 1 will turn the locked technical north star into an executable engineering baseline: exact supported versions, repository structure, installation/bootstrap strategy, CI, testing/static checks, development commands, and dependency policy before design-token implementation.
