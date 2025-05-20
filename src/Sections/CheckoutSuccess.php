<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class CheckoutSuccess extends BladeSection
{
    protected static array $enabledOn = ['checkout-success'];

    protected static string $view = 'shop::sections.checkout-success';
}
