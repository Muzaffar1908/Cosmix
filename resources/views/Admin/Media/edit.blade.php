@extends('admin.app')
@section('content')

<h1 class="text-center">Change information in the media table</h1><br>

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
    <a href="{{route('admin.media.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.media.update', $media->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="icon" class="form-label">Icon</label><br>
            <i class="{{$media->icon}}" style="font-size: 2em"></i>
            <input type="text" class="form-control" id="icon" name="icon" value="{{$media->icon}}">
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input type="url" class="form-control" id="url" name="url" value="{{$media->url}}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    </form>

</div>


@endsection