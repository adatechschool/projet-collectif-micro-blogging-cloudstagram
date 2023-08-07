@props(['post'])

<div class="flex flex-row ml-10 p-6">
    <div class="text-3xl font-bold text-red-300 absolute top-36 left-10 w-4 rotate-90">.ೃ࿐</div>
    <div class="flex flex-col">    
        <h3 class=" text-xl font-bold text-red-400 mb-1">{{ $post->title }}</h3>
        <p class=" mb-3">“ {{ $post->content }} „</p>
        <p class=" text-sm italic">published by user n° {{ $post->user_id }} on {{ $post->created_at }}</p>
</div>
</div>