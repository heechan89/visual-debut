<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

class Downloadables extends BladeSection
{
    protected static array $enabledOn = ['account/downloadables'];

    protected static string $view = 'shop::sections.downloadables';
}
