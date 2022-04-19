@extends('admin.app')
@section('content')

<div class="card">
    <div class="card-header">
      <h1>Contact</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th>№</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Subject</th>
                        <th>Enter your message</th>
                        <th>Action</th>
                    </tr>
                </tbody>
                @foreach($contacts as $contact)
                    <thead>
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->subject}}</td>
                            <td>{{$contact->message}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.contact.show', $contact->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <form action="{{route('admin.contact.destroy', $contact->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-success"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </thead>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection