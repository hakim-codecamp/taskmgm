@extends('layouts.layout')

@section('content')
    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Create Task</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form method="POST" action="{{ route('store.task') }}">
            @csrf
            <div class="mb-3">
                <label for="assigned_to" class="form-label">Assign To</label>
                <select class="form-select" id="assigned_to" name="assigned_to">
                    <option value="" disabled selected>select to assign</option> 
                    @foreach($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option> 
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}">
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" id="department" name="department"
                    value="{{ old('department') }}">
            </div>
            <div class="mb-3">
                <label for="problem_type" class="form-label">Problem Type</label>
                <select class="form-select" id="problem_type" name="problem_type">
                    <option value="" disabled selected >-- Select Problem Type --</option>
                    <option value="scanner_problem">Scanner Problem</option>
                    <option value="computer_problem">Computer Problem</option>
                    <option value="internet_problem">Internet Problem</option>
                    <option value="access_point_problem">Access Point Problem</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
