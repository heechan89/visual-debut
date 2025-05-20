<?php

return [
    'announcement-bar' => [
        'name' => 'Announcement Bar',
        'description' => 'A simple announcement bar to display important information to your customers.',
        'settings' => [
            'text_label'      => 'Announcement Text',
            'default_text'    => 'Free shipping on orders over $50',
            'link_label'      => 'Link',
            'variant_label'   => 'Background Variant',

            'scheme_label'    => 'Color Scheme',
            'scheme_note'     => 'This overrides the global theme color scheme. Changes to the main theme scheme will not affect this section.'
        ],
    ],

    'hero-banner' => [
        'settings' => [
            'scheme_label'           => 'Color Scheme',
            'background_label'       => 'Background Image',
            'overlay_label'          => 'Show Overlay',
            'overlay_opacity_label'  => 'Overlay Opacity (%)',
            'height_label'           => 'Banner Height',
            'scheme_note' => 'This overrides the global theme color scheme. Changes to the main theme scheme will not affect this section.'
        ],

        'blocks' => [
            'heading' => [
                'name'          => 'Heading',
                'text_label'    => 'Heading Text',
                'default_text'  => 'Welcome to our store',
            ],
            'subtext' => [
                'name'          => 'Subtext',
                'text_label'    => 'Subtext',
                'default_text'  => 'Discover our best products and offers.',
            ],
            'button' => [
                'name'          => 'Button',
                'text_label'    => 'Button Text',
                'default_text'  => 'View collections',
                'link_label'    => 'Button Link',
                'color_label'   => 'Variant'
            ],
        ],
    ],

    'header' => [
        'name' => 'Header',
        'description' => '',
        'blocks' => [
            'logo' => [
                'name' => 'Name/Logo',
                'settings' => [
                    'logo_image_label' => 'Upload Logo',
                    'logo_text_label' => 'Logo Text',
                    'mobile_logo_image_label' => 'Mobile logo',
                    'logo_text_placeholder' => 'Displayed when no logo image is set',
                    'push_to_left' => 'Push this element to the start',
                    'push_to_right' => 'Push this element to the end'
                ],
            ],
            'nav' => [
                'name' => 'Navigation',
                'settings' => [
                    'push_to_left' => 'Push this element to the start',
                    'push_to_right' => 'Push this element to the end'
                ]
            ],
            'currency' => [
                'name' => 'Currency selector',
            ],
            'locale' => [
                'name' => 'Language selector',
                'settings' => [
                    'icon_label' => 'Icon'
                ]
            ],
            'search' => [
                'name' => 'Search form',
                'settings' => [
                    'search_icon_label' => 'Search icon',
                    'image_search_icon_label' => 'Image search icon'
                ]
            ],
            'compare' => [
                'name' => 'Compare',
                'settings' => [
                    'icon_label' => 'Icon'
                ]
            ],
            'user' => [
                'name' => 'User menu',
                'settings' => [
                    'icon_label' => 'Icon',
                    'guest_heading_label' => 'Heading shown to guest users',
                    'guest_description_label' => 'Description shown to guest users'
                ]
            ],
            'cart' => [
                'name' => 'Cart preview',
                'settings' => [
                    'heading_label' => 'Heading',
                    'description_label' => 'Description'
                ]
            ],
        ],
    ],

    'footer' => [
        'name' => 'Footer',
        'description' => 'The bottom section of your website with links and branding.',

        'settings' => [
            'heading_label' => 'Heading',
            'heading_default' => 'My Store',

            'description_label' => 'Description',
            'description_default' => 'Add a description of your store here',

            'show_social_links_label' => 'Show social links',
            'show_social_links_info' => 'You can configure links in theme settings',
        ],

        'blocks' => [
            'group' => [
                'name' => 'Links group',
                'settings' => [
                    'title_label' => 'Group name',
                    'title_default' => 'Links group',
                ],
            ],
            'link' => [
                'name' => 'Link',
                'settings' => [
                    'text_label' => 'Link Text ',
                    'text_default' => 'Link',

                    'link_label' => 'Link',
                ],
            ],
        ],
    ],

    'hero' => [
        'name' => 'Hero',
        'description' => '',
        'settings' => [
            'image_label' => 'Image',
            'height_label' => 'Height',
            'height_small' => 'Small',
            'height_medium' => 'Medium',
            'height_large' => 'Large',
            'header_content' => 'Content',
            'content_position_label' => 'Content position',
            'content_position_top' => 'Top',
            'content_position_middle' => 'Middle',
            'content_position_bottom' => 'Bottom',
            'show_overlay_label' => 'Show overlay',
            'overlay_opacity_label' => 'Overlay opacity',
        ],
        'blocks' => [
            'heading' => [
                'name' => 'Heading',
                'settings' => [
                    'heading_label' => 'Heading',
                    'heading_default' => 'Hero heading',
                    'heading_size_label' => 'Heading size',
                    'heading_size_small' => 'Small',
                    'heading_size_medium' => 'Medium',
                    'heading_size_large' => 'Large',
                ],
            ],
            'subheading' => [
                'name' => 'Subheading',
                'settings' => [
                    'subheading_label' => 'Subheading',
                    'subheading_default' => 'Hero Subheading',
                ],
            ],
            'button' => [
                'name' => 'Call to action',
                'settings' => [
                    'text_label' => 'Button text',
                    'text_default' => 'Shop now',
                    'link_label' => 'Button Link',
                ],
            ],
        ],
    ],

    'category-list' => [
        'name' => 'Category List',
        'description' => 'Display a grid of selected categories with images and links.',
        'settings' => [
            'heading_label'         => 'Heading',
            'heading_default'       => 'Shop by Category',

            'heading_size_label'    => 'Heading Size',
            'size_small_label'      => 'Small',
            'size_medium_label'     => 'Medium',
            'size_large_label'      => 'Large',

            'columns_desktop_label' => 'Columns (Desktop)',
            'columns_mobile_label'  => 'Columns (Mobile)',
        ],
        'blocks' => [
            'category' => [
                'name' => 'Category',
                'settings' => [
                    'category_label' => 'Category',
                ],
            ],
        ],
    ],

    'featured-products' => [
        'name' => 'Featured Products',
        'description' => 'Show handpicked or automatically loaded products like featured or new.',

        'settings' => [
            'heading_label' => 'Heading',
            'heading_default' => 'Featured Products',

            'subheading_label' => 'Subheading',
            'subheading_default' => 'Check out our latest products',

            'nb_products_label' => 'Number of Products to show',
            'nb_products_info' => 'Only used when no product block is added',
            'product_type_label' => 'Product Type',
            'product_type_info' => 'Only used when no product block is added',

            'new_label'             => 'New Products',
            'featured_label'        => 'Featured Products',
        ],

        'blocks' => [
            'product' => [
                'name' => 'Product',
                'settings' => [
                    'product_label' => 'Product',
                    'product_info' => 'Select a product to display',
                ],
            ],
        ],
    ],

    'newsletter' => [
        'name'        => 'Newsletter Signup',
        'description' => 'Let customers subscribe for updates and promotions.',

        'settings' => [
            'heading_label' => 'Heading',
            'heading_default' => 'Sign up for our newsletter',

            'description_label' => 'Description',
            'description_default' => 'Use this text to share information about your brand with your customers. Describe a product, share announcements, or welcome customers to your store.',

            'scheme_label'    => 'Color Scheme',
            'scheme_note'     => 'This overrides the global theme color scheme. Changes to the main theme scheme will not affect this section.'
        ],
    ],

    'product-details' => [
        'name' => 'Product Details',
        'description' => 'Displays product info using individual blocks: title, price, description, cart.',

        'settings' => [
            'position_label' => 'Position',
            'position_right' => 'Right',
            'position_under_gallery' => 'Under images gallery',
        ],

        'blocks' => [
            'text' => [
                'name' => 'Text',
                'settings' => [
                    'text_label' => 'Text',
                ],
            ],
            'title' => [
                'name' => 'Title',
                'settings' => [
                    'title_tag_label' => 'Title tag',
                    'title_size' => 'Title size'
                ]
            ],
            'price' => [
                'name' => 'Price',
            ],
            'rating' => [
                'name' => 'Rating',
            ],
            'short-description' => [
                'name' => 'Short description',
            ],
            'quantity-selector' => [
                'name' => 'Quantity selector',
            ],
            'buy-buttons' => [
                'name' => 'Buy buttons',
                'settings' => [
                    'enable_buy_now_label' => 'Show buy now button',
                    'enable_buy_now_info' => 'Enable this option to display a \'Buy Now\' button, allowing customers to proceed directly to checkout for a faster purchasing experience.',
                ],
            ],
            'description' => [
                'name' => 'Product description',
                'settings' => [
                    'show_in_panel_label' => 'Show in collapsible panel',
                    'should_open_panel_label' => 'Open the panel by default'
                ]
            ],
            'collapsible' => [
                'name' => 'Collapsible panel',
                'settings' => [
                    'icon_label' => 'Icon',
                    'heading_label' => 'Heading',
                    'content_label' => 'Content of the panel',
                    'should_open_panel_label' => 'Open the panel by default'
                ]
            ],
            'separator' => [
                'name' => 'Separator',
            ],
            'variant-picker' => [
                'name' => 'Variant Picker',
            ],
            'grouped-options' => [
                'name' => 'Grouped product options',
            ],
            'bundle-options' => [
                'name' => 'Product bundle options',
            ],
            'downloadable-options' => [
                'name' => 'Downloadable products options',
            ],
        ],
    ],

    'category-page' => [
        'name'        => 'Category Products',
        'description' => 'Displays products for the current category with filtering and sorting.',

        'settings' => [
            'heading_label'         => 'Custom Heading (optional)',
            'columns_label'         => 'Grid Columns (Desktop)',
            'columns_tablet_label'  => 'Grid Columns (Tablet)',
            'columns_mobile_label'  => 'Grid Columns (Mobile)',
            'filters_label'         => 'Show Filters',
            'sorting_label'         => 'Show Sorting',
            'banner_label'          => 'Show Category Banner',
        ],
    ],

    'product-reviews' => [
        'name'        => 'Product Reviews',
        'description' => 'Shows recent customer reviews for the current product.',

        'settings' => [
            'rating_summary_label' => 'Show Rating Summary',
            'reviews_label'        => 'Show Individual Reviews',
            'limit_label'          => 'Number of Reviews to Show',
        ],

        'average_rating' => 'Average Rating',
        'no_reviews'     => 'No reviews yet.',
    ],
];
