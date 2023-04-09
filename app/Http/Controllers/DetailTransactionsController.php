<?php

namespace App\Http\Controllers;

use App\Models\detail_transactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_transactionsModel = DB::table('detail_transactions')->select('detail_transactions.*', 'products.name')->join('products', 'detail_transactions.products_id', '=', 'products.id_products')->get();

        return view('/admin/trd', compact('detail_transactionsModel'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detail_transactions  $detail_transactions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detail_transactions  $detail_transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_transactions $detail_transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detail_transactions  $detail_transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detail_transactions $detail_transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail_transactions  $detail_transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_transactions $detail_transactions)
    {
        //
    }
}
