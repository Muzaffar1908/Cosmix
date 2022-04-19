@extends('admin.app')
@section('content')

<h1 class="text-center">View information in the blog table</h1><br>

<div class="card-body">
    <a href="{{route('admin.blog.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Title Uz</th>
            <td>{{$blog->title_uz}}</td>
        </tr>
        <tr>
            <th>Title En</th>
            <td>{{$blog->title_en}}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{$blog->created_at}}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <img src="{{asset($blog->image)}}" alt="img" width="100px" height="60px">
            </td>
        </tr>
        <tr>
            <th>Text Uz</th>
            <td>{{$blog->text_uz}}</td>
        </tr>
        <tr>
            <th>Text En</th>
            <td>{{$blog->text_en}}</td>
        </tr>
        <tr>
            <th>Icon</th>
            <td>
                <i class="{{$blog->icon}}" style="font-size:2em"></i>
            </td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{$blog->name}}</td>
        </tr>
        <tr>
            <th>Number</th>
            <td>{{$blog->number}}</td>
        </tr>
        <tr>
            <th>Desc Uz</th>
            <td>{{$blog->desc_uz}}</td>
        </tr>
        <tr>
            <th>Desc En</th>
            <td>{{$blog->desc_en}}</td>
        </tr>
    </table>
</div>

@endsection