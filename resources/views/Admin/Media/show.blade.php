@extends('admin.app')
@section('content')

<h1 class="text-center">View information in the media table</h1><br>

<div class="card-body">
    <a href="{{route('admin.media.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Icon</th>
            <td>
                <i class="{{$media->icon}}" style="font-size: 2em"></i>
            </td>
        </tr>
        <tr>
            <th>Url</th>
            <td>{{$media->url}}</td>
        </tr>
    </table>
</div>

@endsection