<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    protected $validationRules = [
        'title' => ['required'],
        'slug' => [],
        'description' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('post_date', 'DESC')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create', ['project' => new Project()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules);

        $data['author'] = Auth::user()->name;
        $data['slug'] = Str::slug($data['title']);
        $data['modification_date'] = now()->format('Y-m-d H-i-s');
        $newPost = new Project();
        $newPost->fill($data);
        $newPost->save();

        return redirect()->route('admin.projects.index')->with('message','Project $newProject->title has benn created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $previousProject = Project::where('modification_date', '>', $project->modification_date)->orderBy('modification_date')->first();
        $nextProject = Project::where('modification_date', '<', $project->modification_date)->orderBy('modification_date', 'DESC')->first();
        return view('admin.projects.show', compact('project', 'previousPost', 'nextPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        array_push($this->validationRules['title'],['slug'], Rule::unique('posts')->ignore($project->id));
        $data = $request->validate($this->validationRules);
        $data['slug'] = Str::slug($data['title']);
        $data['modification_date'] = now()->format('Y-m-d H-i-s');
        $project->update($data);
        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "Project \"$project->title\" has been deleted sucesfully");
    }
}
