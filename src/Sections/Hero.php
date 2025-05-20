<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;
use BagistoPlus\Visual\Sections\Block;
use BagistoPlus\Visual\Settings;

class Hero extends BladeSection
{
    protected static array $disabledOn = ['auth/*', 'account/*'];

    protected static string $view = 'shop::sections.hero';

    public static function settings(): array
    {
        return [
            Settings\Image::make('image', __('visual-debut::sections.hero.settings.image_label'))
                ->default('https://placehold.co/1400x400'),

            Settings\Select::make('height', __('visual-debut::sections.hero.settings.height_label'))
                ->options([
                    'small' => __('visual-debut::sections.hero.settings.height_small'),
                    'medium' => __('visual-debut::sections.hero.settings.height_medium'),
                    'large' => __('visual-debut::sections.hero.settings.height_large'),
                ])
                ->default('medium'),

            Settings\Header::make(__('visual-debut::sections.hero.settings.header_content')),

            Settings\Select::make('content_position', __('visual-debut::sections.hero.settings.content_position_label'))
                ->options([
                    'top' => __('visual-debut::sections.hero.settings.content_position_top'),
                    'middle' => __('visual-debut::sections.hero.settings.content_position_middle'),
                    'bottom' => __('visual-debut::sections.hero.settings.content_position_bottom'),
                ])
                ->default('middle'),

            Settings\Checkbox::make('show_overlay', __('visual-debut::sections.hero.settings.show_overlay_label'))
                ->default(true),

            Settings\Range::make('overlay_opacity', __('visual-debut::sections.hero.settings.overlay_opacity_label'))
                ->default(50)
                ->min(0)
                ->max(100)
                ->step(1)
                ->unit('%'),
        ];
    }

    public static function blocks(): array
    {
        return [
            Block::make('heading', __('visual-debut::sections.hero.blocks.heading.name'))
                ->limit(1)
                ->settings([
                    Settings\Text::make('heading', __('visual-debut::sections.hero.blocks.heading.settings.heading_label'))
                        ->default(__('visual-debut::sections.hero.blocks.heading.settings.heading_default')),

                    Settings\Select::make('size', __('visual-debut::sections.hero.blocks.heading.settings.heading_size_label'))
                        ->options([
                            'small' => __('visual-debut::sections.hero.blocks.heading.settings.heading_size_small'),
                            'medium' => __('visual-debut::sections.hero.blocks.heading.settings.heading_size_medium'),
                            'large' => __('visual-debut::sections.hero.blocks.heading.settings.heading_size_large'),
                        ])
                        ->default('medium'),
                ]),

            Block::make('subheading', __('visual-debut::sections.hero.blocks.subheading.name'))
                ->limit(1)
                ->settings([
                    Settings\Text::make('subheading', __('visual-debut::sections.hero.blocks.subheading.settings.subheading_label'))
                        ->default(__('visual-debut::sections.hero.blocks.subheading.settings.subheading_default')),
                ]),

            Block::make('button', __('visual-debut::sections.hero.blocks.button.name'))
                ->limit(1)
                ->settings([
                    Settings\Text::make('text', __('visual-debut::sections.hero.blocks.button.settings.text_label'))
                        ->default(__('visual-debut::sections.hero.blocks.button.settings.text_default')),

                    Settings\Link::make('button_link', __('visual-debut::sections.hero.blocks.button.settings.link_label'))
                        ->default('/'),
                ]),
        ];
    }
}
