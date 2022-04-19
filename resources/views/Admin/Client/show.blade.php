@extends('admin.app')
@section('content')

<h1 class="text-center">View information in the Client table</h1><br>

<div class="card-body">
    <a href="{{route('admin.client.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Image</th>
            <td>
                <img src="{{asset($client->image)}}" alt="img" width="100px" height="60px">
            </td>
        </tr>
    </table>
</div>

@endsection