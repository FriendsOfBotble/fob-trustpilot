@php
    $trustpilotService = $data['trustpilotService'] ?? app(\FriendsOfBotble\Trustpilot\Services\TrustpilotService::class);
    $templateId = $config['template_id'] ?? null;
    $customClass = $config['custom_class'] ?? '';

    $originalTemplate = null;
    if ($templateId) {
        $originalTemplate = setting('fob_trustpilot_widget_template_id');
        setting()->set('fob_trustpilot_widget_template_id', $templateId);
    }

    $widgetHtml = $trustpilotService->getWidgetHtml();

    if ($originalTemplate !== null) {
        setting()->set('fob_trustpilot_widget_template_id', $originalTemplate);
    }
@endphp

@if($widgetHtml)
    <div class="trustpilot-widget-container {{ $customClass }}">
        {!! $widgetHtml !!}
    </div>
@endif
