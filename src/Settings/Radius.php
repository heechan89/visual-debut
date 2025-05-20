<?php

namespace BagistoPlus\VisualDebut\Settings;

use BagistoPlus\Visual\Settings\Base;

class Radius extends Base
{
    public static string $component = 'radius-setting';

    public static function make(string $id, string $label = '')
    {
        return parent::make($id, $label)->default('md');
    }
}
