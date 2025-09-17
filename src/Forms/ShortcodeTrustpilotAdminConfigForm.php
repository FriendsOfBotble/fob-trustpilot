<?php

namespace FriendsOfBotble\Trustpilot\Forms;

use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Shortcode\Forms\ShortcodeForm;
use FriendsOfBotble\Trustpilot\Services\TrustpilotService;

class ShortcodeTrustpilotAdminConfigForm extends ShortcodeForm
{
    public function setup(): void
    {
        parent::setup();

        $trustpilotService = app(TrustpilotService::class);
        $templates = $trustpilotService->getAllTemplates();

        $choices = ['' => trans('plugins/fob-trustpilot::trustpilot.settings.use_default_template')];
        $choices = array_merge($choices, $templates);

        $this->add(
            'template_id',
            SelectField::class,
            SelectFieldOption::make()
                ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_template'))
                ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_template_helper'))
                ->choices($choices)
                ->searchable()
        );
    }
}
