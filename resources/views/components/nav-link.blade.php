@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-purple-800  text-sm font-medium leading-5 text-gray-200  focus:border-purple-500 hover:border-purple-600 transition duration-250 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-grey-900  text-sm font-medium leading-5 text-gray-600  focus:border-purple-500 hover:border-purple-600 hover:text-gray-200  transition duration-250 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
