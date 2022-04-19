@extends('admin.app')
@section('content')

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Testimonials title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.testimonials.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="img" class="label-group">Image</label>
                        <input type="file" name="image" class="form-control" value="{{old('image')}}">
                    </div>   
                    
                    <div class="mb-3">
                        <label for="desc_uz" class="label-group">Desc Uz</label>
                        <textarea name="desc_uz" id="desc_uz" cols="10" rows="5" class="form-control">{{old('desc_uz')}}</textarea>
                    </div>  
                    
                    <div class="mb-3">
                        <label for="desc_en" class="label-group">Desc En</label>
                        <textarea name="desc_en" id="desc_en" cols="10" rows="5" class="form-control">{{old('desc_en')}}</textarea>
                    </div> 

                    <div class="mb-3">
                        <label for="name" class="label-group">Name</label>
                        <input type="name" name="name" class="form-control" value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label for="job" class="label-group">Job</label>
                        <input type="job" name="job" class="form-control" value="{{old('job')}}">
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="label-group">Icon</label>
                        <input type="text" name="icon" class="form-control" value="{{old('icon')}}">
                    </div>

                    <div class="mb-3">
                        <label for="number" class="label-group">Number</label>
                        <input type="number" name="number" class="form-control" value="{{old('number')}}">
                    </div>

                    <div class="mb-3">
                        <label for="text_uz" class="label-group">Text Uz</label>
                        <input type="text" name="text_uz" class="form-control" value="{{old('text_uz')}}">
                    </div>

                    <div class="mb-3">
                        <label for="text_en" class="label-group">Text En</label>
                        <input type="text" name="text_en" class="form-control" value="{{old('text_en')}}">
                    </div>
                    
                    <div class="modal-footer d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Testimonials</h1>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>Add</button>
        </div>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>Icon</th>
                    <th>Number</th>
                    <th>Text</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($testimonials as $testimonial)
                <tbody>
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <img src="{{asset($testimonial->image)}}" alt="img" width="100px" height="60px">
                        </td>
                        <td>{{Str::limit($testimonial->desc_en, 30)}}</td>
                        <td>{{$testimonial->name}}</td>
                        <td>{{$testimonial->job}}</td>
                        <td>
                            <i class="{{$testimonial->icon}}" style="font-size: 2em"></i>
                        </td>
                        <td>{{$testimonial->number}}</td>
                        <td>{{$testimonial->text_en}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('admin.testimonials.show', $testimonial->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                <a href="{{route('admin.testimonials.edit', $testimonial->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                <form action="{{route('admin.testimonials.destroy', $testimonial->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
    </div>
</div>

@endsection