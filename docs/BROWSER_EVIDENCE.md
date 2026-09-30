# Wening UI — Browser, Accessibility & Visual Evidence

**Phase:** 1D — Browser, Accessibility & Visual Evidence  
**Verdict:** CLOSED_GREEN

## Browser test harness

Wening uses:

```text
@playwright/test: ^1.63
```

At Phase 1D audit, Playwright 1.63 is the current stable line and supports Chromium, Firefox, and WebKit.

Why Playwright:

- E2E/interaction testing;
- deterministic browser contexts;
- responsive viewport testing;
- built-in screenshots and visual comparison;
- accessibility-tree snapshots where useful;
- console/page error instrumentation;
- cross-browser execution;
- strong support for agent/browser tooling.

Laravel Dusk is not selected as the Wening baseline because Playwright covers the required browser evidence independently of the PHP runtime and gives better alignment with visual-regression needs.

## Accessibility

Use:

```text
@axe-core/playwright: ^4.13
```

Automated accessibility tests should:

- run on representative component/reference pages;
- check common WCAG A/AA-detectable violations;
- scan important interaction states, not only initial page load;
- fail on unapproved violations.

Automated axe results are **not** an accessibility certification.

Manual UAT must still verify:

- keyboard flow;
- visible focus;
- focus trapping/restoration;
- reading/order logic;
- labels/instructions;
- zoom/reflow behavior where relevant;
- motion/reduced-motion behavior;
- task usability.

## Visual regression

Canonical assertion:

```ts
await expect(page).toHaveScreenshot(...)
```

Rules:

1. Visual baselines are committed.
2. Baselines are generated/reviewed in the canonical CI environment.
3. CI does not run snapshot-update mode.
4. A changed snapshot must be intentionally reviewed as part of the PR.
5. Dynamic content must be made deterministic or masked for a documented reason.
6. Tolerances should be narrow and justified; do not increase thresholds to hide unstable UI.

## Canonical visual environment

Primary visual lane:

```text
OS/browser: Linux + Chromium (Playwright-managed)
```

Reason: screenshots can vary by OS, browser build, font rendering, GPU, and host settings.

One canonical render environment makes visual diffs meaningful.

## Cross-browser strategy

### Chromium

Full critical browser suite and visual regression.

### Firefox

Behavioral/cross-browser smoke for critical flows and components.

### WebKit

Behavioral/cross-browser smoke for critical flows and components.

Full screenshot baselines are not duplicated across every engine unless a specific component proves browser-rendering risk.

## Viewport matrix

Default deterministic viewport set:

| Class | Width × Height |
|---|---:|
| Mobile | **390 × 844** |
| Tablet | **768 × 1024** |
| Desktop | **1366 × 768** |
| Wide desktop | **1920 × 1080** |

A component may require additional breakpoint-specific dimensions, but these four form the standard evidence matrix.

Not every test must run at every viewport. The test plan chooses the minimum set that proves the affected contract.

## Console/runtime policy

Browser tests register listeners for:

- `console.error`;
- uncaught page errors;
- relevant failed requests.

Unexpected occurrences fail the test.

Allowlisting is permitted only for:

- a known external/browser condition;
- a documented reason;
- a narrowly matched message/resource.

Broad “ignore all console errors” helpers are prohibited.

## Accessibility-tree snapshots

Playwright ARIA snapshots may be used for stable structural contracts where they add value, such as:

- navigation landmarks;
- menu/dialog structure;
- named controls;
- semantic grouping.

They should not replace targeted role/name assertions or axe scans.

## Evidence storage

Later implementation should keep browser evidence in predictable locations:

```text
tests/
└── Browser/
    ├── ...
    └── ...-snapshots/
```

CI failure artifacts may include:

- actual screenshot;
- expected screenshot;
- diff image;
- trace;
- video only when useful;
- test report.

Transient failure artifacts should be CI artifacts, not committed source.

Golden/reference snapshots are committed source.

## Phase 1D closeout

CLOSED_GREEN.

Wening now has one coherent browser evidence system covering functional E2E, accessibility automation, responsive states, visual regression, and runtime-console health.

**Next allowed work:** Phase 1E — CI & GitHub Governance.
