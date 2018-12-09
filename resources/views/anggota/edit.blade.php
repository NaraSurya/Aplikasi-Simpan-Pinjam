@extends('layout.main')
@section('title' , 'Pendaftaran')
@section('content')
    <div class="container-fluid">
        <div class="p-5 dark text-white">
            <div class="row mb-5">
                <div class="col-3">
                    <a href="/anggota/{{$anggota->id}}" class="btn btn-sm"><i class="fas fa-long-arrow-alt-left fa-2x"></i></a> 
                </div>
                <div class="col-9 text-right">
                    <h4>Form Edit Anggota</h4>
                </div>
            </div>
            <form action="/anggota/{{ $anggota->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control dark-light" type="text" name="nama" value="{{$anggota->nama}}" id="nama">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="no_ktp">No KTP</label>
                            <input class="form-control" type="text" name="no_ktp" value="{{$anggota->no_ktp}}"  id="no_ktp">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input class="form-control" type="text" name="alamat" value="{{$anggota->alamat}}"  id="alamat">
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="no_tlp">No Telepon</label>
                            <input class="form-control" type="text" name="no_tlp" value="{{$anggota->no_ktp}}"  id="no_tlp">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="tgl-lahir">tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir" value="{{$anggota->tgl_lahir}}"  id="tgl_lahir">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                            <div class="form-group">
                                    <input type="radio" value="L" name="jenis_kelamin" @if ($anggota->jenis_kelamin == 'L') checked @endif class="">
                                    <label class="mx-3" for="jenis_kelamin"> Laki-laki</label>
                                    
                                    <input type="radio" value="P" name="jenis_kelamin"  @if ($anggota->jenis_kelamin == 'P')  checked  @endif class="">
                                    <label class="mx-3" for="jenis_kelamin">Perempuan</label>
                            </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto_profile" id="foto_profile">
                                <label class="custom-file-label" for="customFile">Foto profile</label>
                                </div>
                            </div>
                    </div>
                </div>
                
                
                
                
                <input type="hidden" name="user_id" value="1">
                <div class="col-12 text-right mt-5">
                    <button class="btn purple-gradient">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection