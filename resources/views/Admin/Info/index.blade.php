@extends('admin.app')
@section('content')

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Info title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.info.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title_uz" class="label-group">Title Uz</label>
                        <input type="text" name="title_uz" class="form-control" value="{{old('title_uz')}}">
                    </div>

                    <div class="mb-3">
                        <label for="title_en" class="label-group">Title En</label>
                        <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}">
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="label-group">Icon</label>
                        <input type="text" name="icon" class="form-control" value="{{old('icon')}}">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="label-group">Address</label>
                        <input type="text" name="address" class="form-control" value="{{old('address')}}">
                    </div>

                    <div class="mb-3">
                        <label for="mail us" class="label-group">Mail Us</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="label-group">Phone</label>
                        <input type="phone" name="phone" class="form-control" value="{{old('phone')}}">
                    </div>

                    <div class="mb-3">
                        <label for="website" class="label-group">Website</label>
                        <input type="url" name="website" class="form-control" value="{{old('website')}}">
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
            <h1>Info</h1>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>Add</button>
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
                        <th>Address</th>
                        <th>Mail Us</th>
                        <th>Phone</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($infos as $info)
                    <tbody>
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$info->title_en}}</td>
                            <td>
                                <i class="{{$info->icon}}" style="font-size: 2em"></i>
                            </td>
                            <td>{{$info->address}}</td>
                            <td>{{$info->email}}</td>
                            <td>{{$info->phone}}</td>
                            <td>{{$info->website}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.info.show', $info->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.info.edit', $info->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.info.destroy', $info->id)}}" method="POST">
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