# Wening UI — Technical Direction

This document records the approved technical north star for the first Wening reference implementation. Exact package versions, installation commands, repository topology, and CI tooling remain Phase 1 work.

## Approved application stack

```text
Laravel
  └── Blade
       ├── Wening presentational components
       ├── Alpine.js for local browser state
       └── Livewire for server/application state

Tailwind CSS
  └── styling engine beneath Wening's tokens and components
```

## Responsibility boundaries

### Native HTML/CSS

Prefer native browser behavior first.

Use it for:

- document semantics;
- layout primitives;
- focusable controls;
- progressive enhancement;
- CSS-driven states that do not require application state.

Do not introduce JavaScript when the platform already solves the problem well.

### Blade

Blade is the default home for reusable stateless/presentational Wening components.

Examples:

- button;
- badge;
- avatar;
- metric;
- alert shell;
- input wrapper;
- table primitives;
- layout slots.

A component should not become Livewire merely because it is reusable.

### Alpine.js

Alpine owns small, local, ephemeral browser state.

Examples:

- open/closed disclosure state;
- local dropdown behavior;
- client-only tab switching where no server state is required;
- temporary UI preferences;
- lightweight keyboard interaction.

Alpine must not duplicate authoritative server data.

### Livewire

Livewire owns server/application state and server-driven interaction.

Examples:

- server validation;
- search/filter/query state;
- pagination;
- bulk actions;
- persistence;
- workflows;
- modal forms backed by application state;
- server-authorized actions.

Livewire should compose Wening Blade primitives instead of replacing every primitive with a Livewire component.

### Tailwind CSS

Tailwind is the styling engine, not the product identity.

Rules:

- Wening defines semantic tokens and component contracts.
- Page authors should prefer Wening components over repeating large utility-class recipes.
- Tailwind utility usage inside Wening components is an implementation detail.
- Theme values must be semantic and must support Light, Dark, and System.
- Arbitrary one-off styling that creates a competing visual language is discouraged.

## Explicit non-foundations

### shadcn/ui

Use as a benchmark for:

- component anatomy;
- interaction behavior;
- accessibility expectations;
- composability;
- state coverage;
- design-system documentation patterns.

Do not introduce React/Inertia solely to consume shadcn/ui.

### Bootstrap

Bootstrap is not part of the first Wening UI foundation.

Its documentation and interaction patterns may still be consulted where useful, but Wening should not be designed as a Bootstrap skin.

### Flux UI

Flux may be studied as a Livewire-specific UX benchmark. Wening core must keep its own component APIs and implementation ownership.

## Agent rule

When implementing a UI behavior, agents must ask in this order:

1. Can native HTML/CSS handle it correctly?
2. If reusable presentation is needed, can Blade own it?
3. If only local browser state is needed, can Alpine own it?
4. Does it genuinely require server/application state? If yes, use Livewire.

Do not skip directly to a more complex layer.

## Still open for Phase 1

The following are intentionally not frozen here:

- exact Laravel/Livewire/Tailwind versions;
- starter-kit choice or no starter kit;
- icon library;
- chart library;
- testing framework details;
- browser/E2E tooling;
- visual-regression tooling;
- accessibility tooling;
- package/repository topology;
- release/distribution model;
- public license.
