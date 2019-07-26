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
    	return back();
    }
}
