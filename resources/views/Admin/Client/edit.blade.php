@extends('admin.app')
@section('content')

<h1 class="text-center">Change information in the Client table</h1><br>

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
    <a href="{{route('admin.client.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>

    <form action="{{route('admin.client.update', $client->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="label-group">Image</label><br>
            <img src="{{asset($client->image)}}" alt="img" width="100px" height="60px">
            <input type="file" name="image" class="form-control" value="{{$client->image}}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    </form>

</div>


@endsection