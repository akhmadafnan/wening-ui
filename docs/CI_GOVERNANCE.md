# Wening UI — CI & GitHub Governance

**Phase:** 1E — CI & GitHub Governance  
**Verdict:** CLOSED_GREEN

## CI provider

GitHub Actions is the canonical CI system for Wening UI.

The repository already uses GitHub for:

- issues;
- branches;
- PRs;
- decisions;
- review evidence;
- release history.

CI therefore remains close to the source-of-truth workflow.

## Trigger policy

The main CI workflow should run on:

```text
pull_request → main
push         → main
```

Use concurrency grouping so a newer commit to the same PR cancels an obsolete in-progress run.

Manual `workflow_dispatch` may be enabled for diagnosis, but manual success does not replace required PR checks.

## Job model

### 1. PHP quality — PHP 8.4

Responsibilities:

- Composer install from lockfile;
- Pint check;
- Larastan/PHPStan;
- Composer audit against locked dependencies.

Target commands:

```bash
composer install --no-interaction --prefer-dist --no-progress
./vendor/bin/pint --test
./vendor/bin/phpstan analyse --memory-limit=1G
composer audit --locked
```

### 2. PHP compatibility tests — matrix

Matrix:

```text
PHP 8.3
PHP 8.4
PHP 8.5
```

Responsibilities:

- install the exact Composer lockfile on each supported runtime;
- run Pest test suite;
- prove no accidental PHP 8.4/8.5-only runtime requirement has entered the app.

### 3. Frontend — Node 24

Responsibilities:

```bash
npm ci
npm run build
npm audit --audit-level=high
```

If npm's advisory behavior creates a demonstrably non-actionable false positive, resolution must be documented narrowly. The default is not to suppress audits broadly.

### 4. Browser evidence — primary PHP 8.4 + Node 24

Once Phase 1F installs the browser harness:

- install app dependencies;
- build assets;
- install Playwright Chromium;
- start the reference app;
- run Chromium browser/axe/visual smoke;
- upload trace/screenshot/diff artifacts on failure.

Firefox/WebKit smoke strategy may run in the same workflow or a separate job depending on CI duration measured during implementation.

## Required-check target

Before Wening begins meaningful component work, the intended merge gates are:

```text
PHP Quality
PHP Tests (8.3)
PHP Tests (8.4)
PHP Tests (8.5)
Frontend
Browser / Chromium
```

A job that does not yet have meaningful tests may start as a bootstrap smoke job, but it must not be represented as stronger evidence than it is.

## Permissions

Workflow default:

```yaml
permissions:
  contents: read
```

Additional permissions are added only to the specific job that needs them.

CI should not receive write access merely for convenience.

## Action pinning

GitHub Actions dependencies should use immutable commit SHAs where practical, with a comment documenting the human-readable release/tag.

Example style:

```yaml
uses: actions/checkout@<full-sha> # vX
```

Dependabot can maintain GitHub Actions references.

## Cache policy

Caches improve speed but must not become the source of truth.

Acceptable:

- Composer download cache;
- npm cache;
- Playwright browser cache only if it remains reliable and clearly invalidated.

Never cache:

- source-generated test truth;
- accepted snapshots in place of committed snapshots;
- secrets.

A cache miss must still produce a successful clean build.

## Merge policy

Project policy:

- no direct feature development on `main`;
- dedicated branch/worktree per workstream;
- PR required;
- required checks green;
- review conversations resolved;
- documentation/current state updated;
- squash merge preferred;
- no history rewrite on shared branches.

The connector available to the current AI workflow can document and operate PRs but may not be able to configure GitHub branch-protection administration settings. Repository settings should be enabled manually when required by GitHub permissions.

## Dependency updates

Use Dependabot for:

- Composer;
- npm;
- GitHub Actions.

Policy:

- scheduled, grouped where safe;
- no auto-merge by default;
- every update PR runs normal CI;
- security updates may be expedited but not exempt from tests;
- major updates require explicit architecture review when they affect locked decisions.

## CI mutation prohibition

CI must not:

- run Pint in fix mode;
- run snapshot update/accept mode;
- run `composer update`;
- run `npm update`;
- commit generated files;
- push changes back to the PR branch.

If a fix is necessary, the agent/developer applies it in a normal commit and CI verifies it.

## Artifact policy

On browser/test failure, useful artifacts may be uploaded with short retention:

- Playwright trace;
- actual/diff screenshot;
- structured test report;
- diagnostic logs stripped of secrets.

Successful runs should avoid large artifacts unless they serve a documented audit need.

## Phase 1E closeout

CLOSED_GREEN.

CI responsibilities, merge policy, dependency-update policy, and non-mutating agentic evidence rules are now frozen.

**Next allowed work:** Phase 1F — Minimal Engineering Bootstrap & Proof.
