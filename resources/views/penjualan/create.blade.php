@extends('layout')
@section('content')
    <h1>Scan Product</h1>
    <form action="/product" method="post">
        {{csrf_field()}}
    </form>
    <center><div id="reader" width="600px"></div></center>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);
        updateItem(decodedText)
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

        function updateItem(id){
            alert("Item Terbaca")
            let _id = id;
            let qty   = 1;

            $.ajax({

                url: `/product/stok/${_id}`,
                type: "PUT",
                cache: false,
                data: {
                    "id": id,
                    "qty": qty,
                    _token: '{{csrf_token()}}'
                },
                success:function(response){
                    location.reload(true);
                },
                error:function(error){}

        });

        }
    </script>
</body>
</html>
@endsection