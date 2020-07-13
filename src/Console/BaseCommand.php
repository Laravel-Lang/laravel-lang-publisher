<?php

namespace Helldar\LaravelLangPublisher\Console;

use Helldar\LaravelLangPublisher\Contracts\Localizationable;
use Helldar\LaravelLangPublisher\Services\Localization;
use Helldar\LaravelLangPublisher\Support\Result;
use Helldar\LaravelLangPublisher\Traits\Containable;
use Helldar\LaravelLangPublisher\Traits\Containers\Pathable;
use Helldar\LaravelLangPublisher\Traits\Containers\Processable;
use Illuminate\Console\Command;

abstract class BaseCommand extends Command
{
    use Containable;
    use Processable;
    use Pathable;

    /** @var \Helldar\LaravelLangPublisher\Support\Result */
    protected $result;

    protected $select_template = 'What languages to %s? (specify the necessary localizations separated by commas)';

    protected $select_all_template = 'Do you want to %s all localizations?';

    protected $action = 'install';

    public function __construct(Result $result)
    {
        parent::__construct();

        $this->result = $result->setOutput($this);
    }

    protected function locales(): array
    {
        return (array) $this->argument('locales');
    }

    protected function select(array $locales): array
    {
        $question = sprintf($this->select_all_template, $this->action);

        if ($this->confirm($question, false)) {
            return ['*'];
        }

        return $this->choice(
            sprintf($this->select_template, $this->action),
            $locales, 0, null, true
        );
    }

    protected function isForce(): bool
    {
        return $this->hasOption('force') && (bool) $this->option('force');
    }

    protected function wantsJson(): bool
    {
        return (bool) $this->option('json');
    }

    protected function setProcessor(string $php, string $json): void
    {
        $this->processor = $this->wantsJson() ? $json : $php;
    }

    protected function exec(array $locales): void
    {
        foreach ($this->getLocales($locales) as $locale) {
            $this->result->merge(
                $this->localization()
                    ->setPath($this->getPath())
                    ->setProcessor($this->getProcessor())
                    ->run($locale, $this->isForce())
            );
        }
    }

    protected function getLocales(array $locales): array
    {
        $items = $this->locales() ?: $this->select($locales);

        return $items === ['*'] ? $locales : $items;
    }

    protected function localization(): Localizationable
    {
        return app(Localization::class);
    }
}
