<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/posts/{{ $post -> id}}">
            {{ $post -> title}}
        </a>
    </h2>
    <p>
        {{ $post->user->name }} on {{ $post -> created_at -> toFormattedDateString() }}
    </p>

    <p>
        {{ $post -> body}}
    </p>
</div><!-- /.blog-post -->
