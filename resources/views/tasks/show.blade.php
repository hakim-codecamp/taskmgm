@extends('layouts.layout')

@section('content')

<div class="row py-5 px-4">
    <div class="col-md-8 mx-auto"> <!-- Profile widget -->
        <a href="{{ route('dashboard') }}" class="btn mb-3" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
        <div class="bg-white shadow rounded overflow-hidden">
            

            <div class="px-4 py-3">
                <div class="p-4 rounded shadow-sm bg-light">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width: 250px;">Created By</td>
                                <td>{{ $task->user->name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">assigned_to</td>
                                <td>{{ $task->assigned_to }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Contact Number</td>
                                <td>{{ $task->contact }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Department</td>
                                <td>{{ $task->department }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Problem</td>
                                <td>{{ $task->problem }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Created at</td>
                                <td>{{ $task->created_at }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Status</td>
                                <td>{{ $task->status }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Description</td>
                                <td>{{ $task->description }}</td>
                            </tr>

@endsection