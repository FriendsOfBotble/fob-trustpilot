<?php

namespace FriendsOfBotble\Trustpilot\Providers;

use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Setting\PanelSections\SettingOthersPanelSection;
use FriendsOfBotble\Trustpilot\Services\TrustpilotService;
use FriendsOfBotble\Trustpilot\Widgets\TrustpilotWidget;

class TrustpilotServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        $this->app->singleton(TrustpilotService::class, function () {
            return new TrustpilotService();
        });
    }

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/fob-trustpilot')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadMigrations()
            ->loadRoutes()
            ->publishAssets();

        $this->app->register(HookServiceProvider::class);
        $this->app->register(ShortcodeServiceProvider::class);

        $this->app->booted(function () {
            $this->registerWidget();
        });

        PanelSectionManager::default()->beforeRendering(function (): void {
            PanelSectionManager::registerItem(
                SettingOthersPanelSection::class,
                fn () => PanelSectionItem::make('trustpilot')
                    ->setTitle(trans('plugins/fob-trustpilot::trustpilot.menu_title'))
                    ->withIcon('ti ti-star')
                    ->withDescription(trans('plugins/fob-trustpilot::trustpilot.settings.description'))
                    ->withPriority(130)
                    ->withPermission('fob-trustpilot.settings')
                    ->withRoute('fob-trustpilot.settings')
            );
        });
    }

    protected function registerWidget(): void
    {
        register_widget(TrustpilotWidget::class);
    }
}
