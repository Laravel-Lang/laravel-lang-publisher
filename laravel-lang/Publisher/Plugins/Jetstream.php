<?php

declare(strict_types=1);

namespace LaravelLang\Lang\Publisher\Plugins;

use Helldar\LaravelLangPublisher\Plugins\BasePlugin;

class Jetstream extends BasePlugin
{
    public function vendor(): string
    {
        return 'laravel/jetstream';
    }

    public function source(): array
    {
        return ['packages/jetstream.json'];
    }
}
