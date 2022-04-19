@extends('admin.app')
@section('content')

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Slider title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="img" class="label-group">Image</label>
                        <input type="file" name="image" class="form-control" value="{{old('image')}}">
                    </div>

                    <div class="mb-3">
                        <label for="title_uz" class="label-group">Title_uz</label>
                        <input type="text" name="title_uz" class="form-control" value="{{old('title_uz')}}">
                    </div>

                    <div class="mb-3">
                        <label for="title_en" class="label-group">Title_en</label>
                        <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}">
                    </div>

                    <div class="mb-3">
                        <label for="text_uz" class="label-group">Text_uz</label>
                        <input type="text" name="text_uz" class="form-control" value="{{old('text_uz')}}">
                    </div>

                    <div class="mb-3">
                        <label for="text_en" class="label-group">Text_en</label>
                        <input type="text" name="text_en" class="form-control" value="{{old('text_en')}}">
                    </div>

                    <div class="mb-3">
                        <label for="desc_uz" class="label-group">Desc_uz</label>
                        <textarea name="desc_uz" id="summernote1" cols="10" rows="5">{{old('desc_uz')}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="desc_en" class="label-group">Desc_en</label>
                        <textarea name="desc_en" id="summernote2" cols="10" rows="5">{{old('desc_en')}}</textarea>
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




<div class="card">
    <div class="card-header">
       <div class="d-flex justify-content-between align-items-center">
           <h1>Slider</h1>
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
                        <th>Title</th>
                        <th>Text</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($sliders as $slider)
                    <tbody>
                        <tr>
                            <td>{{ ($sliders->currentpage() - 1) * $sliders->perpage() + ($loop->index+1) }}</td>
                            <td>
                                <img src="{{asset($slider->image)}}" alt="img" width="100px" height="60px">
                            </td>
                            <td>{{$slider->title_en}}</td>
                            <td>{{$slider->text_en}}</td>
                            <td>{{Str::limit($slider->desc_en, 50)}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.slider.show', $slider->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.slider.edit', $slider->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.slider.destroy',  $slider->id)}}" method="POST" enctype="multipart/form-data">
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
            {{$sliders->links()}}
        </div>
    </div>
</div>

@endsection