<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;
use BagistoPlus\Visual\Sections\Block;
use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Settings\Icon;
use BagistoPlus\Visual\Settings\Image;
use BagistoPlus\Visual\Settings\Radio;
use BagistoPlus\Visual\Settings\RichText;
use BagistoPlus\Visual\Settings\Text;
use Webkul\Category\Repositories\CategoryRepository;

use function BagistoPlus\VisualDebut\_t;

class Header extends BladeSection
{
    protected static string $view = 'shop::sections.header';

    protected static array $disabledOn = ['*'];

    protected static string $wrapper = 'header';

    public static function blocks(): array
    {
        return [
            Block::make('logo', _t('header.blocks.logo.name'))
                ->limit(1)
                ->settings([
                    Image::make('logo', _t('header.blocks.logo.settings.logo_image_label')),
                    Image::make('mobile_logo', _t('header.blocks.logo.settings.mobile_logo_image_label')),

                    Text::make('logo_text', _t('header.blocks.logo.settings.logo_text_label'))
                        ->placeholder(_t('header.blocks.logo.settings.logo_text_placeholder')),

                    Checkbox::make('push_to_left', _t('header.blocks.logo.settings.push_to_left'))
                        ->default(false),

                    Checkbox::make('push_to_right', _t('header.blocks.logo.settings.push_to_right'))
                        ->default(false),

                    Radio::make('alignment', 'Alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('center'),
                ]),

            Block::make('nav', _t('header.blocks.nav.name'))
                ->limit(1)
                ->settings([
                    Checkbox::make('push_to_left', _t('header.blocks.nav.settings.push_to_left'))
                        ->default(true),

                    Checkbox::make('push_to_right', _t('header.blocks.nav.settings.push_to_right'))
                        ->default(false),
                ]),

            Block::make('currency', _t('header.blocks.currency.name'))->limit(1),

            Block::make('locale', _t('header.blocks.locale.name'))
                ->limit(1)
                ->settings([
                    Icon::make('icon', _t('header.blocks.locale.settings.icon_label'))
                        ->default('lucide-globe')
                ]),

            Block::make('search', _t('header.blocks.search.name'))
                ->limit(1)
                ->settings([
                    Icon::make('search_icon', _t('header.blocks.search.settings.search_icon_label'))
                        ->default('lucide-search'),

                    Icon::make('image_search_icon', _t('header.blocks.search.settings.image_search_icon_label'))
                        ->default('lucide-camera')
                ]),

            Block::make('compare', _t('header.blocks.compare.name'))
                ->limit(1)
                ->settings([
                    Icon::make('icon', _t('header.blocks.compare.settings.icon_label'))
                        ->default('lucide-arrow-left-right')
                ]),

            Block::make('user', _t('header.blocks.user.name'))
                ->limit(1)
                ->settings([
                    Icon::make('icon', _t('header.blocks.user.settings.icon_label'))
                        ->default('lucide-user'),

                    Text::make('guest_heading', _t('header.blocks.user.settings.guest_heading_label'))
                        ->default(__('shop::app.components.layouts.header.welcome-guest')),

                    RichText::make('guest_description', _t('header.blocks.user.settings.guest_description_label'))
                        ->default(__('shop::app.components.layouts.header.dropdown-text'))
                ]),

            Block::make('cart', _t('header.blocks.cart.name'))
                ->limit(1)
                ->settings([
                    Text::make('heading', _t('header.blocks.cart.settings.heading_label'))
                        ->default(__('shop::app.checkout.cart.mini-cart.shopping-cart')),

                    RichText::make('description', _t('header.blocks.cart.settings.description_label'))
                        ->default(core()->getConfigData('sales.checkout.mini_cart.offer_info'))
                ])
        ];
    }

    public static function default(): array
    {
        return [
            'blocks' => [
                ['type' => 'logo'],
                ['type' => 'nav'],
                ['type' => 'currency'],
                ['type' => 'locale'],
                ['type' => 'search'],
                ['type' => 'compare'],
                ['type' => 'user'],
                ['type' => 'cart'],
            ],
        ];
    }

    public function getCategories()
    {
        // @phpstan-ignore-next-line
        $rootCategoryId = core()->getCurrentChannel()->root_category_id;

        $categories = app(CategoryRepository::class)->getVisibleCategoryTree($rootCategoryId);

        return $categories->filter(fn($c) => (bool) $c->slug);
    }
}
