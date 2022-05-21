@props(['disabled' => false, 'placeholder' => ""])

<input {{ $disabled ? 'disabled' : '' }} placeholder="{{ $placeholder }}" {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
