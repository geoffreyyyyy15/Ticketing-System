@php
    $class = 'mb-4'
@endphp
<div {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</div>