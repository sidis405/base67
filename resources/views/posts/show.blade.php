@extends('layouts.app')

@section('content')
    @include('posts._post', ['isSinglePost' => true])
@stop
