<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {
    	$projects = \App\Project::all(); //Used to get data from the db 
    	//return $projects //Used to return Json object from the data
    	return view('projects', compact('projects'));
    }
    public function create() {
    		return view('projects.create');
    }

   public function show(Project $project) {
        
    	return view('projects.show', compact('project'));
    }

    public function edit(Project $project) {
        
    	return view('projects.edit', compact('project'));
    }

    public static function update(Project $project) {

    	
    	$project->update(request(['title','description']));
   
    	return redirect('/projects');
    		//return request()->all();
    }

    public function destroy(Project $project) {
    	$project->delete();
    	return redirect('/projects');
    }

    public function store() {

        $attributes = request()->validate([
          'title' => ['required', 'min:3'],
          'description' => ['required', 'min:3']
        ]);
    	Project::create($attributes);
    	return redirect('/projects');
    		//return request()->all();
    }
    
}
