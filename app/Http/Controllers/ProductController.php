<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('category')->get();

        return view('product/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('product/add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price'=>'required|numeric',
            'category_id' => 'required',
            'image' => [
                File::types(['jpg','jpeg', 'png', 'gif'])->max(1024)
            ]
        ]);
        //==========================
        Product::create([
            'name'=>$validated['product_name'],
            'description'=>$validated['product_description'],
            'price'=>$validated['product_price'],
            'category_id'=>$validated['category_id'],
            'image' => Storage::putFile('images', $request->file('image'))
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['product'] = Product::find($id);
        return view('/product/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => [
                File::types(['jpg','jpeg', 'png', 'gif'])->max(1024)
            ]
        ]);
        // Product::where('id', $id)->update([
        //     'name'=>$validated['product_name'],
        //     'description'=>$validated['product_description'],
        //     'price'=>$validated['product_price'],
        //     'category_id'=>$validated['category_id']
        // ]);
        $product = Product::find($id);
        // change user value
        if($request->product_name) {
            $product->name = $request->product_name;
        }
        if($request->product_description) {
            $product->description = $request->product_description;
        }
        if($request->product_price) {
            $product->price = $request->product_price;
        }
        if($request->category_id) {
            $product->category_id = $request->category_id;
        }
        if($request->file('image')){
            if($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $product->image = Storage::putFile('images', $request->file('image'));
        }
        // update data with save method
        $product->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/');
    }

}
