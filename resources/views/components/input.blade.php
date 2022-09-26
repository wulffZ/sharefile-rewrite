@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md bg-gray-200 shadow-sm focus:border-pink-700 focus:ring focus:ring-pink-700 focus:ring-opacity-75 text-gray-900']) !!}>
