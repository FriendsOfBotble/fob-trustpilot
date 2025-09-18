<?php

use Botble\Base\Facades\AdminHelper;
use FriendsOfBotble\Trustpilot\Http\Controllers\TrustpilotController;
use Illuminate\Support\Facades\Route;

AdminHelper::registerRoutes(function () {
    Route::group(['prefix' => 'settings/trustpilot', 'as' => 'fob-trustpilot.', 'permission' => 'fob-trustpilot.settings'], function () {
        Route::get('/', [TrustpilotController::class, 'edit'])->name('settings');
        Route::put('/', [TrustpilotController::class, 'update'])->name('settings.update');
    });
});
