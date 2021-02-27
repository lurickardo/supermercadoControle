<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\ValidateCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view("layouts.category.listCategory", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("layouts.category.createCategory");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCategory $request)
    {
        $category = new Category();

        $category->nm_title = $request->input("nmTitle");
        $category->save();

        return redirect("/category")->with('response', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view("layouts.category.updateCategory", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateCategory $request, $id)
    {
        $category = Category::find($id);
        $category->nm_title = $request->input("nmTitle");
        $category->save();

        return redirect("/category")->with('response', 'Categoria alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category){
            $category->Product()->delete();
            $category->Subcategory()->delete();
            $category->delete();
            
            return redirect("/category")->with('response', 'Categoria excluída com sucesso!');
        }
    }
}
