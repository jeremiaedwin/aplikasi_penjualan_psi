<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\PayUService\Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:create product', ['only' => ['create', 'store']]);
        $this->middleware('permission:scan product for add stock', ['only' => ['updateStok', 'addStok']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        
        $id = IdGenerator::generate(['table' => 'products', 'length' => 9, 'prefix' => date('y')]);

        $product->id = $id;
        $product->nama_produk = $request->nama_produk;
        $product->harga_produk = $request->harga_produk;
        $product->stok_produk = $request->stok_produk;
        $product->deskripsi_produk = $request->deskripsi_produk;
        $product->barcode = Str::slug($request->nama_produk) . '_barcode';
        $product->save();
        
        \Storage::disk('public')->put($product->id.'.png',base64_decode(\DNS2D::getBarcodePNG(strval($product->id), "QRCODE", 300, 300)));
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    public function detailProduct(Request $request, $id)
    {
        $product = Product::find($id); 
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $product  
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id); 

        $product->delete();

        if( \Storage::disk('public')->exists($product->id.'.png')){
            \Storage::disk('public')->delete($product->id.'.png');
        }

        return back();
    }

    public function updateStok()
    {
        return view('product.update');
    }

    public function addStok(Request $request)
    {
        $id = $request->product_id;
        $product = Product::find($id);
        
        try{
            $product->stok_produk = $product->stok_produk + $request->quantity;
            $product->save();
            Alert::success('Success!', 'Berhasil menambahkan stok '.$product->nama_produk);
        }catch(\Exception $e){
            Alert::error('Terjadi Kesalahan!', 'Gagal menambahkan stok produk.');
        }
        return back();
    }
}
