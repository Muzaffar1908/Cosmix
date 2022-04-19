@extends('admin.app')
@section('content')

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Client title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.client.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="label-group">Image</label>
                        <input type="file" name="image" class="form-control" value="{{old('image')}}">
                    </div>

                    <div class="modal-footer d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
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
            <h1>Client</h1>
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
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($clients as $client)
                    <tbody>
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                <img src="{{asset($client->image)}}" alt="img" width="100px" height="60px">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.client.show', $client->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.client.edit', $client->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.client.destroy', $client->id)}}" method="POST" enctype="multipart/form-data">
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