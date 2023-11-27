<!-- resources/views/components/dashboard-link.blade.php -->

@props(['href', 'active'])

<a {{ $attributes->merge(['class' => 'text-gray-700 hover:bg-gray-200 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out']) }} href="{{ $href }}" @if($active) aria-current="page" @endif>
    {{ $slot }}
</a>