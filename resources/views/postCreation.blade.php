<x-app-layout class="flex justify-self-center">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post something 
        </h2>
    </x-slot>
    
    <div class="w-full flex justify-center mt-10">
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
            @method('POST')

            <!-- Title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Content -->
            <div class="mt-4">
                <x-input-label for="content" :value="__('Content')" />
                <x-textarea id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content')" required autocomplete="content" />
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>


                <x-primary-button class="ml-24 mt-2">
                    {{ __('Post') }}
                </x-primary-button>
            </div>
        </form>
    </div> 
</x-app-layout>