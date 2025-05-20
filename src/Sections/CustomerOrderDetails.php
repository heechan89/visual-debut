<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class CustomerOrderDetails extends BladeSection
{
    protected static array $enabledOn = ['account/order-details'];

    protected static string $view = 'shop::sections.customer-order-details';
}
