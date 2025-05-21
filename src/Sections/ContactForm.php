<?php

namespace BagistoPlus\VisualDebut\Sections;

use BagistoPlus\Visual\Sections\BladeSection;

use function BagistoPlus\VisualDebut\_t;

class ContactForm extends BladeSection
{
    protected static string $view = 'shop::sections.contact-form';

    public static function name(): string
    {
        return _t('contact-form.name');
    }

    public static function description(): string
    {
        return _t('contact-form.description');
    }

    public static function previewImageUrl(): string
    {
        return bagisto_asset('images/sections/contact.png', 'visual-debut');
    }
}
