@extends('admin.app')
@section('content')
    <h1 class="text-center">View data in a slider table</h1><br>
    <div class="card-body">
        <a href="{{route('admin.slider.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <table class="table">
            <tr>
                <th>Image</th>
                <td>
                    <img src="{{asset($slider->image)}}" alt="img" width="100px" height="60px">
                </td>
            </tr>
            <tr>
                <th>Title_uz</th>
                <td>{{$slider->title_uz}}</td>
            </tr>
            <tr>
                <th>Title_en</th>
                <td>{{$slider->title_en}}</td>
            </tr>
            <tr>
                <th>Text_uz</th>
                <td>{{$slider->text_uz}}</td>
            </tr>
            <tr>
                <th>Text_en</th>
                <td>{{$slider->text_en}}</td>
            </tr>
            <tr>
                <th>Desc_uz</th>
                <td>{{$slider->desc_uz}}</td>
            </tr>
            <tr>
                <th>Desc_en</th>
                <td>{{$slider->desc_en}}</td>
            </tr>
        </table>
    </div>
@endsection