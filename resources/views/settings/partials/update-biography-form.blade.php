<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Biography') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your biography.") }}
        </p>
    </header>

    <form method="post" action="{{ route('settings.update_bio') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="bio" :value="__('New biography')" />
            <x-text-input id="biography" name="biography" type="text" class="block w-full h-36 flex place-content-start items-start py-0" :value="old('biography', $user->biography)" required autofocus autocomplete="biography" />
            <x-input-error class="mt-2" :messages="$errors->get('biography')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>   

        @if (session('status') === 'bio_updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600"
            >{{ __('Saved.') }}</p>
        @endif
    
    </form>

   
</section>