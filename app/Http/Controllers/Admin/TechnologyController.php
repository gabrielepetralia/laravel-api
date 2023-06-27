<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Helpers\CustomHelper;
use App\Http\Requests\TechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $technologies = Technology::all();

      return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyRequest $request)
    {
      $form_data = $request->all();

      $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Technology());

      $new_type = Technology::create($form_data);

    return redirect()->back()->with('message', "Hai creato correttamente il tipo $new_type->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TechnologyRequest $request, Technology $technology)
    {
      $form_data = $request->all();

      $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Technology());

      $technology->update($form_data);

      return redirect()->back()->with('message', "The technology '$technology->name' has been successfully modified !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
      $technology->delete();
      return redirect()->route('admin.technologies.index')->with('deleted', "The technology '$technology->name' has been successfully deleted !");
    }
}
