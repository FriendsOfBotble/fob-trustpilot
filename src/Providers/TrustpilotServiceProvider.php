<?php

namespace FriendsOfBotble\Trustpilot\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
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
            $this->registerAdminMenu();
            $this->registerWidget();
        });
    }

    protected function registerAdminMenu(): void
    {
        DashboardMenu::registerItem([
            'id' => 'cms-plugins-fob-trustpilot',
            'priority' => 500,
            'parent_id' => 'cms-core-settings',
            'name' => 'plugins/fob-trustpilot::trustpilot.menu_title',
            'icon' => null,
            'url' => fn () => route('fob-trustpilot.settings'),
            'permissions' => ['fob-trustpilot.settings'],
        ]);
    }

    protected function registerWidget(): void
    {
        register_widget(TrustpilotWidget::class);
    }
}
