@props(['messages'])

@if ($messages)
    {{-- Podemos dar color a los alerts de laravel previamente con nonvalidate para que tome las del framework y no directamente de html --}}
    <ul {{ $attributes->merge(['class' => 'mt-3 list-none text-sm space-y-2']) }}>
        @foreach ((array) $messages as $message)
            <li class="br-red-100 border-l-4 border-red-600 text-red-600 font-bold p-4">{{ $message }}</li>
        @endforeach
    </ul>
@endif
