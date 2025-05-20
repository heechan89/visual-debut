<?php

namespace BagistoPlus\VisualDebut\Settings\Support;

class RadiusTransformer
{
    public function __invoke($value)
    {
        return match ($value) {
            'xs' => '0.125rem',
            'sm' => '0.25rem',
            'md' => '0.375rem',
            'lg' => '0.5rem',
            'xl' => '0.75rem',
            'full' => 'calc(infinity * 1px)',
            'none' => '0',
            default => '0.375rem'
        };
    }
}
