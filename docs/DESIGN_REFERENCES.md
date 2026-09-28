# Wening UI — Design References

Wening is an original design system. References are used to extract principles and interaction lessons, not to reproduce another product's identity or source code.

## Reference A — Gate Muktamar NU

Public reference: https://muktamar.nu.id/

### What Wening learns from it

- information-first composition;
- generous but disciplined whitespace;
- strong numeric hierarchy without mandatory stat cards;
- simple tables that rely on typography and alignment;
- low visual noise;
- focused operational screens;
- light surfaces that feel professional without looking like a conventional admin template.

### What Wening does not copy

- NU-specific branding;
- page-specific content structure;
- proprietary assets;
- exact typography, dimensions, or implementation details.

## Reference B — Hermes Reflect

Repository: https://github.com/daletkc/hermes-theme-reflect

Reflect is a theme layer for the Hermes Agent dashboard, not a general admin template.

### What Wening learns from it

- dark-surface hierarchy;
- indigo/violet accent restraint;
- semantic color washes;
- compact information density;
- Inter + selective monospace pairing;
- modest radius;
- restrained shadows and borders;
- thoughtful motion/reduced-motion behavior;
- operational styling for logs, status, Kanban, and drawers.

### Boundary

Wening must not transplant Reflect's Hermes-specific selectors or treat its stylesheet as Wening's component architecture. Design ideas may be reimplemented cleanly through Wening's own semantic tokens and component contracts.

## Reference C — Tabler

Public reference: https://tabler.io/

### What Wening learns from it

- mature application component behavior;
- responsive navigation patterns;
- practical forms/tables;
- broad state coverage;
- disciplined interaction conventions;
- useful benchmarks for application completeness.

### Boundary

Tabler is a UX/component benchmark, not a required Wening dependency and not Wening's visual identity.

## Reference hierarchy

When interpreting these sources:

1. **Wening product principles and locked decisions win.**
2. References provide evidence and inspiration.
3. No reference may silently introduce a dependency.
4. Wening should prefer an original, simpler solution when a reference pattern conflicts with Wening's product character.

## Current synthesis

The intended synthesis is:

- **Gate Muktamar:** light-side philosophy and information hierarchy;
- **Reflect:** dark-side philosophy and operational atmosphere;
- **Tabler:** component-behavior and completeness benchmark;
- **Wening:** original implementation, semantics, branding flexibility, and agent-ready engineering discipline.
