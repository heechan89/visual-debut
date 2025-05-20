<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class RegisterForm extends BladeSection
{
    protected static array $enabledOn = ['auth/register'];

    protected static string $view = 'shop::sections.register-form';
}
