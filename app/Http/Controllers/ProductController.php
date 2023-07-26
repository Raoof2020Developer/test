<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traitments\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $materials = Material::all();
        return view('admin.products.create', compact(['categories', 'materials']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ref' => 'required|string:max:255',
            'designation' => 'required|string',
            'gram_buying_price' => 'required|numeric',
            'gram_selling_price' => 'required|numeric',
            'gram_weight' => 'required|numeric',
            'max_discount' => 'numeric',
            'quantity' => 'required|numeric',
            'image_path' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $newProduct = new Product;

        $newProduct->name = $request->name;
        $newProduct->ref = $request->ref;
        $newProduct->designation = $request->designation;
        $newProduct->material_id = $request->material_id;
        $newProduct->category_id = $request->category_id;
        $newProduct->gram_buying_price = $request->gram_buying_price;
        $newProduct->gram_selling_price = $request->gram_selling_price;
        $newProduct->gram_weight = $request->gram_weight;
        $newProduct->max_discount = $request->max_discount;
        $newProduct->quantity = $request->quantity;
        $newProduct->image_path = $this->uploadImg($request->image_path);

        $newProduct->save();

        session('flash_message', 'A new product is added successfully');

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $materials = Material::all();

        return view('admin.products.edit', compact(['product', 'categories', 'materials']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ref' => 'required|string:max:255',
            'designation' => 'required|string',
            'gram_buying_price' => 'required|numeric',
            'gram_selling_price' => 'required|numeric',
            'gram_weight' => 'required|numeric',
            'max_discount' => 'numeric',
            'quantity' => 'required|numeric',
            'image_path' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->has('image_path')) {
            Storage::disk('public')->delete($product);
            $product->image_path = $this->uploadImg($request->image_path);
        }

        $product->update([
            'name' => $request->name,
            'ref' => $request->ref,
            'designation' => $request->designation,
            'gram_buying_price' => $request->gram_buying_price,
            'category_id' => $request->category_id,
            'material_id' => $request->material_id,
            'gram_selling_price' => $request->gram_selling_price,
            'gram_weight' => $request->gram_weight,
            'max_discount' => $request->max_discount,
            'quantity' => $request->quantity,
        ]);

        session('flash_message', 'The product is updated successfully');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image_path != null) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();

        session()->flash('flash_message', 'Product removed successfully!');

        return redirect()->route('products.index');
    }

    public function export() 

    {

        return Excel::download(new ProductsExport, 'products.xlsx');

    }

       

    /**

    * @return \Illuminate\Support\Collection

    */

    public function import() 

    {

        Excel::import(new ProductsImport,request()->file('import_products'));

        return back();

    }
}
