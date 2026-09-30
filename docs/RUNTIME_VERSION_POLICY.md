# Wening UI — Runtime & Version Policy

**Phase:** 1A — Runtime & Version Freeze  
**Verdict:** CLOSED_GREEN  
**Accepted by product owner:** 2026-09-29

This document defines the runtime/tool version policy for the first Wening reference implementation. It distinguishes **compatibility contracts** from **reproducible resolved versions**.

## Frozen matrix

| Layer | Compatibility / policy | Primary development baseline | CI / evidence |
|---|---|---|---|
| PHP | 8.3–8.5 | **8.4** | **8.3, 8.4, 8.5** |
| Laravel | **13.x** | current Laravel 13 skeleton | primary PHP lane + compatibility matrix |
| Livewire | **4.x**; initial constraint `^4.4` | current stable 4.x | feature/component tests |
| Composer | **2.10.x** | current 2.10 patch | reproducible `composer install` |
| Node.js | **24 LTS** | latest supported 24.x patch | Node 24 |
| npm | **11.x** | version paired/selected with Node 24 | reproducible `npm ci` |
| Tailwind CSS | **4.x**; initial `^4.0.0` | lockfile-resolved | production asset build |
| @tailwindcss/vite | **4.x**; initial `^4.0.0` | lockfile-resolved | production asset build |
| Vite | **8.x**; initial `^8.0.0` | lockfile-resolved | production asset build |
| laravel-vite-plugin | **3.x**; initial `^3.1` | lockfile-resolved | production asset build |

## PHP policy

### Compatibility floor — PHP 8.3

Laravel 13 officially supports PHP 8.3–8.5 and requires at least PHP 8.3.

Wening therefore keeps PHP 8.3 as its compatibility floor for the first Laravel 13 reference implementation.

While 8.3 remains supported:

- do not introduce syntax requiring PHP 8.4/8.5 unless the decision register is intentionally changed;
- do not adopt dependencies that unnecessarily raise the PHP floor;
- the CI matrix must prove compatibility on PHP 8.3.

### Recommended baseline — PHP 8.4

PHP 8.4 is the preferred local-development and production baseline.

Reasoning:

- it is newer than the compatibility floor;
- it retains a longer support runway than 8.3;
- it avoids forcing consumers onto PHP 8.5;
- it is fully supported by Laravel 13.

### Forward compatibility — PHP 8.5

PHP 8.5 is tested in CI as a forward-compatibility lane.

It is **not** the Wening minimum or recommended requirement.

This catches incompatibilities early without making PHP 8.5-only features part of Wening's public baseline.

## Laravel policy

Target:

```text
Laravel 13.x
```

The reference application should be created from the current official Laravel 13 application skeleton.

At the time of Phase 1A audit, the official `laravel/laravel` 13.x skeleton declares:

```json
"php": "^8.3",
"laravel/framework": "^13.17"
```

Wening's compatibility decision is **Laravel 13.x**. The exact framework patch/minor resolved during bootstrap belongs in `composer.lock`.

## Livewire policy

Target:

```text
livewire/livewire: ^4.4
```

At Phase 1A audit, Livewire **v4.4.6** is the latest release and explicitly supports Illuminate/Laravel 13.

The project should accept compatible Livewire 4.x updates through Composer constraints while keeping an exact reproducible version in `composer.lock`.

Alpine is supplied/initialized through Livewire according to the locked Wening technical direction; do not load a second Alpine copy accidentally.

## Composer policy

Target development/CI feature line:

```text
Composer 2.10.x
```

At Phase 1A audit, Composer **2.10.3** is the latest stable release.

Policy:

- use maintained Composer 2.10.x;
- commit `composer.lock`;
- CI uses `composer install`;
- dependency upgrades are explicit work, never an incidental CI side effect.

## Node/npm policy

Node baseline:

```text
Node.js 24 LTS (Krypton)
```

Node 26 is Current and is intentionally not the baseline.

At Phase 1A audit:

- Node 24 is LTS;
- latest published 24.x release is 24.21.0;
- the Node 24 archive reports npm 11.19.0.

Policy:

- CI tracks Node major 24 rather than Node Current;
- local development should use Node 24;
- use npm 11.x;
- commit `package-lock.json`;
- CI uses `npm ci`;
- patch-level Node/npm updates inside the locked major line are maintenance, not architecture changes.

## Tailwind/Vite policy

The official Laravel 13 skeleton currently declares:

```json
"@tailwindcss/vite": "^4.0.0",
"laravel-vite-plugin": "^3.1",
"tailwindcss": "^4.0.0",
"vite": "^8.0.0"
```

Wening adopts these major lines for the initial reference application.

Tailwind remains the styling engine beneath Wening; these package choices do not authorize product UI implementation during Phase 1.

## Lockfile policy

Compatibility constraints and lockfiles serve different purposes.

### Manifest

Manifests express the supported update range:

- `composer.json`
- `package.json`

### Lockfiles

Lockfiles express the exact reproducible dependency graph:

- `composer.lock`
- `package-lock.json`

Both lockfiles must be committed for the reference application.

Normal CI must not run dependency-update commands such as:

```text
composer update
npm update
```

Instead:

```text
composer install
npm ci
```

## Official evidence used

- Laravel release/support policy: https://laravel.com/framework/docs/releases
- Laravel 13 application skeleton: https://github.com/laravel/laravel/tree/13.x
- PHP supported versions: https://www.php.net/supported-versions.php
- Livewire 4 installation: https://livewire.laravel.com/docs/4.x/installation
- Livewire releases: https://github.com/livewire/livewire/releases
- Composer downloads/maintenance: https://getcomposer.org/download/
- Node release status: https://nodejs.org/en/about/previous-releases
- Node 24 archive: https://nodejs.org/en/download/archive/v24
- Tailwind Laravel/Vite guide: https://tailwindcss.com/docs/installation/framework-guides/laravel/vite

## 1A closeout

Phase 1A is CLOSED_GREEN because:

- PHP support policy is explicit;
- the product owner approved the PHP 8.3 floor / 8.4 recommended / 8.5 CI model;
- framework/tool major lines are compatible;
- stable LTS Node is selected;
- dependency resolution and lockfile policy are defined;
- no implementation/UI work was introduced.

**Next allowed work:** Phase 1B — Bootstrap & Repository Topology.
