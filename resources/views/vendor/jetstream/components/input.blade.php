@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray focus:border-indigo-300 rounded-md shadow-sm']) !!}>
