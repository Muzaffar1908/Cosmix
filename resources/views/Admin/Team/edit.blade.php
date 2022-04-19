@extends('admin.app')
@section('content')

<h1 class="text-center">Change information in the Team table</h1><br>
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
    <a href="{{route('admin.team.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.team.update', $team->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title_uz" class="label-group">Title Uz</label>
            <input type="text" name="title_uz" id="title_uz" class="form-control" value="{{$team->title_uz}}">
        </div>

        <div class="mb-3">
            <label for="title_en" class="label-group">Title En</label>
            <input type="text" name="title_en" id="title_en" class="form-control" value="{{$team->title_en}}">
        </div>

        <div class="mb-3">
            <label for="img" class="label-group">Image</label><br>
            <img src="{{asset($team->image)}}" alt="img" width="100px" height="60px"> 
            <input type="file" name="image" id="img" class="form-control" value="{{$team->image}}">
        </div>

        <div class="mb-3">
            <label for="name" class="label-group">Name</label>
            <input type="name" name="name" id="name" class="form-control" value="{{$team->name}}">
        </div>

        <div class="mb-3">
            <label for="desc_uz" class="label-group">Desc Uz</label>
            <textarea name="desc_uz" id="desc_uz" cols="10" rows="5" class="form-control">{{$team->desc_uz}}</textarea>
        </div>

        <div class="mb-3">
            <label for="desc_en" class="label-group">Desc En</label>
            <textarea name="desc_en" id="desc_en" cols="10" rows="5" class="form-control">{{$team->desc_en}}</textarea>
        </div>

        <div class="mb-3">
            <label for="icon" class="label-group">Icon</label><br>
            <i class="{{$team->icon}}" style="font-size:2em"></i>
            <input type="icon" name="icon" id="icon" class="form-control" value="{{$team->icon}}">
        </div>

        <div class="mb-3">
            <label for="url" class="label-group">Url</label>
            <input type="url" name="url" id="url" class="form-control" value="{{$team->url}}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    </form>
</div>


@endsection