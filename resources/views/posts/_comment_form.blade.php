<div class="card reply-form @if(isset($mainForm)) main @endif" id="{{ $id }}">
    <div class="card-header">
        Leave a comment
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('post-comments.store', $post) }}">
            @csrf
            @if(isset($comment))
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            @endif
            <div class="form-group">
                <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" rows="5" placeholder="Write your two cents..." name="body"></textarea>
                @include('layouts.field_error', ['field' => 'body'])
            </div>
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
    </div>
</div>
