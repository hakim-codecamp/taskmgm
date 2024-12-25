<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{


    public function index(Request $request){
        
        $tasks = Task::when($request->has('search'), function($query) use ($request){
            $query->where('status', 'LIKE', "%$request->search%");
        })->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create(){
        $users=User::all();
        return view('tasks.create', compact('users'));
    }

    public function store(TaskStoreRequest $request){
        $task=new Task();
        $task->user_id = auth()->id();
        $task->assigned_to = $request->assigned_to;
        $task->contact = $request->contact;
        $task->department = $request->department;
        $task->problem=$request->problem_type;
        $task->description = $request->description;
        $task->save();
        return redirect()->route('dashboard')->with('success', 'task created successfully!');
    }

    public function edit(string $id){
        $task=Task::findOrFail($id);
        $users=User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(TaskStoreRequest $request, string $id){
        $task=Task::findOrFail($id);
        
        $task->assigned_to = $request->assigned_to;
        $task->contact = $request->contact;
        $task->department = $request->department;
        $task->problem=$request->problem_type;
        $task->status=$request->status;
        $task->description = $request->description;
        $task->save();
        return redirect()->route('dashboard')->with('success', 'task updated successfully!');
    }

    public function show(string $id){
        $task=Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function destroy(string $id){
        $task=Task::findOrFail($id);
        $task->delete();
        return redirect()->route('dashboard')->with('success', 'task deleted successfully!');
    }
}
