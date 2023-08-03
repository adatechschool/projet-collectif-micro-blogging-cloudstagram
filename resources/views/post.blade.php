<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            POST 
        </h2>
    </x-slot>
    
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
</x-app-layout>