@extends('layouts.layout')

@section('content')

<!-- Main Content -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Edit Task</h2>

  

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>                
        @endforeach
    @endif

    <form method="POST" action="{{ route('update.task', $task->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="assigned_to" class="form-label">Assign To</label>
            <select class="form-select" id="assigned_to" name="assigned_to">
                <option value="" disabled>Select to assign</option> 
                @foreach($users as $user)
                    <option value="{{ $user->name }}" {{ $task->assigned_to == $user->name ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option> 
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $task->contact }}">
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" name="department" value="{{ $task->department }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">

                <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>pending</option>
                <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="problem_type" class="form-label">Problem Type</label>
            <select class="form-select" id="problem_type" name="problem_type">
                <option value="scanner_problem" {{ old('problem_type', $task->problem) == 'scanner_problem' ? 'selected' : '' }}>Scanner Problem</option>
                <option value="computer_problem" {{ old('problem_type', $task->problem) == 'computer_problem' ? 'selected' : '' }}>Computer Problem</option>
                <option value="internet_problem" {{ old('problem_type', $task->problem) == 'internet_problem' ? 'selected' : '' }}>Internet Problem</option>
                <option value="access_point_problem" {{ old('problem_type', $task->problem) == 'access_point_problem' ? 'selected' : '' }}>Access Point Problem</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection