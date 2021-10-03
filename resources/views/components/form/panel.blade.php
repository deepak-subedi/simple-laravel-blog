@props(['width' => 2])

<div class="max-w-{{$width}}xl mx-auto mt-10 border border-gray-300 p-8 rounded-xl">
    {{ $slot }}
</div>