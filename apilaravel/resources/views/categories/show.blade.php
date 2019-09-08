@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>{{$category->name}} 
            @if($category->wasCreatedBy( Auth::user() )) 
            <small class="float-right d-flex flex-row">
                <a href="{{route('edit_category_path',['category'=>$category->id])}}" class="btn btn-info">Edit</a>
                 <form action="{{ route('delete_category_path', ['category' => $category->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class='btn btn-danger'>Delete</button>
                            </form>
            </small>
            @endif
        </h2>  
  
        <p>{{$category->description}}</p>
        
        <p>posted {{$category->created_at->diffForHumans()}}</p>
    </div>
</div>

@endsection