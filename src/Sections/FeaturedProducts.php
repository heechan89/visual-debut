<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;
use BagistoPlus\Visual\Sections\Block;
use BagistoPlus\Visual\Settings\Product;
use BagistoPlus\Visual\Settings\Range;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Text;
use Webkul\Product\Repositories\ProductFlatRepository;

use function BagistoPlus\VisualDebut\_t;

class FeaturedProducts extends BladeSection
{
    protected static array $disabledOn = ['auth/*', 'account/*'];

    protected static string $view = 'shop::sections.featured-products';

    protected static string $previewImageUrl = 'themes/shop/visual-debut/images/sections/featured-products.png';

    public function getProducts()
    {
        if (count($this->section->blocks) > 0) {
            return collect($this->section->blocks)
                ->map(function ($block) {
                    return $block->settings->product;
                })
                ->filter();
        }

        if ($this->section->settings->product_type === 'featured') {
            return $this->getFeaturedProducts();
        }

        return $this->getNewProducts();
    }

    protected function getFeaturedProducts($count = 4)
    {
        return app(ProductFlatRepository::class)
            ->with(['product'])
            ->scopeQuery(function ($query) {
                $channel = core()->getRequestedChannelCode();
                $locale = core()->getRequestedLocaleCode();

                return $query->distinct()
                    ->addSelect('product_flat.*')
                    ->where('product_flat.status', 1)
                    ->where('product_flat.visible_individually', 1)
                    ->where('product_flat.featured', 1)
                    ->where('product_flat.channel', $channel)
                    ->where('product_flat.locale', $locale);
            })
            ->take($this->section->settings->nb_products)
            ->get()
            ->map->product;
    }

    protected function getNewProducts()
    {
        return app(ProductFlatRepository::class)
            ->with(['product'])
            ->scopeQuery(function ($query) {
                $channel = core()->getRequestedChannelCode();
                $locale = core()->getRequestedLocaleCode();

                return $query->distinct()
                    ->addSelect('product_flat.*')
                    ->where('product_flat.status', 1)
                    ->where('product_flat.visible_individually', 1)
                    ->where('product_flat.new', 1)
                    ->where('product_flat.channel', $channel)
                    ->where('product_flat.locale', $locale);
            })
            ->take($this->section->settings->nb_products)
            ->get()
            ->map->product;
    }

    public static function name(): string
    {
        return _t('featured-products.name');
    }

    public static function description(): string
    {
        return _t('featured-products.description');
    }

    public static function settings(): array
    {
        return [
            Text::make('heading', _t('featured-products.settings.heading_label'))
                ->default(_t('featured-products.settings.heading_default')),

            Text::make('subheading', _t('featured-products.settings.subheading_label'))
                ->default(_t('featured-products.settings.subheading_default')),

            Range::make('nb_products', _t('featured-products.settings.nb_products_label'))
                ->default(4)->min(1)->max(4)->step(1)
                ->info(_t('featured-products.settings.nb_products_info')),

            Select::make('product_type', _t('featured-products.settings.product_type_label'))
                ->options([
                    'new'      => _t('featured-products.settings.new_label'),
                    'featured' => _t('featured-products.settings.featured_label'),
                ])
                ->default('new')
                ->info(_t('featured-products.settings.product_type_info')),
        ];
    }

    public static function blocks(): array
    {
        return [
            Block::make('product', _t('featured-products.blocks.product.name'))
                ->limit(4)
                ->settings([
                    Product::make('product', _t('featured-products.blocks.product.settings.product_label'))
                        ->info(_t('featured-products.blocks.product.settings.product_info')),
                ]),
        ];
    }
}
