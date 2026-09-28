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

## Primary integration direction

Laravel + Livewire products are a primary target because Wening is intended to be practical for server-driven application development.

However, **the implementation stack is not frozen in Phase 0**. The design system should remain conceptually framework-independent even if the first reference implementation targets Laravel/Livewire.

## Non-goals

Wening is not intended to become:

- a clone of Hermes, Tabler, or the Muktamar NU interface;
- a collection of hundreds of unrelated components;
- a highly decorative SaaS landing-page kit;
- a dashboard that places every value inside a card;
- a framework lock-in before the product model is understood;
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
- a reusable integration path for at least one production-oriented stack.

## Core promise

Wening should reduce the need to choose between:

- a visually attractive UI that is difficult to maintain, and
- a mature application UI that feels generic.

The product should provide both a disciplined engineering foundation and a recognizable design language.
