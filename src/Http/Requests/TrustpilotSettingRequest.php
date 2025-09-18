<?php

namespace FriendsOfBotble\Trustpilot\Http\Requests;

use Botble\Base\Rules\OnOffRule;
use Botble\Setting\Http\Requests\SettingRequest;
use FriendsOfBotble\Trustpilot\Services\TrustpilotService;
use Illuminate\Validation\Rule;

class TrustpilotSettingRequest extends SettingRequest
{
    public function rules(): array
    {
        $trustpilotService = app(TrustpilotService::class);

        return [
            'fob_trustpilot_enabled' => [new OnOffRule()],

            'fob_trustpilot_business_unit_id' => [
                'nullable',
                'string',
                'regex:/^[a-f0-9]{16,24}$/i',
                'required_if:fob_trustpilot_enabled,1',
            ],

            'fob_trustpilot_verification_id' => [
                'nullable',
                'string',
                'max:255',
            ],

            'fob_trustpilot_locale' => [
                'nullable',
                'string',
                Rule::in(array_keys($trustpilotService->getAvailableLocales())),
            ],

            'fob_trustpilot_theme' => [
                'nullable',
                Rule::in(['light', 'dark']),
            ],

            'fob_trustpilot_widget_template_id' => [
                'nullable',
                'string',
                Rule::in(array_merge([''], array_keys($trustpilotService->getAllTemplates()))),
            ],

            'fob_trustpilot_stars_color' => [
                'nullable',
                'string',
                'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
            ],

            'fob_trustpilot_text_color' => [
                'nullable',
                'string',
                'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
            ],

            'fob_trustpilot_font_family' => [
                'nullable',
                'string',
                'max:100',
                'regex:/^[a-zA-Z0-9\s,\-\'\"]+$/',
            ],

            'fob_trustpilot_custom_styles' => [
                'nullable',
                'string',
                'max:1000',
                'json',
            ],

            'fob_trustpilot_display_position' => [
                'nullable',
                'string',
                Rule::in(array_keys($trustpilotService->getDisplayPositions())),
            ],

            'fob_trustpilot_token' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/i',
            ],

            'fob_trustpilot_stars' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^[1-5](,[1-5])*$/',
            ],

            'fob_trustpilot_widget_height' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(\d+(\.\d+)?(px|%|em|rem|vh|vw)|auto)$/i',
            ],

            'fob_trustpilot_widget_max_width' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(\d+(\.\d+)?(px|%|em|rem|vw)|none)$/i',
            ],

            'fob_trustpilot_widget_alignment' => [
                'nullable',
                'string',
                Rule::in(['start', 'center', 'end']),
            ],

            'fob_trustpilot_widget_margin_x' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(\d+(\.\d+)?(px|%|em|rem|vw)|0|auto)$/i',
            ],

            'fob_trustpilot_widget_margin_y' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(\d+(\.\d+)?(px|%|em|rem|vh)|0)$/i',
            ],

            'fob_trustpilot_widget_padding_x' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(\d+(\.\d+)?(px|%|em|rem|vw)|0)$/i',
            ],

            'fob_trustpilot_widget_padding_y' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(\d+(\.\d+)?(px|%|em|rem|vh)|0)$/i',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'fob_trustpilot_business_unit_id.required_if' => trans('plugins/fob-trustpilot::trustpilot.validation.business_unit_id_required'),
            'fob_trustpilot_business_unit_id.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.business_unit_id_format'),
            'fob_trustpilot_widget_template_id.in' => trans('plugins/fob-trustpilot::trustpilot.validation.invalid_template'),
            'fob_trustpilot_stars_color.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.color_format'),
            'fob_trustpilot_text_color.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.color_format'),
            'fob_trustpilot_font_family.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.font_family_format'),
            'fob_trustpilot_custom_styles.json' => trans('plugins/fob-trustpilot::trustpilot.validation.json_format'),
            'fob_trustpilot_token.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.token_format'),
            'fob_trustpilot_stars.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.stars_format'),
            'fob_trustpilot_widget_height.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.height_format'),
            'fob_trustpilot_widget_max_width.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.max_width_format'),
            'fob_trustpilot_widget_alignment.in' => trans('plugins/fob-trustpilot::trustpilot.validation.alignment_format'),
            'fob_trustpilot_widget_margin_x.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.margin_format'),
            'fob_trustpilot_widget_margin_y.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.margin_format'),
            'fob_trustpilot_widget_padding_x.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.padding_format'),
            'fob_trustpilot_widget_padding_y.regex' => trans('plugins/fob-trustpilot::trustpilot.validation.padding_format'),
        ];
    }

    protected function prepareForValidation(): void
    {
        $data = $this->all();

        $fieldsToTrim = [
            'fob_trustpilot_business_unit_id',
            'fob_trustpilot_widget_template_id',
            'fob_trustpilot_stars_color',
            'fob_trustpilot_text_color',
            'fob_trustpilot_font_family',
            'fob_trustpilot_token',
            'fob_trustpilot_stars',
            'fob_trustpilot_widget_height',
            'fob_trustpilot_widget_max_width',
            'fob_trustpilot_widget_margin_x',
            'fob_trustpilot_widget_margin_y',
            'fob_trustpilot_widget_padding_x',
            'fob_trustpilot_widget_padding_y',
        ];

        foreach ($fieldsToTrim as $field) {
            if (isset($data[$field]) && is_string($data[$field])) {
                $data[$field] = trim($data[$field]);
            }
        }

        $colorFields = ['fob_trustpilot_stars_color', 'fob_trustpilot_text_color'];
        foreach ($colorFields as $field) {
            if (! empty($data[$field]) && ! str_starts_with($data[$field], '#')) {
                $data[$field] = '#' . $data[$field];
            }
        }

        if (! empty($data['fob_trustpilot_custom_styles'])) {
            json_decode($data['fob_trustpilot_custom_styles']);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $data['fob_trustpilot_custom_styles'] = null;
            }
        }

        $this->replace($data);
    }
}
