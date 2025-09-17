<?php

return [
    'menu_title' => 'Trustpilot',

    'settings' => [
        'title' => 'Trustpilot Settings',
        'description' => 'Configure Trustpilot widget integration for your website',
        'alert' => 'To use Trustpilot widgets, you need to have a Trustpilot business account. Visit https://business.trustpilot.com to sign up and get your Business Unit ID.',
        'enable' => 'Enable Trustpilot Integration',
        'configure_button' => 'Configure Trustpilot Settings',

        'business_unit_id' => 'Business Unit ID',
        'business_unit_id_helper' => 'Your unique Trustpilot Business Unit ID (24-character hex string). Find it in your Trustpilot Business account under Settings → API → Business Unit ID, or use the API endpoint: GET https://api.trustpilot.com/v1/business-units/find?name=yourdomain.com',

        'verification_id' => 'Domain Verification ID',
        'verification_id_helper' => 'Optional: Trustpilot domain verification code. Add this to verify your domain ownership. Can be removed after verification is complete.',

        'locale' => 'Language/Locale',
        'theme' => 'Theme',

        'display_position' => 'Display Position',
        'display_position_helper' => 'Choose where the widget displays automatically. Select "Widget/Shortcode Only" to display only via widgets or shortcodes.',

        'widget_template' => 'Widget Template',
        'widget_template_helper' => 'Select a specific template for your widget, or leave empty to use the default template.',
        'use_default_template' => '-- Use Default Template --',

        'stars_color' => 'Stars Color',
        'stars_color_helper' => 'Optional: Custom color for stars (e.g., #FFD700)',

        'text_color' => 'Text Color',

        'font_family' => 'Font Family',

        'custom_styles' => 'Custom Styles (JSON)',
        'custom_styles_helper' => 'Optional: Add custom styles in JSON format',
    ],

    'widget_types' => [
        'micro_review_count' => 'Micro Review Count (Free)',
        'review_collector' => 'Review Collector (Free)',
        'mini' => 'Mini TrustBox',
        'micro_star_rating' => 'Micro Star Rating',
        'carousel' => 'Review Carousel',
        'mini_carousel' => 'Mini Carousel',
    ],

    'templates' => [
        'micro_review_count' => 'Standard Micro Review Count',
        'micro_review_count_dark' => 'Dark Micro Review Count',
        'review_collector' => 'Standard Review Collector',
        'mini' => 'Standard Mini TrustBox',
        'mini_dark' => 'Dark Mini TrustBox',
        'micro_star_rating' => 'Standard Micro Star Rating',
        'carousel' => 'Standard Review Carousel',
        'carousel_full' => 'Full Width Review Carousel',
        'mini_carousel' => 'Standard Mini Carousel',
    ],

    'themes' => [
        'light' => 'Light',
        'dark' => 'Dark',
    ],

    'positions' => [
        'after_footer' => 'After Footer (Automatic)',
        'floating' => 'Floating Bottom Right (Automatic)',
        'widget_only' => 'Widget/Shortcode Only (Manual)',
    ],

    'shortcode' => [
        'name' => 'Trustpilot Widget',
        'description' => 'Display Trustpilot widget',
    ],

    'widget' => [
        'name' => 'Trustpilot Reviews',
        'description' => 'Display Trustpilot reviews widget on your website',
        'custom_class' => 'Custom CSS Class',
        'custom_class_helper' => 'Add custom CSS classes to the widget container',
    ],

    'validation' => [
        'business_unit_id_required' => 'Business Unit ID is required when Trustpilot is enabled.',
        'business_unit_id_format' => 'Business Unit ID must be a valid 16-24 character hexadecimal string.',
        'invalid_template' => 'Please select a valid template from the list.',
        'color_format' => 'Please enter a valid hex color (e.g., #FF5733 or #F53).',
        'font_family_format' => 'Font family contains invalid characters. Use only letters, numbers, spaces, commas, hyphens, and quotes.',
        'json_format' => 'Custom styles must be valid JSON format.',
    ],
];