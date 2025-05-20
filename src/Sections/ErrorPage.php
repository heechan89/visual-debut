<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class ErrorPage extends BladeSection
{
    protected static array $enabledOn = ['error'];

    protected static string $view = 'shop::sections.error-page';
}
