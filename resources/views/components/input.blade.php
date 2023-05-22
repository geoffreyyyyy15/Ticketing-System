@props(['name', 'type' => 'text', 'model'])
@php
    $classes = ''
@endphp
<label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ ucwords($name) }}</label>
<div {{ $attributes->merge(['class' => $classes]) }}>
    <input type="{{ $name }}"
    name="{{ $name }}"
    id="{{ $name }}"
    wire:model.debounce.500ms='{{ $model }}'
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="{{  ucwords($name) }}" >

</div>
<x-errors.input-error name="{{ $name }}" />
