@extends('admin.app')
@section('content')

<h1 class="text-center">Change information in the blog table</h1><br>

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
    <a href="{{route('admin.blog.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title_uz" class="label-group">Title Uz</label>
            <input type="text" name="title_uz" class="form-control" value="{{$blog->title_uz}}"> 
        </div>
        
        <div class="mb-3">
            <label for="title_en" class="label-group">Title En</label>
            <input type="text" name="title_en" class="form-control" value="{{$blog->title_en}}"> 
        </div>
        
        <div class="mb-3">
            <label for="image" class="label-group">Image</label><br>
            <img src="{{asset($blog->image)}}" alt="img" width="100px" height="60px">
            <input type="file" name="image" class="form-control" value="{{$blog->image}}"> 
        </div>  

        <div class="mb-3">
            <label for="client" class="label-group">Client</label><br>
            <img src="{{asset($blog->client)}}" alt="img" width="100px" height="60px">
            <input type="file" name="client" class="form-control" value="{{$blog->client}}"> 
        </div>  

        <div class="mb-3">
            <label for="text_uz" class="label-group">Text Uz</label>
            <input type="text" name="text_uz" class="form-control" value="{{$blog->text_uz}}"> 
        </div>  

        <div class="mb-3">
            <label for="text_en" class="label-group">Text En</label>
            <input type="text" name="text_en" class="form-control" value="{{$blog->text_en}}"> 
        </div>

        <div class="mb-3">
            <label for="icon" class="label-group">Icon</label>
            <input type="text" name="icon" class="form-control" value="{{$blog->icon}}"> 
        </div>

        <div class="mb-3">
            <label for="name" class="label-group">Name</label>
            <input type="name" name="name" class="form-control" value="{{$blog->name}}"> 
        </div>

        <div class="mb-3">
            <label for="number" class="label-group">Number</label>
            <input type="number" name="number" class="form-control" value="{{$blog->number}}"> 
        </div>

        <div class="mb-3">
            <label for="desc_uz" class="label-group">Desc Uz</label>
            <textarea name="desc_uz" id="desc_uz" class="form-control" cols="10" rows="5">{{$blog->desc_uz}}</textarea> 
        </div>

        <div class="mb-3">
            <label for="desc_en" class="label-group">Desc En</label>
            <textarea name="desc_en" id="desc_en" class="form-control" cols="10" rows="5">{{$blog->desc_en}}</textarea> 
        </div>
        
        <button type="submit" class="btn btn-success">Save</button>

    </form>
</div>

@endsection