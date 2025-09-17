<?php

namespace FriendsOfBotble\Trustpilot\Providers;

use Botble\Base\Supports\ServiceProvider;
use Botble\Shortcode\Facades\Shortcode;
use FriendsOfBotble\Trustpilot\Forms\ShortcodeTrustpilotAdminConfigForm;
use FriendsOfBotble\Trustpilot\Services\TrustpilotService;

class ShortcodeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (function_exists('shortcode')) {
            Shortcode::register('trustpilot-widget', trans('plugins/fob-trustpilot::trustpilot.shortcode.name'), trans('plugins/fob-trustpilot::trustpilot.shortcode.description'), [$this, 'render']);

            shortcode()->setAdminConfig('trustpilot-widget', function (array $attributes) {
                return ShortcodeTrustpilotAdminConfigForm::createFromArray($attributes);
            });
        }
    }

    public function render($shortcode): string
    {
        $trustpilotService = app(TrustpilotService::class);

        $originalTemplate = setting('fob_trustpilot_widget_template_id');

        if ($shortcode->template_id) {
            setting()->set('fob_trustpilot_widget_template_id', $shortcode->template_id);
        }

        $html = $trustpilotService->getWidgetHtml();

        if ($shortcode->template_id) {
            setting()->set('fob_trustpilot_widget_template_id', $originalTemplate);
        }

        return $html;
    }
}
