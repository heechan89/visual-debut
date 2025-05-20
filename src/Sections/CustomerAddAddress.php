<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class CustomerAddAddress extends BladeSection
{
    protected static array $enabledOn = ['account/add-address'];

    protected static string $view = 'shop::sections.customer-add-address';
}
