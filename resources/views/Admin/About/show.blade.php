@extends('admin.app')
@section('content')

<h1 class="text-center">View information in the About table</h1><br>
<div class="card-body">
    <a href="{{route('admin.about.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Title Uz</th>
            <td>{{$about->title_uz}}</td>
        </tr>
        <tr>
            <th>Title En</th>
            <td>{{$about->title_en}}</td>
        </tr>
        <tr>
            <th>Text Uz</th>
            <td>{{$about->text_uz}}</td>
        </tr>
        <tr>
            <th>Text En</th>
            <td>{{$about->text_en}}</td>
        </tr>
        <tr>
            <th>Desc Uz</th>
            <td>{{$about->desc_uz}}</td>
        </tr>
        <tr>
            <th>Desc En</th>
            <td>{{$about->desc_en}}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <img src="{{asset($about->image)}}" alt="img" width="100px" height="60px">
            </td>
        </tr>
    </table>
</div>

@endsection