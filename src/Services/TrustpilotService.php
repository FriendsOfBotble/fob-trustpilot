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

        $customHeight = setting('fob_trustpilot_widget_height');
        $height = $customHeight ?: $this->getWidgetHeight($templateId);

        $attributes = [
            'class' => 'trustpilot-widget',
            'data-locale' => $locale,
            'data-template-id' => $templateId,
            'data-businessunit-id' => $businessUnitId,
            'data-style-height' => $height,
            'data-style-width' => '100%',
            'data-theme' => $theme,
            'data-allow-robots' => 'true',
            'data-scroll-to-list' => 'false',
        ];

        $token = setting('fob_trustpilot_token');
        if ($token) {
            $attributes['data-token'] = $token;
        }

        $stars = setting('fob_trustpilot_stars');
        if ($stars) {
            $attributes['data-stars'] = $stars;
        }

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
            $attributes['data-text-color'] = $this->mapTextColor($textColor);
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

        $containerStyles = [];

        $maxWidth = setting('fob_trustpilot_widget_max_width');
        if ($maxWidth && $maxWidth !== 'none') {
            $containerStyles[] = sprintf('max-width: %s', $maxWidth);
        }

        $alignment = setting('fob_trustpilot_widget_alignment', 'center');
        $marginX = setting('fob_trustpilot_widget_margin_x');
        $marginY = setting('fob_trustpilot_widget_margin_y');

        // Handle horizontal margin and alignment
        if ($marginX) {
            // If explicit margin X is set, use it
            $containerStyles[] = sprintf('margin-left: %s', $marginX);
            $containerStyles[] = sprintf('margin-right: %s', $marginX);
        } else {
            // Otherwise use alignment
            if ($alignment === 'center') {
                $containerStyles[] = 'margin-left: auto';
                $containerStyles[] = 'margin-right: auto';
            } elseif ($alignment === 'end') {
                $containerStyles[] = 'margin-left: auto';
            }
        }

        // Handle vertical margin
        if ($marginY) {
            $containerStyles[] = sprintf('margin-top: %s', $marginY);
            $containerStyles[] = sprintf('margin-bottom: %s', $marginY);
        }

        // Handle padding
        $paddingX = setting('fob_trustpilot_widget_padding_x');
        $paddingY = setting('fob_trustpilot_widget_padding_y');

        if ($paddingX) {
            $containerStyles[] = sprintf('padding-left: %s', $paddingX);
            $containerStyles[] = sprintf('padding-right: %s', $paddingX);
        }

        if ($paddingY) {
            $containerStyles[] = sprintf('padding-top: %s', $paddingY);
            $containerStyles[] = sprintf('padding-bottom: %s', $paddingY);
        }

        if (! empty($containerStyles)) {
            $containerStyle = implode('; ', $containerStyles);
            $widgetHtml = sprintf('<div class="trustpilot-widget-container" style="%s">%s</div>', $containerStyle, $widgetHtml);
        }

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
            '53aa8912dec7e10d38f59f36' => '20px',   // Micro Review Count
            '56278e9abfbbba0bdcd568bc' => '450px',  // Review Collector
            '53aa8807dec7e10d38f59f32' => '100px',  // Mini
            '5419b637cbbe100b94d2e178' => '20px',   // Micro Star Rating
            '539adbd6dec7e10e686debe3' => '80px',   // Mini Carousel
            '54ad5defc6454f065c28af8b' => '240px',  // Carousel Full
            '539ad60defb9600b94d7df2c' => '100px',  // Mini Dark
            '5613c9cde69ddc000b5a2dd3' => '20px',   // Micro Review Count Dark
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

    protected function mapTextColor(string $color): string
    {
        $darkColors = ['#000000', '#212529', '#495057', '#6c757d'];

        if (in_array(strtolower($color), $darkColors)) {
            return 'dark';
        }

        if (strtolower($color) === '#ffffff' || strtolower($color) === '#fff') {
            return 'light';
        }

        return 'dark';
    }
}
