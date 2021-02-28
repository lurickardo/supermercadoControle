<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use App\Http\Requests\ValidateSubcategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view("layouts.subcategory.listSubcategory", compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("layouts.subcategory.createSubcategory", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateSubcategory $request)
    {
        $category = Category::find($request->input('idCategory'));
        $subcategory = new Subcategory();
        $subcategory->Category()->associate($category);
        $subcategory->nm_title = $request->input('nmTitle');
        $subcategory->save();

        return redirect("/subcategory")->with('response', 'Subcategoria cadastrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
    
        return view("layouts.subcategory.updateSubcategory", compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateSubcategory $request, $id)
    {
        $category = Category::find($request->input('idCategory'));
        $subcategory = Subcategory::find($id);
        $subcategory->nm_title = $request->input('nmTitle');
        $subcategory->Category()->associate($category);
        $subcategory->save();

        return redirect("/subcategory")->with('response', 'Subcategoria alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        if($subcategory){
            $subcategory->Product()->delete();
            $subcategory->delete();
            
            return redirect("/subcategory")->with('response', 'Subategoria excluída com sucesso!');
        }
    }

    public function listSubcategoryByCategory($idCategory) {
        $subcategories = Subcategory::where('id_category', '=', $idCategory)->get();
        return response()->json($subcategories);
    }
}
