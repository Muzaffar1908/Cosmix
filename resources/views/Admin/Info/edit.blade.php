@extends('admin.app')
@section('content')

<h1 class="text-center">Change information in the info table</h1><br>

<div class="card-body">
    <a href="{{route('admin.info.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.info.update', $info->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title_uz" class="label-group">Title Uz</label>
            <input type="text" name="title_uz" class="form-control" value="{{$info->title_uz}}">
        </div>

        <div class="mb-3">
            <label for="title_en" class="label-group">Title En</label>
            <input type="text" name="title_en" class="form-control" value="{{$info->title_en}}">
        </div>

        <div class="mb-3">
            <label for="icon" class="label-group">Icon</label>
            <input type="text" name="icon" class="form-control" value="{{$info->icon}}">
        </div>

        <div class="mb-3">
            <label for="address" class="label-group">Address</label>
            <input type="text" name="address" class="form-control" value="{{$info->address}}">
        </div>

        <div class="mb-3">
            <label for="mail us" class="label-group">Mail Us</label>
            <input type="email" name="email" class="form-control" value="{{$info->email}}">
        </div>

        <div class="mb-3">
            <label for="phone" class="label-group">Phone</label>
            <input type="phone" name="phone" class="form-control" value="{{$info->phone}}">
        </div>

        <div class="mb-3">
            <label for="website" class="label-group">Website</label>
            <input type="url" name="website" class="form-control" value="{{$info->website}}">
        </div>
        
        <button type="submit" class="btn btn-success">Save</button>

    </form>

</div>

@endsection