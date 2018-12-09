@extends('layout.main')
@section('title' , 'Anggota')
@section('action','/anggota-search')
@section('content')
    <div class="container-fluid">
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
                                    <h5 class="mx-2">Rp {{$anggota->saldo()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            @endforeach   
        </div>
    </div>
@endSection