<?php

test('Wening source does not bypass semantic color tokens', function (): void {
    $root = dirname(__DIR__, 2);

    $paths = [
        $root.'/resources/views',
        $root.'/resources/js',
        $root.'/resources/css/app.css',
    ];

    $files = [];

    foreach ($paths as $path) {
        if (is_file($path)) {
            $files[] = $path;

            continue;
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS),
        );

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $files[] = $file->getPathname();
            }
        }
    }

    $literalColorPattern = '/(?:#[0-9a-fA-F]{3,8}\b|(?:rgb|hsl|oklch|lab|lch)\s*\()/';
    $rawPalettePattern = '/(?:bg|text|border|ring|outline|fill|stroke)-(?:slate|gray|zinc|neutral|stone|red|orange|amber|yellow|lime|green|emerald|teal|cyan|sky|blue|indigo|violet|purple|fuchsia|pink|rose)-\d{2,3}/';

    foreach ($files as $file) {
        $contents = file_get_contents($file);

        expect($contents)
            ->not->toMatch($literalColorPattern, "Literal product color found in {$file}")
            ->not->toMatch($rawPalettePattern, "Raw Tailwind palette class found in {$file}");
    }
});
