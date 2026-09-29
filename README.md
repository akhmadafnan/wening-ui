# Wening UI

**Calm interfaces for serious applications.**

Wening UI is a reusable, information-first application design system and application foundation for serious web products.

## Current phase

Wening UI is currently in **Phase 1 — Repository & Engineering Baseline**.

The executable Laravel reference application and engineering toolchain are being established, but Wening product UI, design tokens, reusable components, application shell, and public interface implementation have **not** started yet.

## Technical direction

The first reference implementation uses:

- Laravel 13;
- Blade for presentational UI primitives;
- Alpine.js for local browser state;
- Livewire 4 for server/application state;
- Tailwind CSS 4 as the styling engine beneath Wening-owned design tokens and components.

Responsibility rule:

`HTML/CSS → Blade → Blade + Alpine → Livewire`

Use the lowest-complexity layer that correctly owns the state.

## Product direction

Wening UI is being designed to support:

- admin and back-office applications;
- data-heavy workflows;
- focused operational screens such as check-in, verification, gate, scanner, and monitoring;
- public-facing interfaces sharing the same design language;
- light, dark, and system themes;
- reusable Laravel/Livewire-oriented applications without depending on another UI product for Wening's identity.

## Design character

Clear. Calm. Structured. Information-first. Accessible. Theme-native. Agent-ready.

## Canonical project state

See:

- `docs/CURRENT_STATE.md`
- `docs/DECISION_REGISTER.md`
- `docs/ROADMAP.md`

---

Wening UI is under active architecture and engineering work. Its public component API, packaging model, and public license are not yet frozen.
