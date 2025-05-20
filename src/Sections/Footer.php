<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;
use BagistoPlus\Visual\Sections\Block;
use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Settings\Link;
use BagistoPlus\Visual\Settings\RichText;
use BagistoPlus\Visual\Settings\Text;
use BagistoPlus\Visual\Settings\Textarea;

use function BagistoPlus\VisualDebut\_t;

class Footer extends BladeSection
{
    protected static string $view = 'shop::sections.footer';

    protected static array $disabledOn = ['*'];

    protected static string $wrapper = 'footer';

    public function getLinks()
    {
        $groups = collect();
        $currentGroup = null;

        collect($this->section->blocks)->each(function ($block) use (&$groups, &$currentGroup) {
            if ($block->type === 'group') {
                $currentGroup = collect([
                    'group' => $block->settings->title ?? '',
                    'links' => collect(),
                ]);

                $groups->push($currentGroup);
            }

            if ($block->type === 'link' && $currentGroup) {
                $currentGroup['links']->push([
                    'text' => $block->settings->text,
                    'url' => $block->settings->link
                ]);
            }
        });

        return $groups->isEmpty() ? $this->getDefaultLinks() : $groups;
    }

    protected function getDefaultLinks()
    {
        return [
            [
                'group' => 'Company',
                'links' => [
                    ['text' => 'About Us', 'url' => route('shop.cms.page', 'about-us')],
                    ['text' => 'Contact Us', 'url' => route('shop.home.contact_us')],
                    ['text' => 'About Us', 'url' => route('shop.cms.page', 'customer-service')],
                ],
            ],
            [
                'group' => 'Policy',
                'links' => [
                    ['text' => 'Privacy Policy', 'url' => route('shop.cms.page', 'privacy-policy')],
                    ['text' => 'Payment Policy', 'url' => route('shop.cms.page', 'payment-policy')],
                    ['text' => 'Shipping Policy', 'url' => route('shop.cms.page', 'shipping-policy')],
                ],
            ],
            [
                'group' => 'Account',
                'links' => [
                    ['text' => 'Sign In', 'url' => route('shop.customer.session.index')],
                    ['text' => 'Create Account', 'url' => route('shop.customers.register.index')],
                    ['text' => 'Forget Password', 'url' => route('shop.customers.forgot_password.create')],
                ],
            ],
        ];
    }

    public static function name(): string
    {
        return _t('footer.name');
    }

    public static function description(): string
    {
        return _t('footer.description');
    }

    public static function settings(): array
    {
        return [
            Text::make('heading', _t('footer.settings.heading_label'))
                ->default(_t('footer.settings.heading_default')),

            RichText::make('description', _t('footer.settings.description_label'))
                ->default(_t('footer.settings.description_default')),

            Checkbox::make('show_social_links', _t('footer.settings.show_social_links_label'))
                ->default(true)
                ->info(_t('footer.settings.show_social_links_info')),
        ];
    }

    public static function blocks(): array
    {
        return [
            Block::make('group', _t('footer.blocks.group.name'))
                ->settings([
                    Text::make('title', _t('footer.blocks.group.settings.title_label'))
                        ->default(_t('footer.blocks.group.settings.title_default')),
                ]),

            Block::make('link', _t('footer.blocks.link.name'))
                ->settings([
                    Text::make('text', _t('footer.blocks.link.settings.text_label'))
                        ->default(_t('footer.blocks.link.settings.text_default')),

                    Link::make('link', _t('footer.blocks.link.settings.link_label'))
                        ->default('/'),
                ]),
        ];
    }
}
