<?php

namespace App\Http\Controllers;

use App\Models\detail_transactions;
use App\Models\products;
use App\Models\transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $transactions = transactions::create([
            'users_id' => Auth::user()->id,
            'date' => Date::now(),
            'payment' => $request->payment,
            'total' => $request->payment,
        ]);
        $cart_items = detail_transactions::where('transactions_id', null)->get();

        foreach ($cart_items as $keyy => $itemm) {
            $product = products::find($itemm->products_id);
            $validation = products::find($itemm->products_id);
            if ($product->stock < $request->input('quantity' . $keyy)) {
                alert()->error('Ada produk yang kekurangan stok, silahkan cek kembali persediaan produk');
                return back();
            }
        }
        
        foreach ($cart_items as $key => $item) {
            $product = products::find($item->products_id);
            if ($product->stock >= $request->input('quantity' . $key)) {
                $product->stock -= $request->input('quantity' . $key);
                $product->update();
                $item->transactions_id = $transactions->id;
                $item->qty = $request->input('quantity' . $key);
                $item->sub_total = $request->input('sub_total' . $key) * $request->input('quantity' . $key);
                $item->update();
            } else {
                alert()->error('Ada produk yang kekurangan stok, silahkan cek kembali persediaan produk');
                return back();
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show(transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(transactions $transactions)
    {
        //
    }
}
