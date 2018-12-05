@extends('layout.main')
@section('title' , 'show')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <a href="/anggota/{{$anggota->id}}/edit">edit</a>
            </div>
            <div class="col-12 ">
            <form action="/anggota/{{$anggota->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">delete</button>
            </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}">
                    <img src="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}" width="100px" height="100px" alt="">
                </a>
            </div>
            <div class="col-12">
                <h5>{{$anggota->nama}}</h5>
            </div>
            <div class="col-12">
                <h5>{{$anggota->no_ktp}}</h5>
            </div>
            <div class="col-12">
                <h5>{{$anggota->jenis_kelamin}}</h5>
            </div>
            <div class="col-12">
                <h5>{{$anggota->tgl_lahir}}</h5>
            </div>
            <div class="col-12">
                <h5>{{$anggota->no_anggota}}</h5>
            </div>
            <div class="col-12">
                <h5>{{$anggota->no_tlp}}</h5>
            </div>
            <div class="col-12">
                    <h5>{{$anggota->saldo}}</h5>
            </div>
        </div>
    </div>
@endsection