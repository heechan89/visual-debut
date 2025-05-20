<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class CustomerOrders extends BladeSection
{
    protected static array $enabledOn = ['account/orders'];

    protected static string $view = 'shop::sections.customer-orders';
}
