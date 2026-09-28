# AGENTS.md

This file defines the working contract for coding agents, review agents, and AI-assisted changes in Wening UI.

## 1. Canonical read order

Before changing anything, read:

1. `README.md`
2. `docs/CURRENT_STATE.md`
3. `docs/DECISION_REGISTER.md`
4. the phase/task issue being worked on
5. the relevant design or governance document under `docs/`

If these sources conflict, stop and surface the conflict. Do not silently choose an interpretation.

## 2. Authority model

- The **product owner** is the final authority for product scope, visual judgment, and UAT acceptance.
- The **lead architect/auditor** may define plans, guardrails, acceptance criteria, and review findings.
- A **coding agent** executes bounded work inside an approved scope.
- GitHub is the canonical system of record for code, decisions, issues, PRs, evidence, and state.

Agents must not silently redefine a LOCKED decision.

## 3. Required workflow

Every non-trivial change follows:

`ORIENT → AUDIT → SPEC → PLAN → EXECUTE → TEST → UAT/REVIEW → CHECKPOINT → DOCUMENT → NEXT`

For small fixes, stages may be brief, but none may be contradicted.

### Stop-on-failure rule

If a required test, build, check, or UAT gate fails:

1. stop forward development;
2. diagnose within the approved scope;
3. fix;
4. re-run the failed evidence;
5. re-run impacted regression/UAT checks;
6. only then continue.

Never weaken a test or acceptance criterion merely to obtain green status.

## 4. Scope discipline

- Work only on the issue/phase scope.
- Avoid drive-by refactors.
- Do not add dependencies without an explicit reason and approval when they affect architecture.
- Do not rename public APIs or canonical concepts casually.
- Do not introduce a second competing design pattern where an approved one exists.
- Do not implement speculative future requirements.
- If a needed change is outside scope, document it as a follow-up instead of silently expanding the task.

## 5. Git discipline

- `main` is intended to remain stable/releasable.
- Feature work uses a dedicated branch/worktree.
- Never rewrite shared history.
- Do not force-push unless explicitly authorized for a disposable branch.
- Prefer small, reviewable commits and PRs.
- A PR must describe scope, non-scope, tests, visual/UAT evidence when applicable, risks, and documentation updates.
- Multiple agents must not share one dirty worktree.

## 6. UI-specific evidence

A UI change is not complete merely because it renders.

Where relevant, provide evidence for:

- light theme;
- dark theme;
- responsive behavior;
- keyboard/focus behavior;
- empty/loading/error states;
- data density;
- overflow behavior;
- screenshots or visual-regression output;
- browser console errors;
- accessibility checks.

Visual quality still requires human UAT.

## 7. Documentation rule

Update canonical documentation in the same workstream when a change affects:

- product behavior;
- design principles;
- public component contracts;
- architecture;
- quality gates;
- roadmap/state;
- a previously locked decision.

`docs/CURRENT_STATE.md` must describe the latest accepted project state, not an aspiration.

## 8. Phase 0 restriction

While Phase 0 is open, implementation code is out of scope. Do not install Laravel, Bootstrap, Tailwind, Livewire, or any other framework until the technical baseline is explicitly approved in a later phase.

## 9. Definition of done

A task is DONE only when:

- the requested scope is implemented;
- required automated checks pass;
- required UAT/review passes;
- no known blocker is being hidden;
- the diff is bounded and reviewable;
- canonical docs are current;
- Git state is clean and checkpointed.

When uncertain, ask or record an OPEN decision rather than inventing one.
