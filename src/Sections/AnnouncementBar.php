<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;
use BagistoPlus\Visual\Settings\ColorScheme;
use BagistoPlus\Visual\Settings\Link;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Text;

use function BagistoPlus\VisualDebut\_t;

class AnnouncementBar extends BladeSection
{
    protected static string $view = 'shop::sections.announcement-bar';

    protected static array $disabledOn = ['*'];

    public static function settings(): array
    {
        return [
            Text::make('text', _t('announcement-bar.settings.text_label'))
                ->default(_t('announcement-bar.settings.default_text')),

            Link::make('link', _t('announcement-bar.settings.link_label')),

            Select::make('variant', _t('announcement-bar.settings.variant_label'))
                ->options([
                    'primary'   => 'Primary',
                    'secondary' => 'Secondary',
                    'accent'    => 'Accent',
                    'neutral'   => 'Neutral',
                ])->default('primary'),

            ColorScheme::make('scheme', _t('announcement-bar.settings.scheme_label'))
                ->info(_t('announcement-bar.settings.scheme_note')),
        ];
    }
}
