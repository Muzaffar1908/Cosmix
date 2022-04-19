@extends('admin.app')
@section('content')

<h1 class="text-center">View information in the portfolio table</h1><br>
<div class="card-body">
    <a href="{{route('admin.portfolio.index')}}" class="btn btn-primary"><i class="bi bi-arrow-short-left"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Title_uz</th>
            <td>{{$portfolio->title_uz}}</td>
        </tr>
        <tr>
            <th>Title_en</th>
            <td>{{$portfolio->title_en}}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <img src="{{asset($portfolio->image)}}" alt="img" width="100px" height="60px">
            </td>
        </tr>
        <tr>
            <th>Text_uz</th>
            <td>{{$portfolio->text_uz}}</td>
        </tr>
        <tr>
            <th>Text_en</th>
            <td>{{$portfolio->text_en}}</td>
        </tr>
    </table>
</div>

@endsection