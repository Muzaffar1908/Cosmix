@extends('admin.app')
@section('content')

<h1 class="text-center">View data in the pricing table</h1><br>
<div class="card-body">
    <a href="{{route('admin.pricing.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Title Uz</th>
            <td>{{$pricing->title_uz}}</td>
        </tr>
        <tr>
            <th>Title En</th>
            <td>{{$pricing->title_en}}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{$pricing->price}}</td>
        </tr>
        <tr>
            <th>Text Uz</th>
            <td>{{$pricing->text_uz}}</td>
        </tr>
        <tr>
            <th>Text En</th>
            <td>{{$pricing->text_en}}</td>
        </tr>
        <tr>
            <th>Desc Uz</th>
            <td>{{$pricing->desc_uz}}</td>
        </tr>
        <tr>
            <th>Desc En</th>
            <td>{{$pricing->desc_en}}</td>
        </tr>
    </table>
</div>

@endsection