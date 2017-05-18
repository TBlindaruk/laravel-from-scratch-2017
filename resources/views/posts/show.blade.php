@extends('layouts.master')


@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post -> title}}</h2>
        <p class="blog-post-meta">{{ $post -> created_at -> toFormattedDateString() }} </p>

        @if (count($post->tags))
            <ul>
                @foreach ($post->tags as $tag)
                    <li>
                        <a href="/posts/tags/{{ $tag->name}}">
                        {{ $tag->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

        @endif

        <p>{{ $post -> body}}</p>
        <hr>
        <div class="comments">
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{ $comment->created_at->diffForHumans() }}: &nbsp;
                        </strong>
                        {{ $comment -> body}}
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- add a comment --}}
        <hr>
        <div class="card">

            <div class="card-block">

                <form method="POST" action="/posts/{{ $post->id }}/comments">
                    {{ csrf_field() }}

                    {{--{{ method_field('PATCH') }} ukoliko zelimo patch ili delete request onda koristimo ovo --}}
                    <div class="form-group">

                        <textarea name="body" placeholder="Your comment here" class="form-control" required></textarea>

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Add comment</button>

                    </div>

                </form>

                @include('layouts.errors')

            </div>

        </div>
    </div><!-- /.blog-post -->



@endsection
