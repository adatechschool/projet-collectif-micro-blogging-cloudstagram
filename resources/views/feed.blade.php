<x-app-layout>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 ">
        @foreach ($posts as $post)
        <x-post-component :post="$post" ></x-post-component>
        @endforeach
    </div>
</x-app-layout>
