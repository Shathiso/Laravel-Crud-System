<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {

      /*public function __construct(){
        $this->middleware('auth')->only(['store'],['update']);    // you can use this constructor to limit access to certain routes
      }*/

      if(auth()->id() == 3){
        $projects = Project::all();
      }
      else{
    	$projects = Project::where('owner_id', auth()->id())->get(); //Used to get data from the db 
      //return $projects //Used to return Json object from the data
      }
    	return view('projects', compact('projects')); //Is the same as: ['projects' => $project]
    }
    public function create() {
    		return view('projects.create');
    }

   public function show(Project $project) {

    //This method below uses the policy which maps to the AuthService Provider where they are registered.
        //$this->authorize('update', $project);
      abort_if($project->owner_id !==  auth()->id(), 403);
    	return view('projects.show', compact('project'));
    }

    public function edit(Project $project) {
        
    	return view('projects.edit', compact('project'));
    }

    public function update(Project $project) {

    	
    	$project->update(request(['title','description']));
      
      session()->flash('msgTag', 'primary');
      session()->flash('msg', 'The Project was updated');
    	return redirect('/projects');
    		//return request()->all();
    }

    public function destroy(Project $project) {
      $project->delete();
      session()->flash('msgTag', 'warning');
      session()->flash('msg', 'The Project was deleted');
    	return redirect('/projects');
    }

    public function store() {

        $attributes = request()->validate([
          'title' => ['required', 'min:3'],
          'description' => ['required', 'min:3']
        ]);
        $attributes['owner_id'] = auth()->id();
      Project::create($attributes);

      session()->flash('msgTag', 'info');
      session()->flash('msg', 'Project Created');
      
    	return redirect('/projects');
    		//return request()->all();
    }
    
}
