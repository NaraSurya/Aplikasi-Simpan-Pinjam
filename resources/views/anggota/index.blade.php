@extends('layout.main')
@section('title' , 'Anggota')
@section('content')
    <div class="container-fluid">
        <div class="row my-5">
            <div class="col-12 text-center">
                <h3>List Anggota</h3>
            </div>
        </div> 
        <div class="row mb-3">
            <div class="col-12 text-rigth">
                <a class="btn btn-md btn-purple-white" href="/anggota/create">new member</a>
            </div>
        </div>
        <div class="row">
            <table class="table table-dark">
                <tbody>
                    @foreach ($anggotas as $anggota)
                        <tr>
                        <td> 
                            <a href="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}">
                                <img src="{{ asset('/storage/anggota/'.$anggota->foto_profile) }}" width="25px" height="25px" class="rounded-circle" alt="">
                            </a>
                        </td>
                        <td>
                            {{$anggota->nama}}
                        </td>
                        <td>
                            {{$anggota->no_anggota}}
                        </td>
                        <td>
                            {{$anggota->saldo}}
                        </td>
                        <td>
                            <a href="/anggota/{{$anggota->id}}" class="btn btn-sm btn-info">lihat</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection