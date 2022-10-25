@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-danger']) }} style="list-style:none; font-size:10px">
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
