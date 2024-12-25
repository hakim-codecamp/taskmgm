@extends('layouts.layout')

@section('content')


<div class="card ">
    <!-- Card Header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <!-- Left Side: Paragraph -->
                    <a href="{{ route('create.task') }}" class="btn" style="background-color: #4643d3; color: white;">Add task</a>


        <!-- Right Side: Search Bar -->
        <form class="d-flex" style="max-width: 300px; width: 100%;" action="{{ route('dashboard') }}" method="GET">
            <input 
                class="form-control" 
                type="search" 
                placeholder="Search tickets..." 
                aria-label="Search"
                name="search"
                value="{{ request()->search }}"
                style="border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin-right: 0;">
            <button 
                class="btn btn-outline-primary" 
                type="submit"
                style="border-radius: 5px;">
                Search
            </button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-bordered" style="border: 1px solid #dddddd">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Created</th>
                <th scope="col">Assignd To</th>
                <th scope="col">Phone number</th>
                <th scope="col">Directorate</th>
                <th scope="col">Problem</th>
                <th scope="col">Created at</th>
                <th scope="col">Status</th>
                
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tasks as $task)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $task->user->name }}</td>
                <td>{{ $task->assigned_to }}</td>
                <td>{{ $task->contact }}</td>
                <td>{{ $task->department }}</td>
                <td>{{ $task->problem }}</td>
                <td>{{ $task->created_at }}</td>
                <td>
                  <span style="color: {{ $task->status == 'completed' ? 'green' : 'red' }}; font-weight: bold;">
                    {{ $task->status }}
                  </span>
                </td>
                
                <td>
                    <a href="{{ route('edit.task', $task->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-edit"></i></a>
                    <a href="{{ route('show.task', $task->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-eye"></i></a>
                    <a href="javascript:;" onclick="if(confirm('Are you sure you want to delete the task?')) document.querySelector('.form-{{ $task->id }}').submit()" style="color: #2c2c2c;" class="ms-1 me-1"><i class="fas fa-trash-alt"></i></a>
                    <form class="form-{{ $task->id }}" action="{{ route('destroy.task', $task->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
    </div>

</div>

@endsection



