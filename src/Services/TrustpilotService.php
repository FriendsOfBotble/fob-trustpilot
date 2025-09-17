<?php

namespace FriendsOfBotble\Trustpilot\Services;

class TrustpilotService
{
    public function getWidgetHtml(): string
    {
        if (setting('fob_trustpilot_enabled') != '1') {
            return '';
        }

        $businessUnitId = setting('fob_trustpilot_business_unit_id');

        if (! $businessUnitId) {
            return '';
        }

        $locale = setting('fob_trustpilot_locale', 'en-US');
        $theme = setting('fob_trustpilot_theme', 'light');
        $templateId = setting('fob_trustpilot_widget_template_id') ?: '53aa8912dec7e10d38f59f36';
        $position = setting('fob_trustpilot_display_position', 'after_footer');

        $attributes = [
            'class' => 'trustpilot-widget',
            'data-locale' => $locale,
            'data-template-id' => $templateId,
            'data-businessunit-id' => $businessUnitId,
            'data-style-height' => $this->getWidgetHeight($templateId),
            'data-style-width' => '100%',
            'data-theme' => $theme,
        ];

        $customStyles = setting('fob_trustpilot_custom_styles');
        if ($customStyles) {
            $attributes['data-custom-styles'] = $customStyles;
        }

        $starsColor = setting('fob_trustpilot_stars_color');
        if ($starsColor) {
            $attributes['data-stars-color'] = $starsColor;
        }

        $textColor = setting('fob_trustpilot_text_color');
        if ($textColor) {
            $attributes['data-text-color'] = $textColor;
        }

        $fontFamily = setting('fob_trustpilot_font_family');
        if ($fontFamily) {
            $attributes['data-font-family'] = $fontFamily;
        }

        $attributesString = $this->buildAttributes($attributes);

        $widgetHtml = sprintf(
            '<div %s><a href="https://www.trustpilot.com/review/%s" target="_blank" rel="noopener">Trustpilot</a></div>',
            $attributesString,
            parse_url(url('/'), PHP_URL_HOST)
        );

        if ($position === 'floating') {
            $html = '<div class="trustpilot-floating-widget" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">' . $widgetHtml . '</div>';
        } else {
            $html = $widgetHtml;
        }

        return $html;
    }

    protected function getDefaultTemplateId(string $widgetType): string
    {
        $templates = $this->getAvailableTemplates();
        $categoryTemplates = $templates[$widgetType] ?? [];

        if (! empty($categoryTemplates)) {
            return array_key_first($categoryTemplates);
        }

        return '53aa8912dec7e10d38f59f36';
    }

    protected function getWidgetHeight(string $templateId): string
    {
        $heights = [
            '53aa8912dec7e10d38f59f36' => '20px',
            '56278e9abfbbba0bdcd568bc' => '450px',
            '53aa8807dec7e10d38f59f32' => '100px',
            '5419b637cbbe100b94d2e178' => '20px',
            '539adbd6dec7e10e686debe3' => '80px',
            '54ad5defc6454f065c28af8b' => '240px',
            '539ad60defb9600b94d7df2c' => '100px',
            '5613c9cde69ddc000b5a2dd3' => '20px',
        ];

        return $heights[$templateId] ?? '100px';
    }

    public function getAvailableTemplates(): array
    {
        return [
            'micro-review-count' => [
                '53aa8912dec7e10d38f59f36' => trans('plugins/fob-trustpilot::trustpilot.templates.micro_review_count'),
                '5613c9cde69ddc000b5a2dd3' => trans('plugins/fob-trustpilot::trustpilot.templates.micro_review_count_dark'),
            ],
            'review-collector' => [
                '56278e9abfbbba0bdcd568bc' => trans('plugins/fob-trustpilot::trustpilot.templates.review_collector'),
            ],
            'mini' => [
                '53aa8807dec7e10d38f59f32' => trans('plugins/fob-trustpilot::trustpilot.templates.mini'),
                '539ad60defb9600b94d7df2c' => trans('plugins/fob-trustpilot::trustpilot.templates.mini_dark'),
            ],
            'micro-star-rating' => [
                '5419b637cbbe100b94d2e178' => trans('plugins/fob-trustpilot::trustpilot.templates.micro_star_rating'),
            ],
            'carousel' => [
                '53aa8912dec7e10d38f59f36' => trans('plugins/fob-trustpilot::trustpilot.templates.carousel'),
                '54ad5defc6454f065c28af8b' => trans('plugins/fob-trustpilot::trustpilot.templates.carousel_full'),
            ],
            'mini-carousel' => [
                '539adbd6dec7e10e686debe3' => trans('plugins/fob-trustpilot::trustpilot.templates.mini_carousel'),
            ],
        ];
    }

    public function getAllTemplates(): array
    {
        $templates = $this->getAvailableTemplates();
        $flatTemplates = [];

        foreach ($templates as $category => $categoryTemplates) {
            foreach ($categoryTemplates as $id => $name) {
                $categoryName = $this->getAvailableWidgetTypes()[$category] ?? $category;
                $flatTemplates[$id] = $categoryName . ' - ' . $name;
            }
        }

        return $flatTemplates;
    }

    public function getAvailableWidgetTypes(): array
    {
        return [
            'micro-review-count' => trans('plugins/fob-trustpilot::trustpilot.widget_types.micro_review_count'),
            'review-collector' => trans('plugins/fob-trustpilot::trustpilot.widget_types.review_collector'),
            'mini' => trans('plugins/fob-trustpilot::trustpilot.widget_types.mini'),
            'micro-star-rating' => trans('plugins/fob-trustpilot::trustpilot.widget_types.micro_star_rating'),
            'carousel' => trans('plugins/fob-trustpilot::trustpilot.widget_types.carousel'),
            'mini-carousel' => trans('plugins/fob-trustpilot::trustpilot.widget_types.mini_carousel'),
        ];
    }

    public function getAvailableLocales(): array
    {
        return [
            'en-US' => 'English (US)',
            'en-GB' => 'English (UK)',
            'da-DK' => 'Danish',
            'de-DE' => 'German',
            'es-ES' => 'Spanish',
            'fr-FR' => 'French',
            'it-IT' => 'Italian',
            'nl-NL' => 'Dutch',
            'no-NO' => 'Norwegian',
            'pl-PL' => 'Polish',
            'pt-BR' => 'Portuguese (Brazil)',
            'sv-SE' => 'Swedish',
            'fi-FI' => 'Finnish',
            'ja-JP' => 'Japanese',
            'ru-RU' => 'Russian',
            'zh-CN' => 'Chinese (Simplified)',
        ];
    }

    public function getAvailableThemes(): array
    {
        return [
            'light' => trans('plugins/fob-trustpilot::trustpilot.themes.light'),
            'dark' => trans('plugins/fob-trustpilot::trustpilot.themes.dark'),
        ];
    }

    public function getDisplayPositions(): array
    {
        return [
            'after_footer' => trans('plugins/fob-trustpilot::trustpilot.positions.after_footer'),
            'floating' => trans('plugins/fob-trustpilot::trustpilot.positions.floating'),
            'widget_only' => trans('plugins/fob-trustpilot::trustpilot.positions.widget_only'),
        ];
    }

    protected function buildAttributes(array $attributes): string
    {
        $html = [];

        foreach ($attributes as $key => $value) {
            if ($value === null) {
                continue;
            }

            $html[] = $key . '="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"';
        }

        return implode(' ', $html);
    }
}
