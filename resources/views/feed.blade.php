<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feed') }}
        </h2>
    </x-slot>

    @foreach ($posts as $post)
    <x-post-component :post="$post"></x-post-component>
    @endforeach

</x-app-layout>
