@extends('admin.app')
@section('content')

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Team title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.team.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title_uz" class="label-group">Title Uz</label>
                        <input type="text" name="title_uz" id="title_uz" class="form-control" value="{{old('title_uz')}}">
                    </div>

                    <div class="mb-3">
                        <label for="title_en" class="label-group">Title En</label>
                        <input type="text" name="title_en" id="title_en" class="form-control" value="{{old('title_uz')}}">
                    </div>

                    <div class="mb-3">
                        <label for="img" class="label-group">Image</label>
                        <input type="file" name="image" id="img" class="form-control" value="{{old('image')}}">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="label-group">Name</label>
                        <input type="name" name="name" id="name" class="form-control" value="{{old('name')}}">
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
                        <label for="icon" class="label-group">Icon</label>
                        <input type="icon" name="icon" id="icon" class="form-control" value="{{old('icon')}}">
                    </div>

                    <div class="mb-3">
                        <label for="url" class="label-group">Url</label>
                        <input type="url" name="url" id="url" class="form-control" value="{{old('url')}}">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="status">
                        <label class="form-check-label" for="status">Active</label>
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
            <h1>Team</h1>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="bi bi-plus"></i>Add</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-reponsive">
            <table class="table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Icon</th>
                    <th>Url</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>    
                </thead>
                @foreach($teams as $team)
                    <tbody>
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$team->title_en}}</td>
                            <td>
                                <img src="{{asset($team->image)}}" alt="img" width="100px" height="60px">
                            </td>
                            <td>{{$team->name}}</td>
                            <td>{{$team->desc_en}}</td>
                            <td>
                                <i class="{{$team->icon}}" style="font-size: 2em"></i>
                            </td>
                            <td>{{$team->url}}</td>
                            <td>
                                <form action="{{route('admin.activation')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="type" value="team">
                                    <input type="hidden" name="id" value="{{$team->id}}">
                                    @if ($team->status == true)
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Active
                                        </button>
                                    @else
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Inactive
                                    </button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.team.show', $team->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.team.edit', $team->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.team.destroy', $team->id)}}" method="POST" enctype="multipart/form-data">
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