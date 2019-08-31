@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>{{$post->title}}  
            <small class="float-right">
                <a href="{{route('edit_post_path',['post'=>$post->id])}}" class="btn btn-info">Edit</a>
            </small>
        </h2>
        <p>{{$post->content}}</p>
        <p>{{$post->url}}</p>
        <p>posted {{$post->created_at->diffForHumans()}}</p>
    </div>
</div>

@endsection