<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Helpers\CustomHelper;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $types = Type::all();

      return view('admin.types.index', compact('types'));
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
    public function store(TypeRequest $request)
    {
      $form_data = $request->all();

      $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Type());

      $new_type = Type::create($form_data);

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
    public function update(TypeRequest $request, Type $type)
    {
      $form_data = $request->all();

      $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Type());

      $type->update($form_data);

      return redirect()->back()->with('message', "The type '$type->name' has been successfully modified !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
      $type->delete();
      return redirect()->route('admin.types.index')->with('deleted', "The type '$type->name' has been successfully deleted !");
    }
}
