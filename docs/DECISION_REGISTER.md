# Wening UI — Decision Register

This register records product and architecture decisions that agents must not silently reinterpret.

## Status meanings

- **LOCKED** — accepted baseline; changing it requires an explicit new decision.
- **PROVISIONAL** — current direction, still reviewable before implementation depends on it.
- **OPEN** — intentionally undecided.
- **SUPERSEDED** — replaced by a later decision; retained for history.

| ID | Decision | Status | Rationale |
|---|---|---|---|
| D-001 | Product name is **Wening UI**; working tagline is **“Calm interfaces for serious applications.”** | LOCKED | Gives the project a distinct identity centered on clarity and calm. |
| D-002 | Wening will be developed as an original reusable design system/application foundation, not by adopting a full admin template as its product identity. | LOCKED | Existing templates repeatedly conflict with the desired visual and product character. |
| D-003 | The core design philosophy is information-first, calm, structured, restrained, and suitable for serious/data-heavy applications. | LOCKED | Derived from the product need and preferred operational references. |
| D-004 | Theme strategy must support **Light, Dark, and System**. Light is the default design direction; dark is a first-class native theme. | LOCKED | Avoids a dark-only product while preserving high-quality dark operational use. |
| D-005 | Gate Muktamar NU, Hermes Reflect, and Tabler are **references**, not mandatory dependencies and not cloning targets. | LOCKED | Keeps Wening original and prevents reference-specific implementation baggage. |
| D-006 | GitHub is the canonical system of record for source, decisions, issues, PRs, review evidence, and current state. | LOCKED | Enables durable human/agent collaboration across sessions and tools. |
| D-007 | Product owner retains final authority for scope, visual judgment, and UAT acceptance. | LOCKED | Visual/product judgment cannot be delegated silently to an agent. |
| D-008 | Development uses bounded agentic workflow: ORIENT → AUDIT → SPEC → PLAN → EXECUTE → TEST → UAT/REVIEW → CHECKPOINT → DOCUMENT → NEXT, with stop-on-failure behavior. | LOCKED | Reduces agent drift, hidden failures, and uncontrolled technical debt. |
| D-009 | The first reference implementation targets **Laravel + Livewire + Blade**, while Wening's design concepts remain conceptually framework-independent. | LOCKED | Matches the intended product ecosystem while keeping the design language reusable beyond one runtime. |
| D-010 | **Tailwind CSS** is Wening's styling engine for the first reference implementation. Wening owns the design tokens, component APIs, and visual language. | LOCKED | Tailwind is sufficiently unopinionated for a custom design system and avoids fighting a pre-styled admin framework. |
| D-011 | Wening's public license is not yet selected. | OPEN | Licensing should be decided before external reuse/release, not assumed from references. |
| D-012 | Packaging model (application starter, package, component library, or multi-package structure) is not yet selected. | OPEN | Premature package boundaries would constrain architecture before components exist. |
| D-013 | Operational/focus mode without the normal admin sidebar is a first-class product requirement. | LOCKED | Gate/check-in, verification, scanner, kiosk, and monitoring tasks need a focused shell. |
| D-014 | Avoid “card everywhere” UI. Cards must represent meaningful grouping, interaction, or elevation. | LOCKED | Plain information hierarchy is part of Wening's identity. |
| D-015 | Stateless/presentational reusable UI primitives should default to **Blade components**, not Livewire components. | LOCKED | Keeps component contracts simple, portable inside Laravel, and cheaper to render and reason about. |
| D-016 | **Alpine.js** is used for local browser-only state and interaction where server round-trips are unnecessary. | LOCKED | Gives small interactive behavior a clear home without expanding the JavaScript architecture. |
| D-017 | **Livewire** is used when UI behavior depends on server/application state, validation, persistence, queries, or server-driven workflows. | LOCKED | Prevents both overusing Livewire for simple atoms and duplicating server state in client code. |
| D-018 | **shadcn/ui** is a component-anatomy, interaction, accessibility, and design-system benchmark only; it is not a runtime dependency for the Laravel/Livewire reference implementation. | LOCKED | shadcn's philosophy is useful, but its primary React/TSX implementation does not match Wening's chosen server-driven stack. |
| D-019 | **Bootstrap is not part of Wening's core UI foundation** for the first reference implementation. | LOCKED | Wening would otherwise spend substantial effort undoing Bootstrap's visual opinions to reach its own design language. |
| D-020 | **Flux UI** may be studied as a Livewire UX benchmark, but Wening core components must not depend on Flux. | LOCKED | Wening needs ownership of its reusable component contracts and should avoid making its core identity dependent on another component product. |

## Layer responsibility rule

Use the lowest-complexity layer that correctly owns the state:

`HTML/CSS → Blade → Blade + Alpine → Livewire`

- HTML/CSS for native document behavior and pure presentation.
- Blade for reusable stateless/presentational components.
- Blade + Alpine for local browser state.
- Livewire for server/application state.

A higher layer must not be introduced merely for stylistic consistency.

## Change protocol

To change a LOCKED decision:

1. record the reason and evidence;
2. add a new decision entry;
3. mark the previous entry SUPERSEDED where appropriate;
4. update affected canonical docs;
5. require product-owner approval before dependent implementation continues.
