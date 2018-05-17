<article>
    <div class="card">
            <img src="{{ url($post->cover) }}">
        <div class="card-header">
            <h4><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h4>
            <small>
                by <strong>{{ $post->user->name }}</strong>
                in <strong>{{ $post->category->name }}</strong>
                on <strong>{{ $post->created_at->format('d/m/Y H:i') }}</strong>
            </small>

            @can('update', $post)
                <div>
                    <span class="pull-right"><small><a href="{{ route('posts.edit', $post) }}">Modifica</a></small></span>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <p>
                {{ $post->preview }}
            </p>

            @if($isSinglePost)
                <p>
                    {{ $post->body }}
                </p>
            @else
                <div>
                    <a href="#">[ Read More ]</a>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <small>{!! $post->tagsList() !!}</small>

        </div>
    </div>
</article>
