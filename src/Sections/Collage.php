<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;
use BagistoPlus\Visual\Sections\Block;
use BagistoPlus\Visual\Settings\Text;
use BagistoPlus\Visual\Settings\Range;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Image;
use BagistoPlus\Visual\Settings\Link;
use BagistoPlus\Visual\Settings\Product;
use BagistoPlus\Visual\Settings\Category;
use BagistoPlus\Visual\Settings\RichText;

use function BagistoPlus\VisualDebut\_t;

class Collage extends BladeSection
{
    protected static string $view = 'shop::sections.collage';

    protected static int $maxBlocks = 3;

    public static function name(): string
    {
        return _t('collage.name');
    }

    public static function description(): string
    {
        return _t('collage.description');
    }

    public static function previewImageUrl(): string
    {
        return bagisto_asset('images/sections/collage.png', 'visual-debut');
    }

    public static function settings(): array
    {
        return [
            Text::make('heading', _t('collage.settings.heading_label')),

            Range::make('heading_size', _t('collage.settings.heading_size_label'))
                ->min(50)->max(150)->step(10)->default(100)->unit('%'),
        ];
    }

    public static function blocks(): array
    {
        return [
            Block::make('image', _t('collage.blocks.image.label'))
                ->settings([
                    Image::make('image', _t('collage.blocks.image.settings.image_label')),
                ]),

            Block::make('product', _t('collage.blocks.product.label'))
                ->settings([
                    Product::make('product', _t('collage.blocks.product.settings.product_label')),
                ]),

            Block::make('category', _t('collage.blocks.category.label'))
                ->settings([
                    Category::make('category', _t('collage.blocks.category.settings.category_label')),
                ]),

            Block::make('custom', _t('collage.blocks.custom.label'))
                ->settings([
                    Image::make('image', _t('collage.blocks.custom.settings.image_label')),
                    Text::make('title', _t('collage.blocks.custom.settings.title_label')),
                    RichText::make('text', _t('collage.blocks.custom.settings.text_label')),
                    Link::make('link', _t('collage.blocks.custom.settings.link_label')),
                    Text::make('link_text', _t('collage.blocks.custom.settings.link_text_label')),
                ]),
        ];
    }

    public static function default(): array
    {
        return [
            'blocks' => [
                ['type' => 'image'],
                ['type' => 'product'],
                ['type' => 'category'],
            ],
        ];
    }
}
