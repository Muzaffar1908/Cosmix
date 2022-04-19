@extends('admin.app')
@section('content')

<h1 class="text-center">Change information in the Service table</h1><br>

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
    <a href="{{route('admin.service.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.service.update', $service->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title_uz">Title UZ</label>
            <input type="text" name="title_uz" class="form-control" value="{{$service->title_uz}}">
        </div>

        <div class="mb-3">
            <label for="title_en">Title EN</label>
            <input type="text" name="title_en" class="form-control" value="{{$service->title_en}}">
        </div>

        <div class="mb-3">
            <label for="icon">Icon</label>
            <input type="text" name="icon" class="form-control" value="{{$service->icon}}">
        </div>

        <div class="mb-3">
            <label for="text_uz">Text UZ</label>
            <input type="text" name="text_uz" class="form-control" value="{{$service->text_uz}}">
        </div>

        <div class="mb-3">
            <label for="text_en">Text EN</label>
            <input type="text" name="text_en" class="form-control" value="{{$service->text_en}}">
        </div>

        <div class="mb-3">
            <label for="desc_uz">Desc UZ</label>
           <textarea name="desc_uz" id="desc_uz" cols="10" rows="5" class="form-control">{{$service->desc_uz}}</textarea>
        </div>

        <div class="mb-3">
            <label for="desc_en">Desc EN</label>
           <textarea name="desc_en" id="desc_en" cols="10" rows="5" class="form-control">{{$service->desc_en}}</textarea>
        </div>

        <div class="mb-3">
            <label for="percent">Percent</label>
            <input type="text" name="percent" class="form-control" value="{{$service->percent}}">
        </div>

        <div class="mb-3">
            <label for="image">Image</label><br>
            <img src="{{asset($service->image)}}" alt="img" width="100px" height="60px">
            <input type="file" name="image" class="form-control" value="{{$service->image}}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    </form>
  

</div>

@endsection