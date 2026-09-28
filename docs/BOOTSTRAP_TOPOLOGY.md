# Wening UI — Bootstrap & Repository Topology

**Phase:** 1B — Bootstrap & Repository Topology  
**Verdict:** CLOSED_GREEN

This document freezes how the first executable Wening reference implementation will be hosted. It does not yet install the framework; implementation happens later in Phase 1F after the quality/CI strategy is frozen.

## Decision

Use a **fresh minimal Laravel 13 application at the repository root**.

Do **not** use an official Laravel starter kit for the Phase 1 bootstrap.

## Why no starter kit

Laravel 13 starter kits are useful application accelerators, but they include product-level opinions that conflict with Wening's role as a design-system foundation.

At Phase 1B audit:

- the official Livewire starter kit uses Livewire 4 + Flux UI;
- React/Vue/Svelte starter kits use their own frontend stacks and shadcn-family components;
- starter kits include authentication/dashboard/settings scaffolding.

Wening has already locked:

- its own component contracts;
- Flux as a benchmark rather than a core dependency;
- Blade/Alpine/Livewire responsibility boundaries;
- an original visual language.

Therefore the cleanest bootstrap is the minimal Laravel application, then explicitly add Livewire and Wening's chosen tooling.

## Repository topology

The first reference implementation is **app-first**, not package-first.

Target root:

```text
wening-ui/
├── app/
├── bootstrap/
├── config/
├── database/
├── docs/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── .github/
├── AGENTS.md
├── composer.json
├── composer.lock
├── package.json
├── package-lock.json
└── ...
```

Wening-specific source initially lives inside normal Laravel application locations.

Expected design-system locations once their phases begin:

```text
resources/
├── css/
│   └── wening/
├── views/
│   └── components/
│       └── wening/
└── js/
    └── ... only where genuinely required
```

Stateful server-driven behavior should use a clearly Wening-scoped Livewire namespace only where Livewire is actually needed.

Final package extraction/distribution remains deferred. An app-first reference implementation is not a decision that Wening can never become a Composer/package distribution later.

## Internal reference surface

Wening will eventually host an internal style-guide/reference surface inside this same application.

Purpose:

- deterministic visual examples;
- component-state coverage;
- browser/E2E targets;
- screenshot baselines;
- accessibility checks;
- manual product-owner UAT.

The route/name is not frozen yet.

It must not become a second product architecture or require a separate demo repository before there is evidence that separation is useful.

## Authentication policy

Phase 1 does not scaffold authentication.

Reasons:

- authentication is not required to prove the engineering baseline;
- starter auth views would introduce visual patterns before Wening tokens/components exist;
- Wening core should not depend on a specific auth implementation.

Authentication examples can be added later when public/auth surfaces are intentionally designed.

## Database policy

Use SQLite for the default development/test bootstrap.

Goals:

- zero external database service required for first clone/setup;
- straightforward CI;
- reproducible agent execution;
- fast local tests.

This does not define which database Wening-consuming production applications must use.

Database-specific UI behavior must never become part of Wening's component contract.

## Environment policy

Commit:

```text
.env.example
```

Never commit:

```text
.env
.env.production
secrets
vendor/
node_modules/
public/build/
runtime/generated artifacts
local database files containing user data
```

The Laravel 13 skeleton's ignore rules are the starting point and may be strengthened during the actual bootstrap.

## Generated files

Generated artifacts should be recreated by canonical commands rather than committed unless a later phase explicitly identifies an artifact as a release deliverable.

Examples not committed in the reference application:

- Composer vendor tree;
- npm node_modules tree;
- Vite production build output;
- runtime cache;
- logs;
- local secrets.

## Phase 1B closeout

Phase 1B is CLOSED_GREEN because:

- starter-kit vs minimal bootstrap is decided;
- app-first topology is decided;
- auth responsibility is bounded;
- default development/test database is decided;
- environment/generated-file policy is explicit;
- future style-guide host is defined conceptually;
- no framework or UI implementation was introduced.

**Next allowed work:** Phase 1C — Quality Toolchain.
