@extends('admin.app')
@section('content')

<h1 class="text-center">View information in the Service table</h1><br>
<div class="card-body">
    <a href="{{route('admin.service.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Title UZ</th>
            <td>{{$service->title_uz}}</td>
        </tr>
        <tr>
            <th>Title EN</th>
            <td>{{$service->title_en}}</td>
        </tr>
        <tr>
            <th>Icon</th>
            <td>{{$service->icon}}</td>
        </tr>
        <tr>
            <th>Text UZ</th>
            <td>{{$service->text_uz}}</td>
        </tr>
        <tr>
            <th>Text EN</th>
            <td>{{$service->text_en}}</td>
        </tr>
        <tr>
            <th>Desc UZ</th>
            <td>{{$service->desc_uz}}</td>
        </tr>
        <tr>
            <th>Desc EN</th>
            <td>{{$service->desc_en}}</td>
        </tr>
        <tr>
            <th>Percent</th>
            <td>{{$service->percent}}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <img src="{{asset($service->image)}}" alt="img" width="100px" height="60px">
            </td>
        </tr>
    </table>
</div>

@endsection