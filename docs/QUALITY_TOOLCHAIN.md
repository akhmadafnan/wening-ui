# Wening UI — Quality Toolchain

**Phase:** 1C — Quality Toolchain  
**Verdict:** CLOSED_GREEN

The Wening quality baseline is intentionally small, strict, and agent-readable.

## Toolchain

| Concern | Tool / line | Policy |
|---|---|---|
| PHP formatting | Laravel Pint 1.x | check in CI; local fix command available |
| Static analysis | Larastan 3.x + PHPStan 2.x | level 8; no generated baseline |
| Test runner | Pest 4.x | PHP 8.3 compatible |
| Laravel Pest integration | pest-plugin-laravel 4.x | Laravel 13 compatible |
| Architecture checks | Pest architecture tests | enforce selected code boundaries |
| Agent output | Laravel PAO 1.x | retain as dev dependency |
| PHP dependency security | Composer audit | audit locked graph |
| JS dependency security | npm audit policy | audit locked graph |
| Asset correctness | Vite production build | required gate |

## Why Pest 4 instead of Pest 5

At Phase 1C audit:

- Pest 5.2.1 requires PHP `^8.4`.
- Wening's locked PHP compatibility floor is PHP 8.3.
- Pest 4.7.7 requires PHP `^8.3.0` and PHPUnit `^12.5.33`.
- pest-plugin-laravel 4.1.0 requires PHP `^8.3.0`, supports Laravel 13, and Pest 4.

Therefore Pest 5 would make the development/test dependency graph impossible to install on the PHP 8.3 CI lane.

Wening locks:

```text
pestphp/pest: ^4.7
pestphp/pest-plugin-laravel: ^4.1
```

The PHP compatibility floor wins over adopting the newest testing major.

## Pint

Use Laravel Pint for PHP formatting.

CI command target:

```bash
./vendor/bin/pint --test
```

Local repair command:

```bash
./vendor/bin/pint
```

CI must never mutate source files to create a green build.

## Larastan / PHPStan

Initial development constraints:

```text
larastan/larastan: ^3.12
phpstan/phpstan: ^2.2
```

Initial analysis level:

```text
8
```

Policy:

- no generated PHPStan baseline at project inception;
- no broad ignore regex merely to obtain green status;
- local suppressions require concrete justification;
- analysis covers Wening-owned PHP code and expands as structure grows.

Suggested command:

```bash
./vendor/bin/phpstan analyse --memory-limit=1G
```

If legitimate Laravel magic needs configuration, configure Larastan rather than globally weakening the level.

## Pest

Pest is the canonical application test CLI.

Suggested command:

```bash
php -d memory_limit=1G ./vendor/bin/pest
```

Expected test families later:

- unit;
- feature;
- Livewire component behavior;
- architecture/contract;
- regression.

A numeric coverage percentage is not frozen in Phase 1. Coverage must follow risk and public contracts rather than incentivizing low-value tests.

## Architecture checks

Architecture tests should eventually enforce examples such as:

- Wening primitives do not depend on application-specific feature modules;
- no debug helpers in committed production source;
- stateful Livewire code is not used where a Blade primitive is sufficient when an enforceable boundary exists;
- Wening namespaces/directories follow canonical placement;
- prohibited dependencies do not enter core.

Not every design principle can be statically tested. Human UAT remains required for visual decisions.

## Laravel PAO — agentic harness

Laravel 13's current application skeleton includes `laravel/pao` as a dev dependency.

PAO is intentionally retained.

It detects supported AI-agent environments and transforms verbose PHPUnit/Pest/PHPStan/Artisan output into compact structured output while leaving normal human terminal output unchanged.

This directly supports Wening's agent-first repository goal:

- lower token waste;
- clearer failures;
- stable machine-readable feedback;
- less need to custom-wrap test output.

PAO does not replace tests or analysis; it only improves their agent-facing output.

## Dependency audits

Required PHP dependency check:

```bash
composer audit --locked
```

JavaScript dependency audit policy will run against the committed npm lockfile.

A vulnerability finding is triaged by severity, exploitability, runtime/dev-only scope, and available remediation. Required CI severity thresholds are finalized in Phase 1E.

## Frontend lint/format decision

Phase 1C intentionally does **not** add ESLint, Stylelint, or a broad frontend formatting stack.

Reason:

- Wening has no meaningful custom JavaScript implementation yet;
- Tailwind/token CSS implementation has not begun;
- additional tools would currently enforce little beyond generated/minimal scaffold files.

When Phase 2/3 introduces meaningful CSS or JavaScript, the need is re-evaluated. A later decision may add focused tooling without reopening the rest of this baseline.

## Rector decision

Rector is not a mandatory baseline tool.

It may be introduced later for explicit refactoring/migration tasks, but CI will not depend on automated source rewriting.

## Canonical quality command model

The actual Composer scripts are implemented in Phase 1F, but the intended responsibilities are:

```text
format:check  → Pint --test
analyse       → Larastan/PHPStan
test          → Pest
audit:php     → composer audit --locked
build         → npm run build
```

Phase 1E will decide CI grouping and which jobs run across every PHP matrix lane.

## Evidence sources

- Laravel 13 skeleton: Pint, PAO, PHPUnit defaults
- Laravel Pint: https://packagist.org/packages/laravel/pint
- Larastan: https://packagist.org/packages/larastan/larastan
- Pest 4.7.7 source constraint: https://github.com/pestphp/pest/tree/v4.7.7
- Pest 5 current requirement: https://packagist.org/packages/pestphp/pest
- Pest Laravel plugin 4.1.0: https://github.com/pestphp/pest-plugin-laravel/tree/v4.1.0
- Laravel PAO: https://github.com/laravel/pao

## Phase 1C closeout

CLOSED_GREEN.

The quality toolchain is compatible with PHP 8.3–8.5, preserves Laravel conventions, and provides an agent-optimized feedback layer without unnecessary tooling.

**Next allowed work:** Phase 1D — Browser, Accessibility & Visual Evidence.
