@extends('admin.app')
@section('content')

<h1 class="text-center">Change information in the About table</h1><br>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
<div class="card-body">
    <a href="{{route('admin.about.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.about.update', $about->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="title_uz" class="label-group">Title Uz</label>
        <input type="text" name="title_uz" class="form-control" value="{{$about->title_uz}}" >
        </div>

        <div class="mb-3">
            <label for="title_en" class="label-group">Title En</label>
            <input type="text" name="title_en" class="form-control" value="{{$about->title_en}}" >
        </div>

        <div class="mb-3">
            <label for="text_uz" class="label-group">Text Uz</label>
            <input type="text" name="text_uz" class="form-control" value="{{$about->text_uz}}" >
        </div>

        <div class="mb-3">
            <label for="text_en" class="label-group">Text En</label>
            <input type="text" name="text_en" class="form-control" value="{{$about->text_en}}" >
        </div>

        <div class="mb-3">
            <label for="desc_uz" class="label-group">Desc Uz</label>
            <textarea name="desc_uz" id="desc_uz" cols="10" rows="5" class="form-control">{{$about->desc_uz}}</textarea>
        </div>

        <div class="mb-3">
            <label for="desc_en" class="label-group">Desc En</label>
            <textarea name="desc_en" id="desc_en" cols="10" rows="5" class="form-control">{{$about->desc_en}}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="label-group">Image</label><br>
            <img src="{{asset($about->image)}}" alt="img" width="100px" height="60px">
            <input type="file" name="image" class="form-control" value="{{$about->image}}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    </form>
</div>

@endsection