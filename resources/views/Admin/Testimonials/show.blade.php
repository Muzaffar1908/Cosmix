@extends('admin.app')
@section('content')

<h1 class="text-center">View information in the Testimonials table</h1><br>

<div class="card-body">
    <a href="{{route('admin.testimonials.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Image</th>
            <td>
                <img src="{{asset($testimonials->image)}}" alt="img" width="100px" height="60px">
            </td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$testimonials->desc_en}}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{$testimonials->name}}</td>
        </tr>
        <tr>
            <th>Job</th>
            <td>{{$testimonials->job}}</td>
        </tr>
        <tr>
            <th>Icon</th>
            <td>
                <i class="{{$testimonials->icon}}" style="font-size: 2em"></i>
            </td>
        </tr>
        <tr>
            <th>Number</th>
            <td>{{$testimonials->text_uz}}</td>
        </tr>
        <tr>
            <th>Text Uz</th>
            <td>{{$testimonials->text_uz}}</td>
        </tr>
        <tr>
            <th>Text En</th>
            <td>{{$testimonials->text_en}}</td>
        </tr>
    </table>

</div>

@endsection