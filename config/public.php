<?php

use Helldar\PrettyArray\Contracts\Caseable;

return [
    /*
     * Determines what type of files to use when updating language files.
     *
     * `true` means inline files will be used.
     * `false` means that default files will be used.
     *
     * The difference between them can be seen here:
     * @see https://github.com/Laravel-Lang/lang/blob/master/script/en/validation.php
     * @see https://github.com/Laravel-Lang/lang/blob/master/script/en/validation-inline.php
     *
     * By default, `true`.
     */

    'inline' => true,

    /*
     * Do arrays need to be aligned by keys before processing arrays?
     *
     * By default, true
     */

    'alignment' => true,

    /*
     * Key exclusion when combining.
     */

    'exclude' => [
        // 'auth' => ['throttle'],
        // 'pagination' => ['previous'],
        // 'passwords' => ['reset', 'throttled', 'user'],
        // 'json' => ['Confirm Password'],
    ],

    /*
     * List of ignored localizations.
     */

    'ignore' => [
        // 'sq',
        // 'ar',
        // Helldar\LaravelLangPublisher\Constants\Locales::ALBANIAN,
        // Helldar\LaravelLangPublisher\Constants\Locales::ARABIC,
    ],

    /*
     * Change key case.
     *
     * Available values:
     *
     *   Helldar\PrettyArray\Contracts\Caseable::NO_CASE      - Case does not change
     *   Helldar\PrettyArray\Contracts\Caseable::CAMEL_CASE   - camelCase
     *   Helldar\PrettyArray\Contracts\Caseable::KEBAB_CASE   - kebab-case
     *   Helldar\PrettyArray\Contracts\Caseable::PASCAL_CASE  - PascalCase
     *   Helldar\PrettyArray\Contracts\Caseable::SNAKE_CASE   - snake_case
     *
     * By default, Caseable::NO_CASE
     */

    'case' => interface_exists(Caseable::class) ? Caseable::NO_CASE : 0,

    /*
     * Determines from which packages to synchronize localization files.
     *
     * A prerequisite is compliance with a single file placement format:
     *
     * source/
     * locales/
     *   af/
     *     af.json
     *     <filename>.php
     *   <locale>/
     *     <locale>.json
     *     <filename>.php
     */

    'plugins' => [
        // 'andrey-helldar/lang-translations',
    ],
];
