@extends('layouts.app')

@section('content')

    <h3>Latest posts ({{ $posts->total() }})</h3>

    {{ $posts->links() }}

    @foreach($posts as $post)
        @include('posts._post', ['isSinglePost' => false])
    @endforeach

    {{ $posts->links() }}

@stop
