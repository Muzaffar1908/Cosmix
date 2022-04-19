@extends('admin.app')
@section('content')

<h1 class="text-center">Change information in the portfolio table</h1><br>
<div class="card-body">
    <form action="{{route('admin.portfolio.update', $portfolio->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="label-group">Title Uz</label>
            <input type="text" name="title_uz" class="form-control" value="{{$portfolio->title_uz}}">   
        </div>

        <div class="mb-3">
            <label for="title" class="label-group">Title En</label>
            <input type="text" name="title_en" class="form-control" value="{{$portfolio->title_en}}">   
        </div>

        <div class="mb-3">
            <label for="img" class="label-group">Image</label><br>
            <img src="{{asset($portfolio->image)}}" alt="img" width="100px" height="60px">
            <input type="file" name="image" class="form-control" value="{{$portfolio->image}}">   
        </div>

        <div class="mb-3">
            <label for="text" class="label-group">Text Uz</label>
            <input type="text" name="text_uz" class="form-control" value="{{$portfolio->text_uz}}">   
        </div>

        <div class="mb-3">
            <label for="text" class="label-group">Text En</label>
            <input type="text" name="text_en" class="form-control" value="{{$portfolio->text_en}}">   
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    </form>
</div>
    
@endsection