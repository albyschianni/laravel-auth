<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class MainController extends Controller
{
    public Function home() {

        $projects = Project::all();
        $data = [
            'name' => $projects ,
            'description' => $projects ,
            'main_image' => $projects ,
            'release_date' => $projects ,
            'repo_link' => $projects ,
        ];

        return view('pages.home', compact('projects'));
    }

    public function projectShow(Project $project) {

        return view('pages.projectShow', compact('project'));
    }

    public function projectDelete(Project $project){

        $project->delete();

        return redirect()->route('home');
    }

    public function projectCreate(){

        return view('pages.projectCreate');
    }

    public function projectStore(Request $request){

        $data = $request -> validate([

            'name' => 'required|unique:projects,name|string|max:64',
            'description' => 'nullable|string',
            'main_image' => 'required|unique:projects,main_image|string',
            'release_date' => 'required|date',
            'repo_link' => 'required|unique:projects,repo_link|string',
        ]);

        $project = new Project();

        $project -> name = $data ['name'];
        $project -> description = $data ['description'];
        $project -> main_image = $data ['main_image'];
        $project -> release_date = $data ['release_date'];
        $project -> repo_link = $data ['repo_link'];

        $project->save();

        return redirect()->route('home');
    }

    public function projectEdit(Project $project) {

        return view('pages.projectEdit', compact('project'));
    }

    public function projectUpdate(Request $request, Project $project) {

        $data = $request -> validate([

            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'main_image' => 'required|string',
            'release_date' => 'required|date',
            'repo_link' => 'required|string',
        ]);

        $project -> name = $data ['name'];
        $project -> description = $data ['description'];
        $project -> main_image = $data ['main_image'];
        $project -> release_date = $data ['release_date'];
        $project -> repo_link = $data ['repo_link'];

        $project->save();

        return redirect()->route('home');

    }
}
