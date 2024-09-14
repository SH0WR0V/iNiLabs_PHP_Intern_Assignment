@extends('layout')

@section('title', 'Create Todo')

@section('content')
<div class="card">
    <div class="card-header bg-info">
        <h4>Create New Todo</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>

            <div class="form-group form-check mb-3">
                <input type="hidden" name="is_completed" value="0">
                <input type="checkbox" class="form-check-input" id="is_completed" name="is_completed" value="1">
                <label for="is_completed" class="form-check-label">Completed</label>
            </div>

            <button type="submit" class="btn btn-primary">Create Todo</button>
            <a href="{{ route('todos.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
