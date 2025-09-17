<?php

namespace FriendsOfBotble\Trustpilot;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Botble\Setting\Facades\Setting;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Setting::delete([
            'fob_trustpilot_enabled',
            'fob_trustpilot_business_unit_id',
            'fob_trustpilot_locale',
            'fob_trustpilot_theme',
            'fob_trustpilot_widget_template_id',
            'fob_trustpilot_stars_color',
            'fob_trustpilot_text_color',
            'fob_trustpilot_font_family',
            'fob_trustpilot_custom_styles',
            'fob_trustpilot_display_position',
        ]);
    }
}
