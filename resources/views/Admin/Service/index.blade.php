@extends('admin.app')
@section('content')

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Service title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.service.index')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title_uz">Title UZ</label>
                        <input type="text" name="title_uz" class="form-control" value="{{old('title_uz')}}">
                    </div>

                    <div class="mb-3">
                        <label for="title_en">Title EN</label>
                        <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}">
                    </div>

                    <div class="mb-3">
                        <label for="icon">Icon</label>
                        <input type="text" name="icon" class="form-control" value="{{old('icon')}}">
                    </div>

                    <div class="mb-3">
                        <label for="text_uz">Text UZ</label>
                        <input type="text" name="text_uz" class="form-control" value="{{old('text_uz')}}">
                    </div>

                    <div class="mb-3">
                        <label for="text_en">Text EN</label>
                        <input type="text" name="text_en" class="form-control" value="{{old('text_en')}}">
                    </div>

                    <div class="mb-3">
                        <label for="desc_uz">Desc UZ</label>
                       <textarea name="desc_uz" id="desc_uz" cols="10" rows="5" class="form-control">{{old('desc_uz')}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="desc_en">Desc EN</label>
                       <textarea name="desc_en" id="desc_en" cols="10" rows="5" class="form-control">{{old('desc_en')}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="percent">Percent</label>
                        <input type="text" name="percent" class="form-control" value="{{old('percent')}}">
                    </div>

                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" value="{{old('image')}}">
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
            <h1>Service</h1>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="bi bi-plus"></i>Add</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Text</th>
                        <th>Description</th>
                        <th>Percent</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($services as $service)
                    <tbody>
                        <tr>
                            <td>{{ ($services->currentpage() - 1) * $services->perpage() + ($loop->index+1) }}</td>
                            <td>{{$service->title_en}}</td>
                            <td>
                               <i class="{{$service->icon}}" style="font-size:2em;"></i>
                            </td>
                            <td>{{$service->text_en}}</td>
                            <td>{{Str::limit($service->desc_en, 30)}}</td>
                            <td>{{$service->percent}}</td>
                            <td>
                                <img src="{{asset($service->image)}}" alt="img" width="100px" height="60px">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.service.show', $service->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.service.edit', $service->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.service.destroy', $service->id)}}" method="POST" enctype="multipart/form-data">
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
            {{$services->links()}}
        </div>
    </div>
</div>

@endsection