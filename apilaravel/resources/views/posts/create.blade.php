@extends('layouts.app')

@section('content')
    
    <h2>Creating Post</h2>
    @include('posts._form', ['category'=>$category])
@endsection