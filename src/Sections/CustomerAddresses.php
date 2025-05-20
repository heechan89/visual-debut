<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class CustomerAddresses extends BladeSection
{
    protected static array $enabledOn = ['account/addresses'];

    protected static string $view = 'shop::sections.customer-addresses';
}
