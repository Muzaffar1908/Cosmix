@extends('admin.app')
@section('content')

<h1 class="text-center">View data in the Feature table</h1><br>
<div class="card-body">
    <a href="{{route('admin.feature.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Title Uz</th>
            <td>{{$feature->title_uz}}</td>
        </tr>
        <tr>
            <th>Title En</th>
            <td>{{$feature->title_en}}</td>
        </tr>
        <tr>
            <th>Icon</th>
            <td>{{$feature->icon}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$feature->desc_en}}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <img src="{{asset($feature->image)}}" alt="img" width="100px" height="60px">
            </td>
        </tr>
    </table>
</div>

@endsection