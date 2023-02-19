<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Project;
class CampaignController extends Controller
{
    
public function Create(request $request)
{
 $campaign=New Campaign;
 $campaign->name = $request->name;
$campaign->project_id=$request->project;
 $campaign->save();
 if ($campaign) {
    return back()->with('success', 'Campaign added');
 }
 else{
    return back()->with('danger', 'Error occured');
 }

}

public function Delete($id)
{
    $data=Campaign::find($id);
    $data->delete();
   
        return back()->with('danger', 'Campaign Deleted');
     
   
}
public function index()
{
    $campaigns=Campaign::with('project')->get();
    $projects=Project::where('status',1)->pluck('name','id');

    //dd($campaigns[0]->project->name);
    return view('Campaign.Index',compact('campaigns','projects'));
}

public function details($id)
{
  
    $data=Campaign::find($id);
    if (!$data) {
        abort(404);
    }
    $data->opens+=1;
    $data->save();
    return view('Campaign.details',compact('id'));
}
public function Inc_clicks($id)
{
    $data=Campaign::find($id);
    $data->clicks+=1;
    $data->save();
    return back()->with('success', 'click increased');
     
    //return view('Campaign.Index',compact('campaigns','projects'));
}

public function update(request $req)
{
      $campaign=Campaign::find($req->id);
      $campaign->project_id = $req->project;
      $campaign->name = $req->name;
      $campaign->save();
        if ($campaign) {
         return back()->with('success', 'Campaign updated');
      }
      else{
         return back()->with('danger', 'Error occured');
      } 
}
}
