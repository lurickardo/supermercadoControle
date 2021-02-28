<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\ValidateProduct;
use App\Actions\Util;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        Excel::store(new ProductExport(), "listProducts/lista_de_produtos.csv");
        Excel::store(new ProductExport(), "listProducts/lista_de_produtos.pdf");
        return view("layouts.product.listProduct", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("layouts.product.createProduct", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProduct $request)
    {
        $category = Category::find($request->input('idCategory'));
        $subcategory = Subcategory::find($request->input('idSubcategory'));

        $product = new Product();
        $product->Category()->associate($category);
        $product->Subcategory()->associate($subcategory);
        $product->nm_title = $request->input('nmTitle');
        $product->ds_product = $request->input('dsProduct');
        $product->vl_product = str_replace(",",".", $request->input('vlProduct'));
        $product->nm_tag = Util::formatCommaToJson($request->input('nmTag'));
        $product->ck_status = $request->input('ckStatus');
        $product->save();
        $product->nm_image = $request->file('imgProduct')->store("product/$product->id_product");
        $product->save();
        
        return redirect("/product")->with('response', 'Produto cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::where('id_category', '=', $product->id_subcategory)->get();

        $tags = Util::formatJsonToComma($product->nm_tag);
        return view("layouts.product.updateProduct", compact('product', 'categories', 'subcategories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateProduct $request, $id)
    {
        $category = Category::find($request->input('idCategory'));
        $subcategory = Subcategory::find($request->input('idSubcategory'));

        $product = Product::find($id);
        $product->Category()->associate($category);
        $product->Subcategory()->associate($subcategory);
        $product->nm_title = $request->input('nmTitle');
        $product->ds_product = $request->input('dsProduct');
        $product->vl_product = str_replace(",",".", $request->input('vlProduct'));
        $product->nm_tag = Util::formatCommaToJson($request->input('nmTag'));
        $product->ck_status = $request->input('ckStatus');
        $product->save();
        if($request->file('imgProduct')){
            Storage::delete($product->nm_image);
            $product->nm_image = $request->file('imgProduct')->store("product/$product->id_product");
            $product->save();
        }
        
        return redirect("/product")->with('response', 'Produto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            Storage::deleteDirectory("product/$product->id_product");
            $product->delete();

            return redirect("/product")->with('response', 'Produto excluído com sucesso!');
        }
    }
}
