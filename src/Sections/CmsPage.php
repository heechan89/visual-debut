<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

use function BagistoPlus\VisualDebut\_t;

class CmsPage extends BladeSection
{
    protected static array $enabledOn = ['page'];

    protected static string $view = 'shop::sections.cms-page';

    public static function name(): string
    {
        return _t('cms-page.name');
    }

    public static function description(): string
    {
        return _t('cms-page.description');
    }
}
