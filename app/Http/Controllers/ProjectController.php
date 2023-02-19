<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
   
        public function Create(request $request)
        {
         $project=New Project;
         $project->name = $request->name;
           $project->save();
           if ($project) {
            return back()->with('success', 'Project added');
         }
         else{
            return back()->with('danger', 'Error occured');
         }
        }

        public function index()
        {
         $projects= Project::get();
        return view('welcome',compact('projects'));

        }
        
        public function Delete($id)
        {
            $data=Project::find($id);
            $data->delete();
          
                return back()->with('danger', 'Project delted');
             
        }
    
    
   public function update(request $req)
   {
         $project=Project::find($req->id);
         $project->name = $req->name;
        $project->save();
           if ($project) {
            return back()->with('success', 'Project updated');
         }
         else{
            return back()->with('danger', 'Error occured');
         } 

        }

        public function Stats()
        {
              return view('stats');
        }
}
