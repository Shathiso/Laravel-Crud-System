<?php

namespace App\Http\Controllers;
use App\Project;
use App\Task;

use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public function update(Task $task) {

    	request()->has('completed') ? $task->complete() : $task->incomplete();
    	return back();
    }

    public function store(Project $project) {

        $attributes = request()->validate(['description' => 'required']);

        $project->addTask($attributes); //Task method is in Project model App/Project
        
       // session(['message' => 'The task was stored']); Store the msg for the users entire session
       session()->flash('msgTag', 'info');
       session()->flash('msg', 'The task was added');
    	return back();
    }

    public function delete(Task $task) {

        request()->has('completed') ? $task->complete() : $task->incomplete();
        session()->flash('msgTag', 'warning');
        session()->flash('msg', 'The task was deleted');
    	return back();
    }
}
