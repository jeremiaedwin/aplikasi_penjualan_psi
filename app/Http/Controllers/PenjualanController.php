<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penjualan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->product_id;
        $product = Product::find($id);
        if($product->stok_produk >= $request->quantity){
                $purchase = new Penjualan;
                $product->stok_produk = $product->stok_produk - $request->quantity;
                $purchase->product_id = $id;
                $purchase->quantity = $request->quantity;
                $purchase->total = $product->price * $request->quantity;
                $product->save();
                $purchase->save();
                return response()->json([
                    'success' => true,
                ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ], 500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
