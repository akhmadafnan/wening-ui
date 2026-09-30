# PHASE 1F — Minimal Engineering Bootstrap & Proof Closeout

**Status:** CLOSED_GREEN
**Branch:** `phase/01-engineering-baseline`
**Tracking issue:** #3
**Pull request:** #4

## Result

Phase 1F established the executable Wening engineering baseline without beginning product UI implementation.

Verified baseline:

- Laravel 13 reference application;
- Livewire 4;
- Tailwind CSS 4;
- Vite 8 and laravel-vite-plugin 3;
- committed Composer and npm lockfiles;
- Laravel Pint;
- Larastan/PHPStan level 8 without a generated baseline;
- Pest 4 and Pest Laravel plugin;
- Laravel PAO;
- Playwright and axe browser testing;
- GitHub Actions CI.

## Canonical runtime baseline

```text
PHP compatibility     8.3 / 8.4 / 8.5
PHP recommended       8.4
Laravel               13.x
Livewire              ^4.4
Composer              2.10.x
Node.js               24 LTS
npm                   11.x
Tailwind CSS           4.x
Vite                   8.x
laravel-vite-plugin    3.x
Pest                   4.x
Larastan               3.x
PHPStan                2.x
Playwright             1.x
axe                    4.x
Laravel PAO            1.x
```

## Engineering evidence

Canonical local gates:

```text
composer run format:check
composer run analyse
composer run test
composer run audit:php
composer run quality
npm run build
npm audit --audit-level=high
npm run test:browser
```

GitHub Actions separates evidence into:

- PHP Quality;
- PHP Tests (8.3);
- PHP Tests (8.4);
- PHP Tests (8.5);
- Frontend;
- Browser / Chromium.

CI run `36611861936` on corrective commit `78adcec` completed GREEN across all six jobs.

## Corrective findings

Phase 1F execution exposed and corrected several assumptions:

1. Pest 4 initialization uses `./vendor/bin/pest --init`, not `php artisan pest:install`.
2. Laravel PAO was not present in the generated skeleton used during bootstrap, so Wening explicitly carries `laravel/pao:^1.0.6`.
3. Wening normalized the frontend baseline to Vite 8 and laravel-vite-plugin 3.
4. The stock Laravel welcome page produced an axe color-contrast violation and was replaced with a minimal engineering smoke surface rather than suppressing accessibility rules.
5. Local PHP tests initially passed because `public/build` existed from a previous Vite build.
6. Clean GitHub CI exposed that hidden dependency through a missing Vite manifest.
7. The PHP-only HTTP smoke test now uses Laravel `withoutVite()` while Browser / Chromium remains responsible for real Vite render and accessibility integration evidence.

## Scope boundary

Phase 1F did not implement:

- Wening design tokens;
- reusable Wening UI components;
- application shell/sidebar;
- dashboard or workflow UI;
- public frontend product UI;
- packaging or release extraction.

## Composer license note

Wening public licensing remains intentionally unresolved under D-011.

The inherited Laravel MIT declaration is therefore not retained merely to silence Composer.
`composer validate` is valid with the expected missing-license warning.
`composer validate --strict` returns non-zero while that warning remains.
This must not be changed until D-011 is explicitly resolved.

## Verdict

**PHASE 1F — CLOSED_GREEN**

Phase 1G is documentation, governance, repository audit, product-owner UAT, and final Phase 1 acceptance only.
