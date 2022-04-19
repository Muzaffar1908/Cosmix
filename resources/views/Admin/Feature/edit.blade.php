@extends('admin.app')
@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
<h1 class="text-center">Change data in the Feature table</h1><br>
<div class="card-body">
    <a href="{{route('admin.feature.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.feature.update', $feature->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title_uz">Title Uz</label>
            <input type="text" name="title_uz" class="form-control" value="{{$feature->title_uz}}">   
        </div>

        <div class="mb-3">
            <label for="title_en">Title En</label>
            <input type="text" name="title_en" class="form-control" value="{{$feature->title_en}}">   
        </div>

        <div class="mb-3">
            <label for="icon">Icon</label><br>
            <input type="text" name="icon" class="form-control" value="{{$feature->icon}}">   
        </div>

        <div class="mb-3">
            <label for="desc_uz">Desc Uz</label>
            <textarea name="desc_uz" class="form-control" id="desc_uz" cols="10" rows="5">{{$feature->desc_uz}}</textarea>   
        </div>

        <div class="mb-3">
            <label for="desc_en">Desc En</label>
            <textarea name="desc_en" class="form-control" id="desc_en" cols="10" rows="5">{{$feature->desc_en}}</textarea>   
        </div>

        <div class="mb-3">
            <label for="img">Image</label><br>
              <img src="{{asset($feature->image)}}" alt="img" width="100px" height="60px">
            <input type="file" name="image" class="form-control" value="{{$feature->image}}">   
        </div>

       <button type="submit" class="btn btn-success">Save</button>

    </form>   
</div>

@endsection