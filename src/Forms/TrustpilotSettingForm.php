<?php

namespace FriendsOfBotble\Trustpilot\Forms;

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\CheckboxFieldOption;
use Botble\Base\Forms\FieldOptions\ColorFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\ColorField;
use Botble\Base\Forms\Fields\OnOffCheckboxField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Setting\Forms\SettingForm;
use FriendsOfBotble\Trustpilot\Http\Requests\TrustpilotSettingRequest;
use FriendsOfBotble\Trustpilot\Services\TrustpilotService;

class TrustpilotSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $trustpilotService = app(TrustpilotService::class);

        $enabled = old('fob_trustpilot_enabled', setting('fob_trustpilot_enabled', false));

        $this
            ->setSectionTitle(trans('plugins/fob-trustpilot::trustpilot.settings.title'))
            ->setSectionDescription(trans('plugins/fob-trustpilot::trustpilot.settings.description'))
            ->setValidatorClass(TrustpilotSettingRequest::class)
            ->add(
                'fob_trustpilot_alert',
                AlertField::class,
                AlertFieldOption::make()
                    ->content(trans('plugins/fob-trustpilot::trustpilot.settings.alert'))
                    ->type('info')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_enabled',
                OnOffCheckboxField::class,
                CheckboxFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.enable'))
                    ->value($enabled)
                    ->toArray()
            );

        $this->addOpenCollapsible('fob_trustpilot_enabled', '1', $enabled);

        $this
            ->add(
                'fob_trustpilot_business_unit_id',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.business_unit_id'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.business_unit_id_helper'))
                    ->value(old('fob_trustpilot_business_unit_id', setting('fob_trustpilot_business_unit_id')))
                    ->placeholder('e.g., 507f191e810c19729de860ea')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_verification_id',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.verification_id'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.verification_id_helper'))
                    ->value(old('fob_trustpilot_verification_id', setting('fob_trustpilot_verification_id')))
                    ->placeholder('e.g., aBcD1234eFgH5678')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_locale',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.locale'))
                    ->choices($trustpilotService->getAvailableLocales())
                    ->selected(old('fob_trustpilot_locale', setting('fob_trustpilot_locale', 'en-US')))
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_theme',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.theme'))
                    ->choices($trustpilotService->getAvailableThemes())
                    ->selected(old('fob_trustpilot_theme', setting('fob_trustpilot_theme', 'light')))
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_display_position',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.display_position'))
                    ->choices($trustpilotService->getDisplayPositions())
                    ->selected(old('fob_trustpilot_display_position', setting('fob_trustpilot_display_position', 'after_footer')))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.display_position_helper'))
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_widget_template_id',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_template'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_template_helper'))
                    ->choices(array_merge(['' => trans('plugins/fob-trustpilot::trustpilot.settings.use_default_template')], $trustpilotService->getAllTemplates()))
                    ->selected(old('fob_trustpilot_widget_template_id', setting('fob_trustpilot_widget_template_id')))
                    ->searchable()
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_stars_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.stars_color'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.stars_color_helper'))
                    ->value(old('fob_trustpilot_stars_color', setting('fob_trustpilot_stars_color', '#FFD700')))
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_text_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.text_color'))
                    ->value(old('fob_trustpilot_text_color', setting('fob_trustpilot_text_color', '#000000')))
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_font_family',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.font_family'))
                    ->value(old('fob_trustpilot_font_family', setting('fob_trustpilot_font_family')))
                    ->placeholder('Arial, sans-serif')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_custom_styles',
                TextareaField::class,
                TextareaFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.custom_styles'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.custom_styles_helper'))
                    ->value(old('fob_trustpilot_custom_styles', setting('fob_trustpilot_custom_styles')))
                    ->rows(4)
                    ->placeholder('{"stars": {"size": "20px"}}')
                    ->toArray()
            );

        $this->addCloseCollapsible('fob_trustpilot_enabled', '1');
    }
}
