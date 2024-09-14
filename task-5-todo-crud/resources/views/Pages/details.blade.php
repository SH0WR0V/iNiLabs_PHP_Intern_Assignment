@extends('layout')

@section('title', 'Todo Details')

@section('content')
<div class="card">
    <div class="card-header bg-info">
        <h4>Todo Details</h4>
        <a href="{{ route('todos.index') }}" class="btn btn-success btn-md float-end">Back to List</a>
    </div>
    <div class="card-body">
        <h5>Title: {{ $todo->title }}</h5>
        <p>Description: {{ $todo->description }}</p>
        <p>Status: <strong>{{ $todo->is_completed ? 'Completed' : 'Pending' }}</strong></p>
        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('todos.delete', $todo->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>
@endsection
