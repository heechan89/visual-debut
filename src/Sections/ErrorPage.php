<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

use function BagistoPlus\VisualDebut\_t;

class ErrorPage extends BladeSection
{
    protected static array $enabledOn = ['error'];

    protected static string $view = 'shop::sections.error-page';

    public static function name(): string
    {
        return _t('error-page.name');
    }

    public static function description(): string
    {
        return _t('error-page.description');
    }
}
