
@extends('layouts.app')

@section('content')
     @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12">
                 
                    <h2>
                        <a href="{{ route('post_path',['post'=>$post->id]) }}">{{$post->title}}</a>
                        <small class="float-right">
                            <a href="{{route('edit_post_path',['post'=>$post->id])}}" class="btn btn-info">Edit</a>
                        </small>
                    </h2>
                   
                 
                <p>Posted  {{$post->created_at->diffForHumans()}}  </b></p>
            </div>
        </div>
        <hr>
    @endforeach

    {{$posts->render() }} 
 


@endsection