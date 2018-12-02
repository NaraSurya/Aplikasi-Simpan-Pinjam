@extends('layout.main')
@section('title' , 'Anggota')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-12 mb-2">
                        <h5 class="text-dark-blue">Anggota</h5>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="/anggota/create" class="btn purple-gradient">create</a>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <tbody>
                    @foreach ($anggotas as $anggota)
                        <tr>
                            <td>{{ $anggota->no_ktp}}</td>
                            <td>{{ $anggota->nama}}</td>
                            <td><a href="/anggota/{{$anggota->id}}" class="btn purple-gradient">show</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>  
@endsection