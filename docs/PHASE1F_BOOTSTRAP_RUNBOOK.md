# PHASE 1F — Local Bootstrap Runbook (Windows)

**Status:** CLOSED_GREEN
**Branch:** `phase/01-engineering-baseline`

Phase 1F is the first workstream that creates executable application files. It must remain an engineering bootstrap only; do not implement Wening design tokens/components yet.

## Preconditions

Use a PowerShell terminal in the local clone of `akhmadafnan/wening-ui`.

Expected primary environment:

- PHP 8.4 recommended (8.3/8.5 are supported);
- Composer 2.10.x;
- Node 24 LTS;
- npm 11.x.

### 0. Sync and prove a clean branch

```powershell
git switch phase/01-engineering-baseline
git pull --ff-only origin phase/01-engineering-baseline

Write-Host "`n===== PRECHECK =====" -ForegroundColor Cyan
git status --short
git rev-parse --abbrev-ref HEAD
git rev-parse HEAD

php -v
composer --version
node -v
npm -v
```

**STOP** if the worktree is not clean or the active branch is not `phase/01-engineering-baseline`.

## 1. Generate a clean Laravel 13 skeleton in a temporary directory

Do not run `laravel new .` inside Wening because the repository already contains canonical docs/governance files.

```powershell
$Temp = Join-Path $env:TEMP "wening-laravel13-bootstrap"

if (Test-Path $Temp) {
    Remove-Item -Recurse -Force $Temp
}

composer create-project "laravel/laravel:^13.0" $Temp --prefer-dist --no-interaction
```

If Composer fails, **STOP** and keep the full error output.

## 2. Copy only application-skeleton paths into Wening

This deliberately preserves Wening's existing `README.md`, `AGENTS.md`, `docs/`, `.github/PULL_REQUEST_TEMPLATE.md`, and Git history.

```powershell
$Dirs = @(
    "app",
    "bootstrap",
    "config",
    "database",
    "public",
    "resources",
    "routes",
    "storage",
    "tests"
)

foreach ($Dir in $Dirs) {
    robocopy (Join-Path $Temp $Dir) (Join-Path (Get-Location) $Dir) /E /NFL /NDL /NJH /NJS /NP
    if ($LASTEXITCODE -gt 7) {
        throw "robocopy failed for $Dir with exit code $LASTEXITCODE"
    }
}

$Files = @(
    ".editorconfig",
    ".env.example",
    ".gitattributes",
    ".gitignore",
    ".npmrc",
    "artisan",
    "composer.json",
    "package.json",
    "phpunit.xml",
    "vite.config.js"
)

foreach ($File in $Files) {
    Copy-Item (Join-Path $Temp $File) (Join-Path (Get-Location) $File) -Force
}

Remove-Item -Recurse -Force $Temp
```

Do **not** copy Laravel's `README.md`, `AGENTS.md`, `CHANGELOG.md`, `CLAUDE.md`, or `.github` workflows.

## 3. Install the locked PHP application/tooling dependencies

```powershell
composer require "livewire/livewire:^4.4" --no-interaction --with-all-dependencies

composer require --dev `
    "larastan/larastan:^3.12" `
    "phpstan/phpstan:^2.2" `
    "pestphp/pest:^4.7" `
    "pestphp/pest-plugin-laravel:^4.1" `
    --no-interaction --with-all-dependencies
```

Important:

- Pest **4.x** is intentional.
- Do not upgrade to Pest 5; Pest 5 would break Wening's PHP 8.3 compatibility lane.
- Keep Laravel PAO from the Laravel 13 skeleton.

Initialize Pest:

```powershell
./vendor/bin/pest --init
```

If that command is unavailable, **STOP** and report the exact error rather than improvising another test architecture.

## 4. Install frontend/browser dependencies

First resolve the Laravel 13 frontend skeleton:

```powershell
npm install
```

Then add the Phase 1D browser evidence dependencies:

```powershell
npm install --save-dev "@playwright/test@^1.63.0" "@axe-core/playwright@^4.13.0"
```

Do not install React, Vue, shadcn, Bootstrap, Flux, or a Laravel starter kit.

## 5. Version evidence

```powershell
Write-Host "`n===== VERSION EVIDENCE =====" -ForegroundColor Cyan

php -v
composer --version
php artisan --version
composer show livewire/livewire --no-interaction
composer show larastan/larastan --no-interaction
composer show pestphp/pest --no-interaction
composer show pestphp/pest-plugin-laravel --no-interaction
composer show laravel/pao --no-interaction

node -v
npm -v
npm list tailwindcss @tailwindcss/vite vite laravel-vite-plugin @playwright/test @axe-core/playwright --depth=0
```

Expected policy, not necessarily exact patch numbers:

- PHP 8.3–8.5; 8.4 preferred;
- Laravel 13.x;
- Livewire 4.x;
- Pest 4.x;
- Node 24.x;
- npm 11.x;
- Tailwind 4.x;
- Vite 8.x.

If a major line differs, **STOP**.

## 6. Initial executable proof

```powershell
Write-Host "`n===== PHP TEST =====" -ForegroundColor Cyan
php -d memory_limit=1G vendor/bin/pest --compact

Write-Host "`n===== PINT =====" -ForegroundColor Cyan
php vendor/bin/pint --test

Write-Host "`n===== FRONTEND BUILD =====" -ForegroundColor Cyan
npm run build

Write-Host "`n===== SECURITY AUDIT =====" -ForegroundColor Cyan
composer audit --locked
npm audit --audit-level=high
```

Static-analysis configuration and browser test configuration are added/audited immediately after this bootstrap checkpoint, so Larastan/Playwright are not yet the closeout evidence for this first local checkpoint.

## 7. Exact-scope Git verification

```powershell
Write-Host "`n===== GIT VERIFY =====" -ForegroundColor Cyan

git status --short
git diff --check
git diff --stat
```

Expected categories include Laravel application skeleton files plus dependency manifests/lockfiles.

Unexpected examples that must **not** appear:

- overwritten Wening `README.md`;
- overwritten Wening `AGENTS.md`;
- deleted `docs/`;
- imported Laravel repository workflows;
- Flux/shadcn/Bootstrap source;
- product UI implementation.

## 8. Checkpoint only when all required commands are green

```powershell
git add `
    .editorconfig `
    .env.example `
    .gitattributes `
    .gitignore `
    .npmrc `
    app `
    artisan `
    bootstrap `
    composer.json `
    composer.lock `
    config `
    database `
    package.json `
    package-lock.json `
    phpunit.xml `
    public `
    resources `
    routes `
    storage `
    tests `
    vite.config.js

git diff --cached --check
git status --short

git commit -m "chore: bootstrap Laravel 13 engineering baseline"
git push origin phase/01-engineering-baseline
```

Do not add `.env`, `vendor/`, `node_modules/`, or `public/build/`.

## 9. Evidence to return

Return/preserve:

1. VERSION EVIDENCE output;
2. Pest result;
3. Pint result;
4. `npm run build` result;
5. Composer audit result;
6. npm audit result;
7. final `git status --short`;
8. pushed commit SHA.

After the push, the lead auditor will inspect the GitHub diff before adding/finalizing Larastan config, canonical scripts, Playwright config/smoke, GitHub Actions CI, Dependabot, and final Phase 1F regression evidence.

## Failure rule

Any red command means:

`STOP → REPORT → FIX → RE-RUN`

Do not lower versions, remove tests, skip audits, or change locked architecture merely to produce a green result.