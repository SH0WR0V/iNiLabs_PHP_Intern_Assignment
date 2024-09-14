@extends('layout')

@section('title', 'Todos List')

@section('content')
<div class="card">
    <div class="card-header bg-info">
        <h4>Todos</h4>
        <a href="{{ route('todos.create') }}" class="btn btn-success btn-md float-end">Create New Todo</a>
    </div>
    <div class="card-body">
        @if ($todos->isEmpty())
            <p class="text-muted">No Todos available.</p>
        @else

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>{{ $todo->is_completed ? 'Completed' : 'Pending' }}</td>
                        <td>
                            <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('todos.delete', $todo->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
