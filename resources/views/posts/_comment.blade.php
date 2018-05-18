<div class="card" id="comment-{{$comment->id}}">
    <div class="card-header @if(isset($primary)) text-warning @endif">
        <small>
        commented <strong>{{ $comment->user->name }}</strong>
        on <strong>{{ $comment->created_at->diffForHumans() }}</strong>
        </small>

        <span class="pull-right"><a href="#" class="reply-trigger" data-reply-id="reply-form-{{$comment->id}}"><i class="fa fa-reply"></i></a></span>
    </div>
    <div class="card-body">
        {{ $comment->body }}

            @if($comment->replies->count())
                @foreach($comment->replies as $reply)
                    @include("posts._comment", [ 'comment' => $reply ])
                @endforeach
            @endif
    </div>
</div>
@auth
    @include('posts._comment_form', ['id' => 'reply-form-'. $comment->id])
@endauth
