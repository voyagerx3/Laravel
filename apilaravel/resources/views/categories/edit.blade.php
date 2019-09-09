@extends('layouts.app')

@section('content')
    <h2>Editing Category</h2>
    @include('categories._form', ['category'=>$category])
@endsection