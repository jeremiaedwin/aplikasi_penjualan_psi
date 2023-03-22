@extends('layouts.app')
@section('page', 'Tambah Stok Barang')
@section('content')
    
    
    <div class="card">
        <div class="card-body">
        <center>
        <div id="reader" width="600px"></div>
    </center>
        <div class="form-group mb-3">
            <input hidden type="text" class="form-control" name="product_id" id="product_id">
        </div>
        <div class="form-group mb-3">
            <label for="">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk">
        </div>
        <div class="form-group mb-3">
            <label for="">Stok Produk</label>
            <input type="text" class="form-control" name="stok_produk" id="stok_produk">
        </div>
        <div class="form-group mb-3">
            <label for="">Harga Produk</label>
            <input type="text" class="form-control" name="harga_produk" id="harga_produk">
        </div>
        <div class="form-group mb-3">
            <label for="">Quantity</label>
            <input type="text" class="form-control" name="quantity" id="quantity">
        </div>
        <input type="submit" id="submit"value="Submit" class="btn btn-primary">
        </div>
    </div>


    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);
        
        beliProduk(decodedText)
        }

        function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 500, height: 500} },
        /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        
       
        
        $(document).ready(function(e) {
            $('#submit').click(function(e){
                e.preventDefault();
                transaction();
            });
        });
        function transaction(id){
            
            let _id = $('#product_id').val();
            let qty   = $('#quantity').val();
            $.ajax({

                url: '/penjualan/',
                type: "POST",
                data: {
                    product_id: _id,
                    quantity: qty,
                    _token: '{{csrf_token()}}'
                },
                success:function(response){
                    alert('Penjualan berhasil')
                    location.reload(true);
                },
                error:function(error){
                    alert('Stok tidak mencukupi')
                    location.reload(true);
                }

        });

        }

        function beliProduk(id){
            alert('Scan Berhasil');
            let _id = id;
            $.ajax({

                url: `/product/detail/${_id}`,
                type: "GET",
                cache: false,
                data: {
                    "id": _id
                },
                success:function(response){
                    $("#product_id").val(response.data.id);
                    $("#nama_produk").val(response.data.nama_produk);
                    $("#stok_produk").val(response.data.stok_produk);
                    $("#harga_produk").val(response.data.harga_produk);
                    $("#quantity").val(0);
                    $("#product_id").prop('disabled', true);
                    $("#nama_produk").prop('disabled', true);
                    $("#stok_produk").prop('disabled', true);
                    $("#harga_produk").prop('disabled', true);
                }
            });
        }
    </script>
</body>
</html>
@endsection