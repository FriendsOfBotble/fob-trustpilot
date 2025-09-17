<x-core-setting::section
    :title="trans('plugins/fob-trustpilot::trustpilot.settings.title')"
    :description="trans('plugins/fob-trustpilot::trustpilot.settings.description')"
>
    <x-core-setting::on-off
        name="fob_trustpilot_enabled"
        :label="trans('plugins/fob-trustpilot::trustpilot.settings.enable')"
        :value="setting('fob_trustpilot_enabled', false)"
    />

    <x-core-setting::form-group>
        <div class="mt-3">
            <a href="{{ route('fob-trustpilot.settings') }}" class="btn btn-primary">
                {{ trans('plugins/fob-trustpilot::trustpilot.settings.configure_button') }}
            </a>
        </div>
    </x-core-setting::form-group>
</x-core-setting::section>