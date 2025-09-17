<?php

namespace FriendsOfBotble\Trustpilot\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Supports\Breadcrumb;
use Botble\Setting\Http\Controllers\SettingController;
use FriendsOfBotble\Trustpilot\Forms\TrustpilotSettingForm;
use FriendsOfBotble\Trustpilot\Http\Requests\TrustpilotSettingRequest;

class TrustpilotController extends SettingController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('core/base::base.panel.others'));
    }

    public function edit()
    {
        $this->pageTitle(trans('plugins/fob-trustpilot::trustpilot.settings.title'));

        return TrustpilotSettingForm::create()->renderForm();
    }

    public function update(TrustpilotSettingRequest $request): BaseHttpResponse
    {
        $settings = $request->validated();

        if (! isset($settings['fob_trustpilot_enabled'])) {
            $settings['fob_trustpilot_enabled'] = 0;
        }

        if (isset($settings['fob_trustpilot_custom_styles'])) {
            $json = json_decode($settings['fob_trustpilot_custom_styles']);
            if (json_last_error() !== JSON_ERROR_NONE) {
                unset($settings['fob_trustpilot_custom_styles']);
            } else {
                $settings['fob_trustpilot_custom_styles'] = json_encode($json);
            }
        }

        if (isset($settings['fob_trustpilot_font_family'])) {
            $settings['fob_trustpilot_font_family'] = strip_tags($settings['fob_trustpilot_font_family']);
        }

        foreach (['fob_trustpilot_business_unit_id', 'fob_trustpilot_widget_template_id'] as $field) {
            if (isset($settings[$field])) {
                $settings[$field] = strtolower($settings[$field]);
            }
        }

        return $this->performUpdate($settings);
    }
}
