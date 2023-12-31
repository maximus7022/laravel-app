@extends('db_layout')
@section('content')
<style>
    body {
        background-color: #283149;
    }
    h1 {
        margin-top: 3rem;
        font-size: 2.2rem;
        font-weight: 900;
        color: white;
    }
    .push-top {
        margin-top: 50px;
    }
</style>
<h1>Simple CRUID app</h1>
<div class="push-top">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <table class="table table-dark">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Password</td>
                <td class="text-center">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($student as $students)
            <tr>
                <td>{{$students->id}}</td>
                <td>{{$students->name}}</td>
                <td>{{$students->email}}</td>
                <td>{{$students->phone}}</td>
                <td>{{$students->password}}</td>
                <td class="text-center">
                    <a href="{{ route('students.edit', $students->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                    <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <a href="{{route('students.create')}}" class="btn btn-primary">Create record</a>
            <a href="\" class="btn btn-danger">Go back to home page</a>
        </tbody>
    </table>
<div>
@endsection