<?php

namespace Helldar\LaravelLangPublisher\Facades;

use Helldar\LaravelLangPublisher\Support\Path as PathSupport;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string source(string $locale = null, string $filename = null)
 * @method static string target(string $locale = null, string $filename = null)
 */
final class Path extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PathSupport::class;
    }
}
