# PHASE 2 Plan — Design Tokens & Theme Architecture

**Tracking issue:** #6
**Branch:** `phase/02-design-tokens-theme`
**Status:** IN PROGRESS
**Active workstream:** 2A — Token Architecture & Naming Contract

## Objective

Translate Wening's approved visual/product principles into a semantic, reusable, theme-native token foundation before reusable components or application-shell work begins.

Phase 2 must produce an implementation that is:

- Light-first, Dark-native, and System-aware;
- semantic rather than page-specific;
- brand-overridable without rewriting component structure;
- compatible with Tailwind CSS 4's CSS-first model;
- usable by Blade/Alpine/Livewire without introducing another UI runtime;
- testable in browser, accessibility, visual, and architecture gates;
- deliberately restrained: low chrome, modest radius, thin borders, minimal elevation.

## Fast execution model

Phase 2 is organized into four execution waves.

### Wave A — Foundation contract (serial)

**2A — Token Architecture & Naming Contract**

This is the only blocking architecture workstream. It freezes the contract that all later token domains consume.

Artifacts:

- `docs/TOKEN_ARCHITECTURE.md`;
- accepted decision-register entries;
- token naming/taxonomy;
- Tailwind mapping contract;
- theme-selection contract;
- customization/override boundaries;
- hard-coded-color guard policy.

Exit gate:

- architecture is internally consistent;
- no conflict with Phase 0/1 locked decisions;
- no component implementation leaked into scope.

### Wave B — Domain specifications (parallelizable)

Once 2A is frozen, 2B–2E may be researched/spec'd in parallel because they occupy distinct token domains.

**2B — Color & Theme Semantics**

Artifacts:

- semantic color-role matrix;
- Light/Dark mappings;
- brand override rules;
- contrast targets;
- system-theme behavior.

**2C — Typography & Density**

Artifacts:

- sans/mono role contract;
- type scale;
- weight/line-height rules;
- comfortable/compact density model;
- control/row sizing principles.

**2D — Spatial & Shape System**

Artifacts:

- spacing scale;
- sizing conventions;
- radius scale;
- border-width strategy;
- elevation/shadow scale;
- layering/z-index scale if justified.

**2E — Motion, Focus & Interaction State**

Artifacts:

- duration/easing scale;
- reduced-motion behavior;
- focus-ring system;
- hover/active/disabled semantics;
- transition policy.

Parallel rule:

- separate agents may research/spec 2B–2E concurrently;
- they must not edit the same implementation files concurrently;
- shared decisions are integrated only through the Phase 2 branch after 2A;
- product-owner visual judgment remains required before the combined system is frozen.

### Wave C — Integrated implementation

**2F — Theme Runtime & CSS/Tailwind Implementation**

Implement only the accepted token/theme architecture.

Expected source boundary:

```text
resources/css/
├── app.css
└── wening/
    ├── tokens.css
    ├── theme-light.css
    ├── theme-dark.css
    └── theme.css
```

Exact filenames may be refined by 2A, but implementation must remain Wening-owned and framework-light.

Responsibilities:

- canonical runtime variables use the `--w-*` namespace;
- Tailwind utility aliases expose Wening semantics without making Tailwind the canonical token store;
- Light/Dark/System behavior is deterministic;
- semantic variables, not dark-mode utility duplication, carry normal theme color changes;
- no reusable Wening component API is introduced;
- no new UI framework dependency is introduced.

### Wave D — Verification & closeout

**2G — Token Verification & Closeout**

Evidence:

- production build;
- existing PHP quality/test matrix;
- Chromium browser evidence;
- Firefox/WebKit behavioral smoke when impacted;
- axe accessibility scan;
- semantic contrast checks where practical;
- theme-state browser tests;
- reduced-motion test;
- no runtime console/page/request failures;
- focused visual snapshots of the token specimen surface;
- product-owner visual UAT for Light/Dark/System and density;
- canonical documentation closeout.

## Proposed token layers

The Phase 2 architecture should use three conceptual layers:

```text
REFERENCE / PRIMITIVE
        ↓
SEMANTIC
        ↓
COMPONENT CONSUMPTION
```

### Reference / primitive layer

Raw design values such as neutral ramps, accent ramps, spacing steps, radii, font metrics, and motion durations.

Reference tokens are implementation inputs. Application/component markup should not normally depend on them directly.

### Semantic layer

Stable roles such as page background, surface, foreground, muted foreground, border, primary, danger, focus ring, and similar intent-based values.

Semantic tokens are the default consumption contract for Wening UI.

### Component layer

Component-specific aliases may be introduced later only when a component genuinely needs a stable contract beyond generic semantics.

Phase 2 must not pre-create a large speculative component-token catalog.

## Naming direction

Canonical Wening runtime variables must use a collision-resistant namespace:

```text
--w-*
```

Examples of naming shape, not final values:

```text
--w-color-page
--w-color-surface
--w-color-fg
--w-color-fg-muted
--w-color-border
--w-color-primary
--w-color-primary-fg
--w-radius-md
--w-shadow-overlay
--w-motion-fast
```

Tailwind aliases may expose corresponding Wening-prefixed utility namespaces, for example:

```text
--color-w-page
--color-w-fg
--color-w-primary
```

so product markup can consume semantic utilities such as `bg-w-page`, `text-w-fg`, and `border-w-border` while the canonical value remains a Wening semantic variable.

## Theme runtime direction

Target behavior:

- Light is Wening's default visual direction.
- Explicit Light or Dark preference may be represented on the root element.
- System mode follows `prefers-color-scheme`.
- Native browser UI should receive the matching `color-scheme` signal.
- Persisted manual preferences must be applied early enough to avoid an obvious theme flash.
- Normal Wening components should not require duplicated `dark:*` color classes; changing semantic variable values should switch the theme.
- A dark variant may remain available for exceptional asset/content behavior, not as the primary theme architecture.

The exact attribute/storage contract is frozen in 2A before implementation.

## Quality rules

Phase 2 must add or preserve machine-verifiable contracts where practical:

- Wening core must not introduce arbitrary hard-coded product colors outside approved token-definition files;
- semantic variables must exist for normal component-facing color roles;
- theme tests must verify Light/Dark/System resolution;
- accessibility evidence must remain GREEN;
- visual snapshot updates require review;
- CI remains non-mutating;
- a required failure blocks forward work.

## Non-scope

Phase 2 does not build:

- reusable Button/Input/Select/etc. APIs;
- app shell/sidebar/topbar;
- dashboards;
- data-table system;
- workflow UI;
- operational Gate product page;
- public/auth UI;
- package extraction.

## Exit criteria

Phase 2 closes only when:

1. 2A–2F are accepted and implemented;
2. Light/Dark/System behavior is verified;
3. semantic brand override is demonstrated;
4. typography/density/spacing/radius/elevation/motion/focus contracts are documented;
5. accessibility and browser evidence pass;
6. no component/application-shell scope leaked into the phase;
7. product-owner visual/design UAT passes;
8. Phase 2 closeout is recorded;
9. `docs/CURRENT_STATE.md` authorizes Phase 3 — Application Shell.

## Stop conditions

Stop and surface a blocker if:

- a token decision conflicts with an existing LOCKED decision;
- theme switching requires page-specific recoloring;
- Wening core begins depending directly on reference/template CSS;
- an agent introduces a UI runtime dependency;
- implementation begins reusable component or shell work;
- accessibility/contrast evidence fails;
- concurrent work produces overlapping dirty implementation scope.
