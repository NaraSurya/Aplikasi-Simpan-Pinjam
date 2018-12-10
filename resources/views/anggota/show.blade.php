@extends('layout.main')
@section('title' , 'show')
@section('action','/anggota-search')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="row pt-3 pl-3 pb-3 pr-1 dark">
                    <div class="col-sm-12 col-md-3">
                        <a href="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}">
                            <img src="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}" width="100px" height="100px"  class="rounded" alt="">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="mb-0">nama</h6>
                                <h5 class="text-white">{{$anggota->nama}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <h6 class="mb-0">No Anggota</h6>
                                <h5 class="text-white">{{$anggota->no_anggota}}</h5>
                            </div>
                            <div class="col-4 px-2">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                                <h5 class="text-white">
                                    @if ($anggota->jenis_kelamin == 'L')
                                        Laki Laki 
                                    @else
                                        Perempuan
                                    @endif
                                </h5>
                            </div>
                            <div class="col-4">
                                <h6 class="mb-0">Telepon</h6>
                                <h5 class="text-white">{{$anggota->no_tlp}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row dark">
                    <div class="col-8">
                        <h6 class="mb-0">Alamat</h6>
                        <h5 class="text-white">{{$anggota->alamat}}</h5>
                    </div>
                    <div class="col-4">
                        <h6 class="mb-0">Nomer KTP</h6>
                        <h5 class="text-white">{{$anggota->no_ktp}}</h5>
                    </div>
                </div>
                <div class="row dark">
                    <div class="col-6 text-right">
                        <a href="/anggota/{{$anggota->id}}/edit" class="btn btn-success btn-sm my-3">Edit</a>
                    </div>
                    <div class="col-6">
                        <form action="/anggota/{{$anggota->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger my-3" type="submit">delete</button>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 dark border-right" style="border-color : #656C76;">
                        <div class=" py-2 ">
                            <h6>Saldo</h6>
                            <h5 class="text-white">Rp {{$anggota->saldo()}}</h5>
                        </div>
                    </div>
                    <div class="col-6 dark">
                        <div class="py-2">
                            <h6>Total Bunga</h6>
                            <h5 class="text-white">Rp {{$anggota->total_bunga()}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dark w-100 h-100">
                    <canvas id="riwayatChart">

                    </canvas>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="row">
                <div class="col-12">
                    <h5 class="text-dark-blue">Riwayat Transaksi</h5>
                </div>
            </div>
            <div class="col-12 dark">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jenis Transaksi</th>
                            <th scope="col">Debet</th>
                            <th scope="col">Kredit</th>
                            <th scope="col">Saldo</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">
                        @foreach ($anggota->simpanan as $transaksi)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$transaksi->tanggal}}</td>
                                <td>{{$transaksi->transaksi->transaksi}}</td>
                                <td>{{$transaksi->debit()}}</td>
                                <td>{{$transaksi->kredit()}}</td>
                                <td>Rp {{$anggota->saldoAt($transaksi->id)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var labels = {!! json_encode($labels)  !!}
        var datas = {!! json_encode($datas) !!}
        var ctx = document.getElementById('riwayatChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: labels,
                datasets: [{
                    label: "History Saldo",
                    borderColor: 'rgb(27,40,247)',
                    data: datas,
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
                
            }
        });
    </script>
@endsection

