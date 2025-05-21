<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

use function BagistoPlus\VisualDebut\_t;

class CheckoutSuccess extends BladeSection
{
    protected static array $enabledOn = ['checkout-success'];

    protected static string $view = 'shop::sections.checkout-success';

    public static function name(): string
    {
        return _t('checkout-success.name');
    }

    public static function description(): string
    {
        return _t('checkout-success.description');
    }
}
