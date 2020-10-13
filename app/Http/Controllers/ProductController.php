<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function showProduct($slug)
    {
        // $data = \DB::table('product')->where('product_slug', $slug)->first();
        $data = Product::where('product_slug', $slug)->first();
        if (!$data) {
            abort(404);
        }

        return view('edit', compact('data'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $showdata = Product::paginate(5);
        // mengirim data books ke view books
        return view('tugas', compact('showdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('create');
    }
    public function store(Product $product, Request $request)
    {
        //Cara 1
        $product = new Product;
        $product->product_title = $request->product_title;
        $product->product_slug = Str::slug($request->product_title);
        $product->product_image = $request->product_image;
        $product->product_price = $request->product_price;
        if (Product::where('product_slug', $product->product_slug)->exists()) {
            abort(404);
        } else {
            $product->save();
            // redirect
            return redirect('tugas');
        }
        //Cara 2
        // Product::create([
        // 'product_title' => $request->product_title,
        // 'product_slug' => Str::slug($request->product_title),
        // 'product_image' => $request->product_image,
        // 'product_price' => $request->product_price,
        // ]);

        //Cara 3
        // $product = $request->all();
        // $product['product_slug'] = Str::slug($request->product_title);
        // Product::create($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $slug)
    {
        $data = Product::where('product_slug', $slug)->first();
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        if (Product::where('product_slug', $request->slug)->exists()) {
            if (Product::where('product_slug', $request->slug)->first()) {
                return redirect('tugas');
            } else {
                abort(404);
            }
        } else {
            Product::where('product_slug', $slug)->update([
                'product_title' => $request->title,
                'product_slug'  => $request->slug,
                'product_image' => $request->image
            ]);
            // redirect
            return redirect('tugas');
        }
    }   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $slug)
    {
        $product->where('product_slug', $slug)->delete();
        return redirect('tugas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
}
