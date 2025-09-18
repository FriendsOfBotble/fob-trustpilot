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

        'token' => 'Widget Token',
        'token_helper' => 'Optional: Token for Review Collector widget. Get this from your Trustpilot Business account widget configuration.',

        'stars' => 'Stars to Collect',
        'stars_helper' => 'Comma-separated list of star ratings to collect (e.g., 1,2,3,4,5). Default: all ratings.',

        'widget_height' => 'Widget Height',
        'widget_height_helper' => 'Custom height for the widget (e.g., 450px, 100%, auto). Leave empty to use default height for the selected template.',

        'widget_max_width' => 'Widget Maximum Width',
        'widget_max_width_helper' => 'Maximum width for the widget container (e.g., 1200px, 90%, none). Set to "none" for no limit. Leave empty for full width.',

        'widget_alignment' => 'Widget Alignment',
        'widget_alignment_helper' => 'How to align the widget within its container.',

        'widget_margin_x' => 'Horizontal Margin (Left/Right)',
        'widget_margin_x_helper' => 'Horizontal spacing on left and right sides (e.g., 20px, 5%, auto, 0).',

        'widget_margin_y' => 'Vertical Margin (Top/Bottom)',
        'widget_margin_y_helper' => 'Vertical spacing on top and bottom (e.g., 30px, 2rem, 0).',

        'widget_padding_x' => 'Horizontal Padding (Left/Right)',
        'widget_padding_x_helper' => 'Inner horizontal spacing on left and right sides (e.g., 15px, 1rem, 0).',

        'widget_padding_y' => 'Vertical Padding (Top/Bottom)',
        'widget_padding_y_helper' => 'Inner vertical spacing on top and bottom (e.g., 10px, 1rem, 0).',

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

    'alignments' => [
        'start' => 'Left',
        'center' => 'Center',
        'end' => 'Right',
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
        'token_format' => 'Token must be a valid UUID format (e.g., f6ae086f-2599-41bd-976a-196733ead805).',
        'stars_format' => 'Stars must be comma-separated numbers between 1 and 5 (e.g., 1,2,3,4,5).',
        'height_format' => 'Height must be a valid CSS value (e.g., 450px, 100%, 2em, auto).',
        'max_width_format' => 'Maximum width must be a valid CSS value (e.g., 1200px, 90%, none).',
        'alignment_format' => 'Please select a valid alignment option.',
        'margin_format' => 'Margin must be a valid CSS value (e.g., 20px, 5%, 0, auto).',
        'padding_format' => 'Padding must be a valid CSS value (e.g., 15px, 1rem, 0).',
    ],
];