<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;
use BagistoPlus\Visual\Settings;
use BagistoPlus\Visual\Settings\ColorScheme;

use function BagistoPlus\VisualDebut\_t;

class Newsletter extends BladeSection
{
    protected static string $view = 'shop::sections.newsletter';

    protected static string $previewImageUrl = 'themes/shop/visual-debut/images/sections/newsletter.png';

    public static function name(): string
    {
        return _t('newsletter.name');
    }

    public static function description(): string
    {
        return _t('newsletter.description');
    }

    public static function settings(): array
    {
        return [
            ColorScheme::make('scheme', _t('newsletter.settings.scheme_label'))
                ->info(_t('newsletter.settings.scheme_note')),

            Settings\Text::make('heading', _t('newsletter.settings.heading_label'))
                ->default(_t('newsletter.settings.heading_default')),

            Settings\RichText::make('description', _t('newsletter.settings.description_label'))
                ->default(_t('newsletter.settings.description_default')),
        ];
    }
}
