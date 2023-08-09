<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-400 text-2xl">{{ $user->name }}</div>
                <div class="p-6 text-gray-900 italic">Bio :  “ {{ $user->biography }} „</div>
                
                
                <div class="p-6 text-red-400 text-xl">
                    {{ __('My Posts') }}
                </div>
                    <div class="text-xl font-semibold mb-4">
                        @foreach ($posts as $post)
                        <x-post-component :post="$post" ></x-post-component>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
