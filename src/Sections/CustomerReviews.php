<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class CustomerReviews extends BladeSection
{
    protected static array $enabledOn = ['account/reviews'];

    protected static string $view = 'shop::sections.customer-reviews';
}
