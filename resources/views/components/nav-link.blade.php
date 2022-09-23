@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-cyan-500  text-sm font-medium leading-5 text-gray-200  transition duration-250 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-gray-500  text-sm font-medium leading-5 text-gray-400  focus:border-cyan-400 hover:border-cyan-300 hover:text-gray-200  transition duration-250 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
