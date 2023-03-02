@extends('layout')
@section('content')
    <h1>Insert new Data</h1>
    <form action="/product" method="post">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="">Nama Produk</label>
            <input class="form-control" type="text" name="nama_produk">
        </div>
        <div class="mb-3">
            <label for="">Harga Produk</label>
            <input class="form-control" type="number" name="harga_produk">
        </div>
        <div class="mb-3">
            <label for="">Stok Produk</label>
            <input class="form-control" type="number" name="stok_produk">
        </div>
        <div class="mb-3">
            <label for="">Deskripsi Produk</label>
            <textarea class="form-control" name="deskripsi_produk" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection