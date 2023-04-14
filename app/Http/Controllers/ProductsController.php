<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\products;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::where('users_id', '=', Auth::user()->id)->Paginate(5);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all();
        $users = users::all();
        return view('admin.product.add', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'categories_id' => 'required|exists:categories,id',
            'users_id' => 'required|exists:users,id',
            'slug' => 'required|unique:products,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $validated = $request->all();

        if ($request->hasFile('image')) {
            $imageName = $request->slug . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        products::create($validated);

        return redirect()->route('product')->with('success', 'Berhasil Menambah Produk!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id_products)
    {
        $product = products::find($id_products);
        $categories = categories::all();
        $users = users::all();
        return view('admin.product.edit', compact('product', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_products)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'categories_id' => 'required',
            'users_id' => 'required',
            'slug' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->slug . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        products::where('id_products', $id_products)->update([
            'categories_id' => $validated['categories_id'],
            'users_id' => $validated['users_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'slug' => $validated['slug'],
        ]);

        return redirect()->route('product')->with('warning', 'Berhasil Mengupdate Produk!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_products)
    {
        $product = products::find($id_products);
        $product->delete();
        alert()->error('Berhasil Menghapus Produk!');
        return redirect()->route('product');
    }
}
