@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>{{$post->title}}  
            <small class="float-right d-flex flex-row">
                <a href="{{route('edit_post_path',['post'=>$post->id])}}" class="btn btn-info">Edit</a>
                 <form action="{{ route('delete_post_path', ['post' => $post->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class='btn btn-danger'>Delete</button>
                            </form>
            </small>
        </h2>  
        <p>{{$post->category->name}}</p>   
        <p>{{$post->content}}</p>
        <p>{{$post->url}}</p>
        <p>posted {{$post->created_at->diffForHumans()}}</p>
    </div>
</div>

@endsection