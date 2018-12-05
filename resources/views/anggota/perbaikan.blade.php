@extends('layout.main')
@section('title' , 'Anggota')
@section('content')
   <div class="container-fluid">
        <div class="row">
            <div  class="col-sm-12 col-md-6">
                <div class="row card-deck">
                    <div class=" col-sm-12 col-md-6 card w-100 h-100 p-3 border-0 purple-gradient">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-users fa-3x text-purple"></i>
                            </div>
                            <div class="col-6">
                                <div class="ml-4">
                                    <h4 class="mb-0">255</h4>
                                    <p class="mb-0 text-purple">Total Anggota</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center mt-2">
                                    <a href="/anggota/create" class="btn btn-md btn-purple-white"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 card w-100 p-0 h-100 border-0 purple-gradient">
                        <div class="row mb-1">
                            <div class="col-3">
                                    <a href="{{ asset('/storage/anggota/'.$anggotas->foto_profile) }}">
                                        <img src="{{ asset('/storage/anggota/'.$anggotas->foto_profile) }}" width="50px" height="50px" alt="">
                                    </a>
                            </div>
                            <div class="col-9">
                            <h6 class="mt-1">{{$anggotas->nama}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 flex-column">
                                <p class="mx-3 mb-2">saldo</p>
                            </div>
                            <div class="col-8 flex-column">
                                <h5 class="mx-3 mb-2">Rp 21.000.000.000</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 card w-100 p-0 h-100 border-0 purple-gradient">
                            <div class="row mb-1">
                                <div class="col-3">
                                        <a href="{{ asset('/storage/anggota/'.$anggotas->foto_profile) }}">
                                            <img src="{{ asset('/storage/anggota/'.$anggotas->foto_profile) }}" width="50px" height="50px" alt="">
                                        </a>
                                </div>
                                <div class="col-9">
                                <h6 class="mt-1">{{$anggotas->nama}}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 flex-column">
                                    <p class="mx-3 mb-2">saldo</p>
                                </div>
                                <div class="col-8 flex-column">
                                    <h5 class="mx-3 mb-2">Rp 21.000.000.000</h5>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>  
@endsection