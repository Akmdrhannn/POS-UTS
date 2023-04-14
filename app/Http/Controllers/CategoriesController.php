<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\transactions;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $category = categories::paginate(5);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
            'name'       => 'required|string|min:2|max:100',
            'description' => 'required',
        ]);

        categories::create($request->all());
        return redirect()->route('category')->with('success', 'Berhasil Menambah Kategori!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $id)
    {
        $request->validate([
            'name'     => 'required|string|min:2|max:100',
            'description' => 'required',
        ]);

        $id->update($request->all());

        return redirect()->route('category')->with('warning', 'Berhasil Mengupdate Kategori!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categories::destroy($id);
        alert()->error('Berhasil Menghapus Kategori!');
        return back();
    }
}
