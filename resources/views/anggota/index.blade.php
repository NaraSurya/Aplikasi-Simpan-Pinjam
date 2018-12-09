@extends('layout.main')
@section('title' , 'Anggota')
@section('action','/anggota-search')
@section('content')
   <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="card m-0 purple-gradient border-0 ">
                            <div class="card-body p-0">
                                <div class="row ">
                                    <div class="col-7">
                                        <h6 class="mx-3 mt-3">Jumlah Anggota</h6>
                                    </div>
                                    <div class="col-5 text-center">
                                        <h4 class=" mt-2 mb-0">{{$anggotas->count()}}</h4>
                                        <p class="text-center">anggota</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="/anggota/create" class="btn btn-purple-white btn-sm mb-2">new Anggota</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($anggotas->sortByDesc('saldo')->take(3) as $anggota)
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="card m-0 purple-gradient border-0 h-100">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}">
                                                <img src="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}" width="75px" height="75px" alt="">
                                            </a>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-12 text-right">
                                                    <a class="btn btn-sm btn-purple-white" href="/anggota/{{$anggota->id}}"> <i class="fas fa-external-link-square-alt fa-lg"></i></a>
                                                </div>
                                                <div class="col-12">
                                                    <h5>{{$anggota->nama}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 my-2 ">
                                            <h6 class="mx-2">Saldo</h6>
                                        </div>
                                        <div class="col-9 text-right">
                                            <h5 class="mx-2">Rp {{$anggota->saldo}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                 
                    @endforeach   
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="w-100 h-100 bg-dark">

                </div>
            </div>
        </div>
        <div class="row my-5 mb-3">
            <div class="col-6">
                <h5>List Anggota</h5>
            </div>
            <div class="col-6 text-right">
                <h6>Order By oldest</h6>
            </div>
        </div>
        <div class="row">
            @foreach ($anggotas->sortByDesc('id') as $anggota)
            <div class="col-sm-6 col-md-3 mb-3">
                    <div class="card m-0 purple-gradient border-0 h-100">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-2">
                                    <a href="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}">
                                        <img src="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}" width="50px" height="50px" alt="">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="mt-1">{{$anggota->nama}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                        <a class="text-white" href="/anggota/{{$anggota->id}}"> <i class="fas fa-external-link-square-alt fa-lg"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 my-2 ">
                                    <h6 class="mx-2">Saldo</h6>
                                </div>
                                <div class="col-9 text-right">
                                    <h5 class="mx-2">Rp {{$anggota->saldo}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            @endforeach   
        </div>
   </div>
@endsection

