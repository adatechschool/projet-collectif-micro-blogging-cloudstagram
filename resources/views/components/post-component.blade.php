@props(['post'])

<div class="flex flex-row ml-10 p-6">
    <div class="text-3xl font-bold text-red-300 absolute top-36 left-10 w-4 rotate-90">.ೃ࿐</div>
    <div class="flex flex-col">    
        <h3 class=" text-xl font-bold text-red-400 mb-1">{{ $post['title'] }}</h3>
        @if (isset($post['imageURL']))
        <img src="{{ $post['imageURL'] }}">
        @else
        <img src="{{asset('storage/img/cloud_default.jpg')}}" alt="Default cloud image">
        @endif
        <p class=" mb-3">“ {{ $post['content'] }} „</p>
        <p class=" text-sm italic">published by {{ $post['author'] }} on {{ $post['date'] }}</p>
</div>
</div>