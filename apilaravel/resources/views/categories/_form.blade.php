
@include('layouts._errors')
@if( isset($category) )
<h2>{{$category->name}}</h2>
    
    <form action="{{ route('update_category_path', ['category' => $category->id]) }}" method="POST">
    {{ method_field('PUT') }}
@else
    <form action="{{ route('store_category_path') }}" method="POST">
@endif

    {{ csrf_field() }}

    <!-- Title Field -->
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="name" class="form-control" value="{{old('name', isset($category->name) ? $category->name : "" )}}"/>
    </div>

    <!-- Description Input -->
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea rows="5" name="description" class="form-control"/>{{old('description', isset($category->description) ? $category->description : "" )}}</textarea>
    </div>



    <div class="form-group">
        <button type="submit" class='btn btn-primary'>Save category</button>
    </div>
</form>