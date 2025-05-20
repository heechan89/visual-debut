<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class Profile extends BladeSection
{
    protected static array $enabledOn = ['account/profile'];

    protected static string $view = 'shop::sections.profile';
}
