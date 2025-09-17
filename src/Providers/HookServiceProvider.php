<?php

namespace FriendsOfBotble\Trustpilot\Providers;

use Botble\Base\Supports\ServiceProvider;
use FriendsOfBotble\Trustpilot\Services\TrustpilotService;

class HookServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->booted(function () {
            add_filter(BASE_FILTER_AFTER_SETTING_CONTENT, [$this, 'addSettings'], 59);
            add_filter(THEME_FRONT_HEADER, [$this, 'addTrustpilotMeta'], 100);
            add_filter(THEME_FRONT_FOOTER, [$this, 'renderTrustpilotWidget'], 100);
            add_filter(THEME_FRONT_FOOTER, [$this, 'addTrustpilotScript'], 999);
        });
    }

    public function addSettings(?string $data = null): string
    {
        return $data . view('plugins/fob-trustpilot::settings')->render();
    }

    public function renderTrustpilotWidget(?string $html = null): string
    {
        if (! $this->isEnabledTrustpilot()) {
            return $html;
        }

        $displayPosition = setting('fob_trustpilot_display_position', 'after_footer');

        if (! in_array($displayPosition, ['after_footer', 'floating'])) {
            return $html;
        }

        $trustpilotService = app(TrustpilotService::class);

        $widget = $trustpilotService->getWidgetHtml();

        return $html . $widget;
    }

    public function addTrustpilotMeta(?string $html = null): ?string
    {
        if (! $this->isEnabledTrustpilot()) {
            return $html;
        }

        $businessUnitId = setting('fob_trustpilot_business_unit_id');

        return $html . view('plugins/fob-trustpilot::meta', compact('businessUnitId'))->render();
    }

    public function addTrustpilotScript(?string $html = null): string
    {
        if (! $this->isEnabledTrustpilot()) {
            return $html;
        }

        if (setting('fob_trustpilot_business_unit_id')) {
            $script = '<script type="text/javascript" src="https://widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>';

            return $html . $script;
        }

        return $html ?: '';
    }

    protected function isEnabledTrustpilot(): bool
    {
        return (bool) setting('fob_trustpilot_enabled', false);
    }
}
