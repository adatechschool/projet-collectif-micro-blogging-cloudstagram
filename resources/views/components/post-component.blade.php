@props(['post'])

<div class="flex ml-10 p-6 w-96 opacity-30 hover:opacity-100 transition ease-in-out delay-100">
    <div class="flex flex-col">    
        <h3 class=" text-xl font-bold text-red-400 mb-1">.ೃ࿐ {{ $post['title'] }}</h3>
        @if (isset($post['imageUrl']))
        <img src="{{ $post['imageUrl'] }}">
        @else
        <img src="{{asset('storage/img/cloud_default.jpg')}}" alt="Default cloud image">
        @endif
        <p class=" mb-3">“ {{ $post['content'] }} „</p>
        <p class=" text-sm italic">published by {{ $post['author'] }} on {{ $post['date'] }}</p>
</div>
</div>