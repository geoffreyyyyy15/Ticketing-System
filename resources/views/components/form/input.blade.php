@props(['name', 'type' => 'text'])

@php
    $class = 'text-gray-900 block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
@endphp
<x-form.field>
<div class="relative z-0 w-full mb-6 group">
    <input {{ $attributes->merge(['class' => $class]) }}
    type="{{ $type }}"
    name="{{ $name }}"
    id="floating_email"
    placeholder=" " required />
    <x-form.label name="{{ $name }}" />
</div>
</x-form.field>
