<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            POST 
        </h2>
    </x-slot>
    
    <x-post-component :post="$post"></x-post-component> 

</x-app-layout>