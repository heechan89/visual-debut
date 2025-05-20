<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class ProfileForm extends BladeSection
{
    protected static array $enabledOn = ['account/edit-profile'];

    protected static string $view = 'shop::sections.profile-form';
}
