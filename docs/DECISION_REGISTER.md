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
| D-009 | Laravel + Livewire is the preferred first integration target, while design concepts remain framework-independent. | PROVISIONAL | Matches intended usage, but the concrete implementation baseline belongs to a later technical phase. |
| D-010 | CSS/UI foundation (custom CSS only, Bootstrap primitives, Tailwind, another option) is not yet selected. | OPEN | Must be evaluated against accessibility, theming, maintainability, package weight, and agent legibility. |
| D-011 | Wening's public license is not yet selected. | OPEN | Licensing should be decided before external reuse/release, not assumed from references. |
| D-012 | Packaging model (application starter, package, component library, or multi-package structure) is not yet selected. | OPEN | Premature package boundaries would constrain architecture before components exist. |
| D-013 | Operational/focus mode without the normal admin sidebar is a first-class product requirement. | LOCKED | Gate/check-in, verification, scanner, kiosk, and monitoring tasks need a focused shell. |
| D-014 | Avoid “card everywhere” UI. Cards must represent meaningful grouping, interaction, or elevation. | LOCKED | Plain information hierarchy is part of Wening's identity. |

## Change protocol

To change a LOCKED decision:

1. record the reason and evidence;
2. add a new decision entry;
3. mark the previous entry SUPERSEDED where appropriate;
4. update affected canonical docs;
5. require product-owner approval before dependent implementation continues.
