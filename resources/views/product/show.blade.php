@extends('layouts.app')
@section('page', 'Detail Produk')
@section('content')
<div class="card">
    <div class="card-body">
        <center>
            <img src="{{ asset('storage/'.$product->id.'.png') }}" alt="" width=300 height=300>
        </center>
        <table class="table mt-4">
            <tr>
                <th>Nama Produk</th>
                <td>:</td>
                <td>{{$product->nama_produk}}</td>
            </tr>
            <tr>
                <th>Stok Produk</th>
                <td>:</td>
                <td>{{$product->stok_produk}} Unit</td>
            </tr>
            <tr>
                <th>Harga Produk</th>
                <td>:</td>
                <td>Rp {{$product->harga_produk}}</td>
            </tr>
            <tr>
                <th>Deskripsi Produk</th>
                <td>:</td>
                <td>{{$product->deskripsi_produk}}</td>
            </tr>
        </table>
    </div>
</div>

@endsection