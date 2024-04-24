{{--<span x-on:click="open=true">--}}
{{--    {{$slot}}--}}
{{--</span>--}}
<span x-on:click="dialogOpen = true" tabindex="-1">
    {{ $slot }}
</span>
