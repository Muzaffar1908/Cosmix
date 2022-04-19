@extends('admin.app')
@section('content')

<h1 class="text-center">View information in the info table</h1><br>

<div class="card-body">
    <a href="{{route('admin.info.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Title Uz</th>
            <td>{{$info->title_uz}}</td>
        </tr>
        <tr>
            <th>Title En</th>
            <td>{{$info->title_en}}</td>
        </tr>
        <tr>
            <th>Icon</th>
            <td>
                <i class="{{$info->icon}}" style="font-size: 2em"></i>
            </td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$info->address}}</td>
        </tr>
        <tr>
            <th>Mail Us</th>
            <td>{{$info->email}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{$info->phone}}</td>
        </tr>
        <tr>
            <th>Website</th>
            <td>{{$info->website}}</td>
        </tr>
    </table>
</div>

@endsection