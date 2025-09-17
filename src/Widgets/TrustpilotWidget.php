<?php

namespace FriendsOfBotble\Trustpilot\Widgets;

use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use FriendsOfBotble\Trustpilot\Services\TrustpilotService;

class TrustpilotWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => trans('plugins/fob-trustpilot::trustpilot.widget.name'),
            'description' => trans('plugins/fob-trustpilot::trustpilot.widget.description'),
            'template_id' => null,
            'custom_class' => '',
        ]);

        $this->setFrontendTemplate('plugins/fob-trustpilot::widgets.frontend');
    }

    public function data(): array
    {
        $trustpilotService = app(TrustpilotService::class);

        return [
            'config' => $this->getConfig(),
            'trustpilotService' => $trustpilotService,
        ];
    }

    protected function settingForm(): WidgetForm|string|null
    {
        $trustpilotService = app(TrustpilotService::class);

        return WidgetForm::createFromArray($this->getConfig())
            ->add(
                'template_id',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_template'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_template_helper'))
                    ->choices(array_merge(
                        ['' => trans('plugins/fob-trustpilot::trustpilot.settings.use_default_template')],
                        $trustpilotService->getAllTemplates()
                    ))
            )
            ->add(
                'custom_class',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.widget.custom_class'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.widget.custom_class_helper'))
            );
    }
}
