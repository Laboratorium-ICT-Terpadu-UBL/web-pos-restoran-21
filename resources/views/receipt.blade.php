<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Receipt</title>
</head>
<body>
    <main class="content" style="width: 500px; margin:auto;padding-top: 40px">
        <!-- Button trigger modal -->

        <div class="container-fluid p-0">

            <strong>

            <div class="row">

                <div class="col-xl-12 d-flex mb-5">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h1 class="text-center">Nama Warung</h1>
                                        <p class="text-center">Jl. Taman Melati, Bekasi, West Java
                                            <br>(021)8475937582</p>
                                        <p class="text-center"></p>
                                        {{ str_pad("", 41, "=") }}
                                        <table>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>: {{$date->format("d M Y H:i:s")}}</td>
                                            </tr>
                                            <tr>
                                                <td>OrderID</td>
                                                <td>: {{$transaksinow->id_transaksi}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah</td>
                                                <td>: {{$transaksinow->total_item}}</td>
                                            </tr>
                                        </table>
                                        {{ str_pad("", 41, "=") }}
                                        <table style="width: 100%">
                                            @foreach ($pesanan as $ps)
                                            <tr>
                                                <td style="width: 40%">{{$ps->produk->nama_produk}}</td>
                                                <td style="width: 50%">{{$ps->jumlah}}</td>
                                                <td>{{$ps->harga_satuan * $ps->jumlah}}</td>
                                            </tr>
                                            @endforeach

                                        </table>
                                        <br>
                                        {{ str_pad("", 41, "=") }}
                                        <div class="d-flex justify-content-between">
                                            <p>Total :</p>
                                            <p>Rp.{{number_format($transaksinow->total_harga)}}</p>
                                        </div>
                                        <p class="text-center pt-5">Terimakasih dan semoga harimu menyenangkan!</p>
                                        <div class="d-flex justify-content-center">{!! DNS1D::getBarcodeHTML($transaksinow->id_transaksi, "C128",3,60) !!}</div>
                                        <p class="text-center pt-3">Nama Warung</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>
</body>
</html>