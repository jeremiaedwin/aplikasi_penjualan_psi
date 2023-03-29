@extends('layouts.app')
@section('page', 'Product')
@section('content')

<div class="card">
  <div class="card-body">
    <table class="table table-striped-rows">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @php $no = 1 @endphp
        @foreach($product as $product)
        <tr>
            <td>{{$no}}</td>
            <td>{{$product->nama_produk}}</td>
            <td>{{$product->stok_produk}}</td>
            <td>{{$product->harga_produk}}</td>
            <td>
                <a href="/product/{{$product->id}}" class="btn btn-primary">Lihat Barcode</a>
                <a href="/product/delete/{{$product->id}}" class="btn btn-danger">Hapus</a>
            </td> 
        </tr>
        @php $no++ @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection