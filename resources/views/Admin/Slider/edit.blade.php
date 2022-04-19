@extends('admin.app')
@section('content')
<h1 class="text-center">Change data in a slider table</h1><br>
<div class="card-body">
<a href="{{route('admin.slider.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="img" class="label-group">Image</label><br>
            <img src="{{asset($slider->image)}}" alt="img" width="100px" height="60px">
            <input type="file" name="image" class="form-control" value="{{$slider->image}}">
        </div>

        <div class="mb-3">
            <label for="title_uz" class="label-group">Title_uz</label>
            <input type="text" name="title_uz" class="form-control" value="{{$slider->title_uz}}">
        </div>

        <div class="mb-3">
            <label for="title_en" class="label-group">Title_en</label>
            <input type="text" name="title_en" class="form-control" value="{{$slider->title_en}}">
        </div>

        <div class="mb-3">
            <label for="text_uz" class="label-group">Text_uz</label>
            <input type="text" name="text_uz" class="form-control" value="{{$slider->text_uz}}">
        </div>

        <div class="mb-3">
            <label for="text_en" class="label-group">Text_en</label>
            <input type="text" name="text_en" class="form-control" value="{{$slider->text_en}}">
        </div>

        <div class="mb-3">
            <label for="desc_uz" class="label-group">Desc_uz</label>
            <textarea name="desc_uz" id="summernote1" cols="10" rows="5">{{$slider->desc_uz}}</textarea>
        </div>

        <div class="mb-3">
            <label for="desc_en" class="label-group">Desc_en</label>
            <textarea name="desc_en" id="summernote2" cols="10" rows="5">{{$slider->desc_en}}</textarea>
        </div>
        
       <button type="submit" class="btn btn-success">Save</button>

    </form>

</div>
@endsection