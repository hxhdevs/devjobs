@php
    $classes = "underline text-sm
                text-gray-500
                hover:text-gray-900
                rounded-md
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:ring-indigo-500
                font-bold"; 
@endphp
<!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{-- {{ __('Forgot your password?') }} --}}
        {{ $slot }}
    </a>