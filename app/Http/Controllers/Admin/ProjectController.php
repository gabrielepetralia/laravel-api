<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Helpers\CustomHelper;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $direction = 'desc';
      $projects = Project::paginate(10);

      return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function orderBy($direction)
    {
      $projects = Project::orderBy('id', $direction)->paginate(10);
      $direction = $direction === 'asc' ? 'desc' : 'asc';

      return view('admin.projects.index', compact('projects','direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $types = Type::all();
      $technologies = Technology::all();

      return view('admin.projects.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
      $form_data = $request->all();

      if (!isset($form_data['is_finished'])) $form_data['is_finished'] = 0;

      $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Project());

      if (array_key_exists('img', $form_data)) {
        $form_data['img_path'] = Storage::put('uploads', $form_data['img']);
        $form_data['img_original_name'] = $request->file('img')->getClientOriginalName();
      }

      // $new_project = new Project();

      // $new_project->fill($form_data);

      // $new_project->save();

      $new_project = Project::create($form_data);

      if (array_key_exists('technologies', $form_data)) {
        $new_project->technologies()->attach($form_data['technologies']);
      }

      return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
      return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
      $types = Type::all();
      $technologies = Technology::all();

      return view('admin.projects.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
      $form_data = $request->all();

      if (!isset($form_data['is_finished'])) $form_data['is_finished'] = 0;

      if ($project->name !== $form_data['name']) {
        $form_data['slug']  = CustomHelper::generateUniqueSlug($form_data['name'], new Project());
      } else {
        $form_data['slug']  = $project->slug;
      }

      if (array_key_exists('img', $form_data)) {
        $form_data['img_path'] = Storage::put('uploads', $form_data['img']);
        $form_data['img_original_name'] = $request->file('img')->getClientOriginalName();
      }

      if (array_key_exists('technologies', $form_data)) {
        $project->technologies()->sync($form_data['technologies']);
      } else {
        $project->technologies()->detach();
      }

      $project->update($form_data);

      return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
      if ($project->img_path) {
        Storage::disk('public')->delete($project->img_path);
      }

      $project->delete();
      return redirect()->route('admin.projects.index')->with('deleted', "The project '$project->name' has been successfully deleted !");
    }
}

