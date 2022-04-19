@extends('admin.app')
@section('content')

<h1 class="text-center">View information in the Team table</h1><br>
<div class="card-body">
    <a href="{{route('admin.team.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Title Uz</th>
            <td>{{$team->title_uz}}</td>
        </tr>
        <tr>
            <th>Title En</th>
            <td>{{$team->title_en}}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <img src="{{asset($team->image)}}" alt="img" width="100px" height="60px">
            </td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{$team->name}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$team->desc_uz}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$team->desc_en}}</td>
        </tr>
        <tr>
            <th>Icon</th>
            <td>
                <i class="{{$team->icon}}" style="font-size: 2em"></i>
            </td>
        </tr>
        <tr>
            <th>Url</th>
            <td>{{$team->url}}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{$team->status}}</td>
        </tr>
    </table>
</div>
@endsection