@extends('layouts.app')

@section('content')

    <h3>Latest posts ({{ $posts->total() }})</h3>

    {{ $posts->links() }}

    @foreach($posts as $post)
        <article>
            <div class="card">
                <div class="card-header">
                    <h4>{{ $post->title }}</h4>
                    <small>
                        by <strong>{{ $post->user->name }}</strong>
                        in <strong>{{ $post->category->name }}</strong>
                        on <strong>{{ $post->created_at->format('d/m/Y H:i') }}</strong>
                    </small>
                </div>
                <div class="card-body">
                    <p>
                        {{ $post->preview }}

                        <div>
                            <a href="#">[ Read More ]</a>
                        </div>
                    </p>
                </div>
                <div class="card-footer">
                    <small>{!! $post->tagsList() !!}</small>
                </div>
            </div>
        </article>
    @endforeach

    {{ $posts->links() }}

@stop
