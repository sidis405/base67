@extends('layouts.app')

@section('content')
    @include('posts._post', ['isSinglePost' => true])

    @auth
        @include('posts._comment_form', ['id' => 'post-comment-form-' . $post->id, 'mainForm' => true])
    @endauth

    @php $shownComments = []; @endphp

    @foreach($post->comments as $comment)
        @include("posts._comment", ['primary' => true, 'shownComments' => $shownComments])
    @endforeach
@stop
