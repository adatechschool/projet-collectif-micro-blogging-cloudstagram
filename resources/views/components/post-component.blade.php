@props(['post'])

<div class="post">
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>
</div>