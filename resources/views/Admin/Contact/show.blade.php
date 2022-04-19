@extends('admin.app')
@section('content')

<h1 class="text-center">View data in the Contact table</h1><br>
<div class="card-body">
    <a href="{{route('admin.contact.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Name</th>
            <td>{{$contact->name}}</td>
        </tr>
        <tr>
            <th>Email Address</th>
            <td>{{$contact->email}}</td>
        </tr>
        <tr>
            <th>Subject</th>
            <td>{{$contact->subject}}</td>
        </tr>
        <tr>
            <th>Message</th>
            <td>{{$contact->message}}</td>
        </tr>
    </table>
</div>

@endsection