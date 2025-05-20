<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class CustomerEditAddress extends BladeSection
{
    protected static array $enabledOn = ['account/edit-address'];

    protected static string $view = 'shop::sections.customer-edit-address';
}
