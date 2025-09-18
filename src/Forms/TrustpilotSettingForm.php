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
                'fob_trustpilot_token',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.token'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.token_helper'))
                    ->value(old('fob_trustpilot_token', setting('fob_trustpilot_token')))
                    ->placeholder('e.g., f6ae086f-2599-41bd-976a-196733ead805')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_stars',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.stars'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.stars_helper'))
                    ->value(old('fob_trustpilot_stars', setting('fob_trustpilot_stars', '1,2,3,4,5')))
                    ->placeholder('1,2,3,4,5')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_widget_height',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_height'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_height_helper'))
                    ->value(old('fob_trustpilot_widget_height', setting('fob_trustpilot_widget_height')))
                    ->placeholder('e.g., 450px, 100%, or auto')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_widget_max_width',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_max_width'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_max_width_helper'))
                    ->value(old('fob_trustpilot_widget_max_width', setting('fob_trustpilot_widget_max_width')))
                    ->placeholder('e.g., 1200px, 90%, or none')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_widget_alignment',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_alignment'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_alignment_helper'))
                    ->choices([
                        'start' => trans('plugins/fob-trustpilot::trustpilot.alignments.start'),
                        'center' => trans('plugins/fob-trustpilot::trustpilot.alignments.center'),
                        'end' => trans('plugins/fob-trustpilot::trustpilot.alignments.end'),
                    ])
                    ->selected(old('fob_trustpilot_widget_alignment', setting('fob_trustpilot_widget_alignment', 'center')))
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_widget_margin_x',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_margin_x'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_margin_x_helper'))
                    ->value(old('fob_trustpilot_widget_margin_x', setting('fob_trustpilot_widget_margin_x')))
                    ->placeholder('e.g., 20px, 5%, auto, or 0')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_widget_margin_y',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_margin_y'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_margin_y_helper'))
                    ->value(old('fob_trustpilot_widget_margin_y', setting('fob_trustpilot_widget_margin_y')))
                    ->placeholder('e.g., 30px, 2rem, or 0')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_widget_padding_x',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_padding_x'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_padding_x_helper'))
                    ->value(old('fob_trustpilot_widget_padding_x', setting('fob_trustpilot_widget_padding_x')))
                    ->placeholder('e.g., 15px, 1rem, or 0')
                    ->toArray()
            )
            ->add(
                'fob_trustpilot_widget_padding_y',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-trustpilot::trustpilot.settings.widget_padding_y'))
                    ->helperText(trans('plugins/fob-trustpilot::trustpilot.settings.widget_padding_y_helper'))
                    ->value(old('fob_trustpilot_widget_padding_y', setting('fob_trustpilot_widget_padding_y')))
                    ->placeholder('e.g., 10px, 1rem, or 0')
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
