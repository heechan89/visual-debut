<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class LoginForm extends BladeSection
{
    protected static array $enabledOn = ['auth/login'];

    protected static string $view = 'shop::sections.login-form';
}
