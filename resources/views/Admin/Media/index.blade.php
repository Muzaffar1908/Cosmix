@extends('admin.app')
@section('content')

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Media title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.media.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="text" class="form-control" id="icon" name="icon" value="{{old('icon')}}">
                    </div>

                    <div class="mb-3">
                    <label for="url" class="form-label">Url</label>
                    <input type="url" class="form-control" id="url" name="url" value="{{old('url')}}">
                    </div>

                    <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status">
                    <label class="form-check-label" for="exampleCheck1">Active</label>
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
            <h1 class="text-center">Media</h1>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>Add</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-reponsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Icon</th>
                        <th>Url</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($medias as $media)
                    <tbody>
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                <i class="{{$media->icon}}" style="font-size: 2em"></i>
                            </td>
                            <td>{{$media->url}}</td>
                            <td>
                                <form action="{{route('admin.status')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="model" value="Media">
                                    <input type="hidden" name="id" value="{{$media->id}}">
                                    @if( $media->status == true )
                                        <button type="submit" class="btn btn-success btn-sm-3">Faol</button>
                                    @else
                                    <button type="submit" class="btn btn-danger btn-sm-3">Faol emas</button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.media.show', $media->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.media.edit', $media->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.media.destroy', $media->id)}}" method="POST">
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