@extends('layouts.app')

@section('content')

<div>

    <div class="page-header">
      <h1>Edit post</h1>
    </div>

    <div>
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title', $post->title) }}">
                @include('layouts.field_error', ['field' => 'title'])
            </div>


            <div class="form-group">
                <label for="cover">Choose a cover for this post</label>
                <input type="file" name="cover" class="form-control{{ $errors->has('cover') ? ' is-invalid' : '' }}">
                @include('layouts.field_error', ['field' => 'cover'])
            </div>

            <div class="form-group">
                <label for="preview">Preview</label>
                <textarea class="form-control{{ $errors->has('preview') ? ' is-invalid' : '' }}" name="preview">{{ old('preview', $post->preview) }}</textarea>
                @include('layouts.field_error', ['field' => 'preview'])
            </div>
            <div class="form-group">
                <label for="body">Article Content</label>
                <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" rows="10">{{ old('body', $post->body) }}</textarea>
                @include('layouts.field_error', ['field' => 'body'])
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                    <option></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($category->id == old('category_id', $post->category_id))
                                    selected=""
                                @endif
                            >{{ $category->name }}</option>
                    @endforeach
                </select>
                @include('layouts.field_error', ['field' => 'category_id'])
            </div>
            <div class="form-group">
                <label for="tags[]">Tags</label>
                <select name="tags[]" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" multiple="">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                            @if(in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())))
                                selected=""
                            @endif
                            >{{ $tag->name }}</option>
                    @endforeach
                </select>
                @include('layouts.field_error', ['field' => 'tags'])
            </div>

            <button type="submit" class="btn btn-success">Publish article</button>
        </form>
    </div>

</div>

@stop
