
@php
$post_category_id=0;
@endphp
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if( isset($post) )
@php
 $post_category_id=$post->category_id;   
@endphp

<h2>{{$post->title}}</h2>
    
    <form action="{{ route('update_post_path', ['post' => $post->id]) }}" method="POST">
    {{ method_field('PUT') }}
@else
    <form action="{{ route('store_post_path') }}" method="POST">
@endif
catid:{{$post_category_id }}
    {{ csrf_field() }}

    <!-- Title Field -->
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control" value="{{old('title', isset($post->title) ? $post->title : "" )}}"/>
    </div>
<!-- Category flied -->
<div class="form-group">
    <label for="title">Category:</label>
<select class="form-control" name="category_id">
   
  <option>Select Category</option>
    
  @foreach ($category as $cat)
    <option value="{{ $cat->id }}"  {{old('category_id', $cat->id==$post_category_id ? "selected" : "" )}}> 
        {{ $cat->name }} 
    </option>
  @endforeach    
</select>
</div>
    <!-- Description Input -->
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea rows="5" name="content" class="form-control"/>{{old('content', isset($post->content) ? $post->content : "" )}}</textarea>
    </div>

    <!-- Url Field -->
    <div class="form-group">
        <label for="url">Url:</label>
        <input type="text" name="url" class="form-control" value="{{old('url', isset($post->url) ? $post->url : "" )}}"/>
    </div>

    <div class="form-group">
        <button type="submit" class='btn btn-primary'>Save Post</button>
    </div>
</form>