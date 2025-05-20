<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class CmsPage extends BladeSection
{
    protected static array $enabledOn = ['page'];

    protected static string $view = 'shop::sections.cms-page';
}
