# Wening UI — Quality Gates

Quality gates convert “looks finished” into evidence.

The exact tools will be selected in later phases; these requirements define the outcomes.

## Gate A — Scope integrity

Required:

- work matches the approved issue/plan;
- non-scope remains untouched;
- no unexplained dependency or architectural expansion;
- no hidden TODO that invalidates acceptance criteria.

## Gate B — Build and static quality

When implementation exists, required evidence may include:

- dependency install succeeds;
- production build succeeds;
- formatting passes;
- lint/static analysis passes;
- no unexpected generated files;
- no relevant browser-console error.

## Gate C — Automated behavior

Required according to affected scope:

- unit tests;
- component/feature tests;
- regression tests;
- browser/E2E tests for critical interaction;
- architecture/contract tests where useful.

Tests may be strengthened, not weakened merely to accept a failing implementation.

## Gate D — Theme behavior

For theme-aware UI changes:

- light verified;
- dark verified;
- system preference verified;
- no hard-coded color that breaks semantic theming;
- focus/disabled/hover/error states remain legible in both themes.

## Gate E — Responsive behavior

Check representative widths appropriate to the component.

At minimum, critical application surfaces must address:

- narrow mobile;
- tablet/intermediate;
- common desktop;
- wide desktop.

Success means task-preserving composition, not merely “no crash.”

## Gate F — Accessibility

Relevant UI changes should verify:

- semantic markup;
- accessible names/labels;
- keyboard operation;
- visible focus;
- contrast;
- reduced-motion behavior where animation exists;
- reasonable touch target behavior;
- no critical automated accessibility violation.

Automated tools do not replace manual accessibility review.

## Gate G — Visual evidence

For visual changes, provide one or more:

- baseline/current screenshots;
- visual-regression result;
- documented before/after;
- component style-guide evidence.

A rendering screenshot is evidence of state, not proof of good design.

## Gate H — Human UAT

Human UAT is required for changes where correctness includes visual hierarchy, usability, wording, density, or workflow judgment.

The product owner is final UAT authority.

## Gate I — Documentation/state

Before closeout:

- canonical docs reflect accepted behavior;
- decision register updated if needed;
- current state is accurate;
- next allowed work is explicit;
- risks/deferred work are recorded.

## Gate J — Git checkpoint

Before a workstream is called closed:

- intended diff only;
- checks green;
- review/UAT complete;
- commit/PR history reviewable;
- no accidental dirty worktree;
- merge strategy follows repository policy.

## Failure policy

A required red gate is a blocker.

The correct response is:

`FAIL → DIAGNOSE → FIX → RE-TEST → RE-UAT (if impacted) → CONTINUE`

Not:

`FAIL → LOWER THE GATE → CONTINUE`.
