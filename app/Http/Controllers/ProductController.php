<?php

namespace App\Http\Controllers;

use App\Product;
use App\SubCategorie;
use App\MainCategorie;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('subCategorie.mainCategorie')->get();

        $subCategories = SubCategorie::all();

        $mainCategories = MainCategorie::all();

        return view('/home', compact('products', 'subCategories', 'mainCategories'));
    }

    public function adminindex()
    {
        $products = Product::with('subCategorie.mainCategorie')->get();

        $subCategories = SubCategorie::all();

        $mainCategories = MainCategorie::all();

        return view('admin.producten', compact('products', 'subCategories', 'mainCategories'));
    }

    public function createproduct()
    {
        $subCategories = SubCategorie::all();

        $mainCategories = MainCategorie::all();

        return view('admin.createPorduct', compact('products', 'subCategories', 'mainCategories'));
    }

    public function addProduct(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $new_name);
            //Voeg product toe met naam prijs en een subgang
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $new_name;
            $product->subCategoriesId = $request->subCategorie;
            $product->save();
        }

        return redirect('beheer/producten');
    }

    public function editProduct(Product $product)
    {
        $subCategories = SubCategorie::all();
        return view('admin.editProduct', compact("product", 'subCategories'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'sometimes', 'nullable', 'string', 'max:191',
            'description' => 'sometimes', 'nullable', 'string', 'max:255',
            'price' => 'sometimes', 'nullable', 'string', 'max:55',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'subCategoriesId' => 'sometimes', 'nullable', 'numeric', 'max:20'
        ]);
        $image = $request->file('file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $new_name);

        $product->name = (isset($request->name) > 0) ? $request->name : $product->name;
        $product->description = (isset($request->description) > 0) ? $request->description : $product->description;
        $product->price = (isset($request->price) > 0) ? $request->price : $product->price;
        $product->subCategoriesId = (isset($request->subCategoriesId) > 0) ? $request->subCategoriesId : $product->subCategoriesId;
        $product->image = (isset($request->image) > 0) ? $request->image : $new_name;

        $product->save();
        return back();
    }

    public function deleteProduct(Product $product)
    {
        //Verwijder gekozen product
        $product = Product::find($product->id);

        $product->delete();

        return redirect('beheer/producten');
    }
}
