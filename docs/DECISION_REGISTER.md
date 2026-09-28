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
| D-021 | PHP compatibility floor is **8.3**; **8.4** is the recommended development/production baseline; CI must cover **8.3 / 8.4 / 8.5**. Wening must not require PHP 8.5-only language features while 8.3 remains supported. | LOCKED | Laravel 13 supports PHP 8.3–8.5. This preserves deployment reach while using 8.4 as the balanced primary runtime. |
| D-022 | The first reference implementation targets **Laravel 13.x**. Bootstrap should use the current official Laravel 13 application skeleton; the compatibility contract is the 13.x line, not a permanently pinned framework patch. | LOCKED | Keeps the project on the active Laravel major while allowing normal patch/minor security updates through the lockfile. |
| D-023 | The first reference implementation uses **Livewire 4.x**, with the initial Composer constraint **^4.4**. | LOCKED | Livewire 4.4.x is the current stable line and explicitly supports Laravel 13; the caret constraint permits compatible 4.x updates while the lockfile preserves reproducibility. |
| D-024 | Frontend tooling uses **Node.js 24 LTS**. Development/CI should track the latest 24.x security/patch release; Node 26 Current is not the baseline. | LOCKED | LTS is more appropriate for a reusable engineering baseline than the Current release line. |
| D-025 | The npm baseline is **npm 11.x** under Node 24; the initial reproducible bootstrap should record the actual npm version supplied/selected with the Node 24 environment. | LOCKED | Keeps the package manager aligned with the selected Node LTS line while allowing deliberate patch updates. |
| D-026 | Composer baseline is **Composer 2.10.x** (latest stable 2.x feature line at Phase 1A). | LOCKED | Uses the currently maintained Composer feature line rather than the legacy 2.2 LTS branch intended for older PHP environments. |
| D-027 | Frontend build baseline follows the official Laravel 13 skeleton: **Tailwind CSS ^4.0.0**, **@tailwindcss/vite ^4.0.0**, **Vite ^8.0.0**, and **laravel-vite-plugin ^3.1**. | LOCKED | Aligns Wening with the active Laravel 13 scaffold and Tailwind's official Laravel/Vite integration. |
| D-028 | `composer.lock` and `package-lock.json` are committed for the reference application. CI/reproducible installs use `composer install` and `npm ci`, not floating dependency resolution. | LOCKED | Major/minor compatibility can remain flexible in manifests while exact resolved dependency graphs remain reproducible. |
| D-029 | Phase 1 bootstrap uses a **fresh minimal Laravel 13 application**, not an official Laravel starter kit. | LOCKED | The official Livewire starter kit includes Flux UI and prebuilt application UI; Wening needs to own its component contracts and visual language from the start. |
| D-030 | The repository uses an **app-first root topology** for the first reference implementation. Reusable Wening code stabilizes inside the app before any package extraction. | LOCKED | Avoids premature package boundaries while still giving Wening a real executable host for browser, accessibility, and visual testing. |
| D-031 | Authentication scaffolding is **not part of the Phase 1 engineering bootstrap** and is not a dependency of Wening core. Auth examples/patterns may be introduced later as product integration work. | LOCKED | Prevents authentication starter UI from defining Wening's visual/API baseline and keeps core UI reusable. |
| D-032 | The default development/test bootstrap uses **SQLite** to avoid requiring an external database service. Database choice is not part of Wening's public UI contract. | LOCKED | Improves reproducibility for contributors, agents, and CI while remaining compatible with later production databases. |
| D-033 | Wening will maintain an **internal reference/style-guide surface** inside the reference app once tokens/components exist; it is a verification surface, not a public product dependency. | LOCKED | Gives browser/visual/accessibility tests a deterministic host without requiring a second demo repository. |
| D-034 | Canonical environment policy: commit `.env.example`; never commit `.env`, secrets, generated build output, `vendor/`, or `node_modules/`. | LOCKED | Keeps the repository reproducible and safe while preserving conventional Laravel environment handling. |
| D-035 | Initial source placement follows Laravel conventions: Wening Blade components under `resources/views/components/wening`, Wening CSS under `resources/css/wening`, and stateful Livewire classes only when needed under an explicitly Wening-scoped application namespace. | LOCKED | Keeps the app legible to Laravel developers/agents while postponing package extraction until contracts stabilize. |
| D-036 | PHP formatting uses **Laravel Pint 1.x**; CI runs Pint in check/test mode and does not silently rewrite code. | LOCKED | Pint is Laravel-native, supports PHP 8.3+, and is already part of the Laravel 13 application skeleton. |
| D-037 | Static analysis uses **Larastan 3.x / PHPStan 2.x**, starting at **level 8** with no generated baseline suppression file. | LOCKED | Larastan 3 supports Laravel 13 and PHP 8.3; a new codebase should fix analysis failures rather than normalize debt through a baseline. |
| D-038 | Application tests use **Pest 4.x**, not Pest 5, while PHP 8.3 remains supported. Initial target is `pestphp/pest:^4.7` with `pestphp/pest-plugin-laravel:^4.1`. | LOCKED | Pest 5 requires PHP 8.4, which would contradict Wening's PHP 8.3 compatibility floor. Pest 4.7 supports PHP 8.3 and PHPUnit 12. |
| D-039 | Architecture/contract rules are expressed as automated tests where practical, using Pest architecture tests and focused repository checks. | LOCKED | Agentic development needs machine-enforced boundaries rather than relying only on prose. |
| D-040 | **Laravel PAO** remains a development dependency and is part of the agentic feedback harness. | LOCKED | PAO provides compact structured output for Pest/PHPUnit/PHPStan/Artisan in AI-agent environments without changing human terminal output. |
| D-041 | Mandatory dependency checks include `composer audit --locked` and npm audit policy; dependency updates are separate explicit workstreams, not side effects of CI. | LOCKED | Keeps security evidence visible while preserving reproducible lockfiles. |
| D-042 | No Rector, ESLint, or Stylelint baseline is introduced in Phase 1C unless source complexity demonstrates a concrete need. | LOCKED | Minimizes tool noise and maintenance burden; tools should exist because they enforce a real contract, not to maximize tool count. |
| D-043 | Browser/E2E testing uses **Playwright Test 1.x**, with initial constraint `^1.63`. | LOCKED | One browser tool can cover interaction, screenshots, responsive behavior, console failures, and cross-browser smoke without adding Laravel-specific browser infrastructure. |
| D-044 | Automated accessibility checks use **@axe-core/playwright 4.x** inside Playwright; automated scans complement rather than replace manual accessibility UAT. | LOCKED | Axe integrates directly with the chosen browser harness and catches common A/AA issues while acknowledging automation limits. |
| D-045 | Visual regression uses Playwright `toHaveScreenshot()`; committed baselines are generated/reviewed in a deterministic Linux/Chromium CI environment. | LOCKED | Screenshot rendering varies by OS/browser, so one canonical environment is necessary for stable diffs. |
| D-046 | Visual-regression primary browser is **Chromium**; Firefox and WebKit are cross-browser behavioral/smoke lanes, not duplicate full visual-baseline lanes by default. | LOCKED | Preserves cross-browser confidence without tripling snapshot noise and CI cost. |
| D-047 | Representative viewport baseline is **390×844 mobile, 768×1024 tablet, 1366×768 desktop, 1920×1080 wide desktop**; task-specific tests may add viewports. | LOCKED | Covers Wening's responsive and data-density use cases with deterministic dimensions. |
| D-048 | Unexpected browser `console.error`, uncaught page errors, and failed network requests relevant to the application are test failures unless explicitly allowlisted with rationale. | LOCKED | Prevents visually passing pages from hiding runtime regressions. |
| D-049 | Visual snapshot updates are explicit reviewed changes; CI never auto-accepts new screenshots. | LOCKED | Makes visual change a reviewable product decision instead of an automatic side effect. |

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
