# Wening UI — Roadmap

The roadmap is phase-gated. A later phase must not silently begin while a blocking failure or required decision remains open in the current phase.

| Phase | Focus | Exit gate |
|---|---|---|
| **0** | Product, Design & Agentic Governance Freeze | Vision, design principles, references, agent protocol, technical north star, decisions, roadmap, quality/UAT rules approved |
| **1** | Repository & Engineering Baseline | Exact stack versions, bootstrap/install path, local/dev commands, CI, static checks, branch/PR workflow, dependency policy frozen |
| **2** | Design Tokens & Theme Architecture | Semantic color, typography, spacing, radius, elevation, motion, light/dark/system behavior verified |
| **3** | Application Shell | Desktop/mobile shell, sidebar, topbar, content frame, navigation behavior, focus/keyboard baseline |
| **4** | Core Primitives | Buttons, inputs, selects, checks, badges, dropdowns, overlays, feedback primitives documented/tested |
| **5** | Data UI | Metrics, tables, search/filter, pagination, selection, bulk actions, loading/empty/error states |
| **6** | Workflow UI | Timeline, stepper, activity, status systems, Kanban/workflow composition |
| **7** | Operational Mode | Focus shell for gate/check-in/scanner/verification/kiosk/monitoring; responsive and high-speed task UX |
| **8** | Public & Auth Surfaces | Landing/public/auth patterns sharing Wening DNA with lower density |
| **9** | Accessibility & Responsive Hardening | Keyboard, semantics, contrast, reduced motion, mobile/tablet, overflow and browser hardening |
| **10** | Packaging & Integration | Reusable integration model, installation path, versioning, documentation and migration approach |
| **11** | Release Candidate | Full regression, visual regression, documentation audit, representative-app UAT |
| **12** | v1.0.0 | Stable supported baseline with release notes and explicit compatibility contract |

## Roadmap rules

- Phase numbers describe dependency order, not calendar promises.
- Research/prototypes may occur early only when explicitly scoped and must not become production baseline accidentally.
- A phase may be split into bounded sub-phases (for example 3A, 3B) with their own evidence gates.
- Failed required evidence blocks forward progress.
- Locked decisions are changed only through the decision-register protocol.
- `docs/CURRENT_STATE.md` is the authority for which phase/sub-phase is currently allowed.

## Expected Phase 1 questions

The core direction is already locked: Laravel + Blade + Livewire + Alpine + Tailwind with Wening-owned components.

Phase 1 should now explicitly evaluate and freeze:

- exact supported framework/runtime versions;
- installation/bootstrap strategy;
- starter kit vs minimal bootstrap;
- repository/package topology;
- build tooling;
- formatting/lint/static analysis;
- unit/component/feature testing stack;
- browser/E2E strategy;
- visual-regression strategy;
- accessibility tooling;
- dependency/update policy;
- branch protection and required PR checks;
- local development commands and reproducibility;
- CI evidence format.

Phase 1 must implement the approved direction, not reopen the entire framework choice without new evidence and a decision-register change.
