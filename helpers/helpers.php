<?php

use FriendsOfBotble\Trustpilot\Services\TrustpilotService;

if (! function_exists('trustpilot_widget')) {
    function trustpilot_widget(array $attributes = []): string
    {
        $trustpilotService = app(TrustpilotService::class);

        $originalSettings = [];

        foreach ($attributes as $key => $value) {
            $settingKey = 'fob_trustpilot_' . $key;
            $originalSettings[$settingKey] = setting($settingKey);
            setting()->set($settingKey, $value);
        }

        $html = $trustpilotService->getWidgetHtml();

        foreach ($originalSettings as $key => $value) {
            setting()->set($key, $value);
        }

        return $html;
    }
}

if (! function_exists('is_trustpilot_enabled')) {
    function is_trustpilot_enabled(): bool
    {
        return (bool) setting('fob_trustpilot_enabled', false);
    }
}

if (! function_exists('get_trustpilot_business_unit_id')) {
    function get_trustpilot_business_unit_id(): ?string
    {
        return setting('fob_trustpilot_business_unit_id');
    }
}
