<div class="card @if(in_array($comment->id, $shownComments)) hide @endif" id="comment-{{$comment->id}}">
    @php
     if(!in_array($comment->id, $shownComments)) $shownComments[] = $comment->id;
    @endphp
    <div class="card-header @if($primary) text-warning @endif">
        <small>
        commented <strong>{{ $comment->user->name }}</strong>
        on <strong>{{ $comment->created_at->diffForHumans() }}</strong>
        </small>

        {{-- <span class="pull-right"><a href="#" class="reply-trigger" data-reply-id="reply-form-{{$comment->id}}"><i class="fa fa-reply"></i></a></span> --}}
    </div>
    <div class="card-body">
        {{ $comment->body }}

           {{--  @if($comment->replies->count())
                @foreach($comment->replies as $reply)
                    @include("posts._comment", [ 'comment' => $reply, 'primary' => false])
                @endforeach
            @endif --}}
    </div>
</div>
@auth
    @include('posts._comment_form', ['id' => 'reply-form-'. $comment->id])
@endauth
