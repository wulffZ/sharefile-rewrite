@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md bg-gray-400 shadow-sm border-gray-300 focus:border-purple-800 focus:ring focus:ring-purple-800 focus:ring-opacity-75']) !!}>
