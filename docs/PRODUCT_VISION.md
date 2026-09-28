# Wening UI — Product Vision

## Product statement

Wening UI is a reusable, information-first application design system for serious web applications: administrative systems, institutional products, data-heavy workflows, operational consoles, and public-facing product surfaces.

Its goal is not to look like a generic “admin template.” Its goal is to make complex work feel clear, calm, structured, and trustworthy.

**Working tagline:** *Calm interfaces for serious applications.*

## Product character

Wening should feel:

- calm rather than decorative;
- clear rather than clever;
- structured rather than boxed-in;
- data-first rather than dashboard-first;
- modern without chasing visual trends;
- compact when work requires density, spacious when reading requires focus;
- institutional/professional without feeling old-fashioned;
- consistent across public, authenticated, and operational surfaces.

## Intended product families

Wening is expected to support six reusable capability areas:

1. **Core** — tokens, typography, icons, spacing, elevation, motion, themes.
2. **Application Shell** — sidebar, topbar, page frame, navigation, responsive behavior.
3. **Data UI** — metrics, tables, filters, pagination, states, bulk actions.
4. **Workflow UI** — timeline, stepper, activity, Kanban/status flows.
5. **Operational UI** — focused screens such as gate/check-in, scanner, verification, kiosk, and monitoring.
6. **Public UI** — landing/auth/documentation surfaces sharing the same visual DNA with lower information density.

These names describe capability areas, not a frozen package structure.

## Primary implementation direction

The first Wening reference implementation is now intentionally oriented around:

- Laravel;
- Blade;
- Livewire;
- Alpine.js for local browser state;
- Tailwind CSS as the styling engine;
- Wening-owned tokens and components.

The design language remains conceptually framework-independent, but this stack is the approved implementation north star for the first production-oriented Wening build.

See `docs/TECHNICAL_DIRECTION.md` and `docs/DECISION_REGISTER.md` for responsibility boundaries and locked decisions.

## Non-goals

Wening is not intended to become:

- a clone of Hermes, Tabler, shadcn/ui, Flux, or the Muktamar NU interface;
- a Bootstrap skin;
- a collection of hundreds of unrelated components;
- a highly decorative SaaS landing-page kit;
- a dashboard that places every value inside a card;
- a reason to rebuild browser/platform primitives poorly;
- a substitute for product-specific branding.

## Success criteria for v1

A v1 release should make it possible to build a coherent application that includes:

- responsive application navigation;
- light, dark, and system theme behavior;
- high-quality forms and data tables;
- calm metrics and dashboard summaries;
- modal/drawer/feedback patterns;
- workflow/status patterns;
- an operational/focus layout without the main sidebar;
- a compatible public/auth surface;
- documented component behavior;
- accessibility and keyboard expectations;
- automated quality gates and visual evidence;
- a reusable Laravel/Livewire integration path.

## Core promise

Wening should reduce the need to choose between:

- a visually attractive UI that is difficult to maintain, and
- a mature application UI that feels generic.

The product should provide both a disciplined engineering foundation and a recognizable design language.
