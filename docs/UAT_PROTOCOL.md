# Wening UI — UAT Protocol

UAT exists because automated tests cannot decide whether an interface is calm, clear, trustworthy, or appropriately dense.

## Roles

- **Product owner:** final acceptance authority.
- **Lead architect/auditor:** prepares the UAT scope, verifies evidence, records findings.
- **Coding agent:** fixes accepted defects inside bounded scope and re-runs required checks.

## UAT entry criteria

A feature enters UAT only when:

- implementation scope is complete;
- required automated checks are green;
- known limitations are disclosed;
- the tester has a reproducible environment/build;
- expected behavior and non-scope are clear.

## UAT dimensions

Depending on the feature, verify:

### Functional

- primary action succeeds;
- invalid/edge states behave intentionally;
- loading, empty, success, and failure states are understandable;
- navigation/state persistence behaves as specified.

### Visual

- hierarchy is clear;
- density is appropriate;
- alignment and spacing are consistent;
- borders/radius/elevation follow Wening principles;
- the interface does not become “card heavy” without reason;
- important actions are distinguishable without visual noise.

### Theme

- light;
- dark;
- system transition/initialization;
- no flash or unreadable intermediate state where relevant.

### Responsive

- mobile;
- intermediate/tablet;
- desktop;
- wide desktop for data-heavy/operational screens.

### Interaction/accessibility

- keyboard traversal;
- visible focus;
- dropdown/modal/drawer close behavior;
- no keyboard trap;
- sensible pointer/touch behavior;
- reduced motion if relevant.

### Data-heavy behavior

- long labels;
- long values;
- many rows;
- empty values;
- narrow columns;
- overflow;
- pagination/filter/search interactions.

## Result vocabulary

Use:

- **PASS** — accepted without blocking defect.
- **PASS_WITH_NOTES** — accepted; non-blocking follow-up is explicitly recorded.
- **FAIL** — blocking issue; phase/task cannot close.
- **BLOCKED** — environment/dependency prevents a meaningful verdict.

Avoid vague results such as “seems okay.”

## Failure loop

For FAIL:

1. record the concrete defect and reproduction;
2. define whether it is in scope;
3. implement bounded fix;
4. re-run automated checks;
5. re-run impacted UAT scenarios;
6. update evidence;
7. only then change verdict.

## Phase-level UAT

At phase close, verify not only individual components but also:

- consistency between components;
- no new pattern drift;
- compatibility with locked design decisions;
- current-state and decision documentation accuracy.

A phase is not CLOSED_GREEN until required UAT and documentation gates pass.
