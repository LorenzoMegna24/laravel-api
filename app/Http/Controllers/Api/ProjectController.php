<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        // $projects = Project::all();
        $projects = Project::with('type', 'technologies' )->get();

        return response()->json([
                'success'=>true,
                'projects'=>$projects
            ]);
    }

    public function show($slug){
        $project = Project::with('type', 'technologies' )->where('slug', $slug)->first();

        if($project){
            return response()->json([
                'success'=>true,
                'project'=>$project
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'error'=> 'Non ci sono progetti!'
            ]);
        }
    }
}
