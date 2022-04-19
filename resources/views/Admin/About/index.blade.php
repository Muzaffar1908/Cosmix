@extends('admin.app')
@section('content')

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">About title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.about.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                <label for="title_uz" class="label-group">Title Uz</label>
                <input type="text" name="title_uz" class="form-control" value="{{old('title_uz')}}" >
                </div>

                <div class="mb-3">
                    <label for="title_en" class="label-group">Title En</label>
                    <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}" >
                </div>

                <div class="mb-3">
                    <label for="text_uz" class="label-group">Text Uz</label>
                    <input type="text" name="text_uz" class="form-control" value="{{old('text_uz')}}" >
                </div>

                <div class="mb-3">
                    <label for="text_en" class="label-group">Text En</label>
                    <input type="text" name="text_en" class="form-control" value="{{old('text_en')}}" >
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
                    <label for="image" class="label-group">Image</label>
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
           <h1>About</h1>
           {{-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="bi bi-plus"></i>Add</button> --}}
       </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Title</th>
                        <th>Text</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($abouts as $about)
                    <tbody>
                        <tr>
                            <td>#</td>
                            <td>{{$about->title_en}}</td>
                            <td>{{$about->text_en}}</td>
                            <td>{{Str::limit($about->desc_en, 50)}}</td>
                            <td>
                                <img src="{{asset($about->image)}}" alt="img" width="100px" height="60px">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.about.show', $about->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.about.edit', $about->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
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