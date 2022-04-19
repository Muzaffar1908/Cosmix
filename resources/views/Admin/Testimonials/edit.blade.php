@extends('admin.app')
@section('content')

<h1 class="text-center">Change information in the Testimonials table</h1><br>

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
    <a href="{{route('admin.testimonials.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.testimonials.update', $testimonials->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="img" class="label-group">Image</label><br>
            <img src="{{asset($testimonials->image)}}" alt="img" width="100px" height="60px">
            <input type="file" name="image" class="form-control" value="{{$testimonials->image}}">
        </div>   
        
        <div class="mb-3">
            <label for="desc_uz" class="label-group">Desc Uz</label>
            <textarea name="desc_uz" id="desc_uz" cols="10" rows="5" class="form-control">{{$testimonials->desc_uz}}</textarea>
        </div>  
        
        <div class="mb-3">
            <label for="desc_en" class="label-group">Desc En</label>
            <textarea name="desc_en" id="desc_en" cols="10" rows="5" class="form-control">{{$testimonials->desc_en}}</textarea>
        </div> 

        <div class="mb-3">
            <label for="name" class="label-group">Name</label>
            <input type="name" name="name" class="form-control" value="{{$testimonials->name}}">
        </div>

        <div class="mb-3">
            <label for="job" class="label-group">Job</label>
            <input type="job" name="job" class="form-control" value="{{$testimonials->job}}">
        </div>

        <div class="mb-3">
            <label for="icon" class="label-group">Icon</label><br>
            <i class="{{$testimonials->icon}}" style="font-size: 2em"></i>
            <input type="text" name="icon" class="form-control" value="{{$testimonials->icon}}">
        </div>

        <div class="mb-3">
            <label for="number" class="label-group">Number</label>
            <input type="number" name="number" class="form-control" value="{{$testimonials->number}}">
        </div>

        <div class="mb-3">
            <label for="text_uz" class="label-group">Text Uz</label>
            <input type="text" name="text_uz" class="form-control" value="{{$testimonials->text_uz}}">
        </div>

        <div class="mb-3">
            <label for="text_en" class="label-group">Text En</label>
            <input type="text" name="text_en" class="form-control" value="{{$testimonials->text_en}}">
        </div>
        
     <button type="submit" class="btn btn-success">Save</button>

    </form>

</div>
    
@endsection