@extends('layout.main')
@section('title' , 'Pendaftaran')
@section('content')
    <div class="container-fluid">
        <div class="mx-5 mt-5">
            <form action="/anggota" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input class="form-control" type="text" name="nama" id="nama">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input class="form-control" type="text" name="alamat" id="alamat">
                </div>
                <div class="form-group">
                    <label for="no_ktp">No KTP</label>
                    <input class="form-control" type="text" name="no_ktp" id="no_ktp">
                </div>
                <div class="form-group">
                    <label for="no_tlp">No Telepon</label>
                    <input class="form-control" type="text" name="no_tlp" id="no_tlp">
                </div>
                <div class="form-group">
                        <input type="radio" value="L" name="jenis_kelamin" class="">
                        <label class="" for="jenis_kelamin"> Laki-laki</label>
                      
                      
                        <input type="radio" value="P" name="jenis_kelamin" class="">
                        <label class="" for="jenis_kelamin">Perempuan</label>
                     
                </div>
                <div class="form-group">
                    <label for="tgl-lahir">tanggal Lahir</label>
                    <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto_profile" id="foto_profile">
                        <label class="custom-file-label" for="customFile">Foto profile</label>
                      </div>
                </div>
                <input type="hidden" name="user_id" value="1">
                <div class="col-12">
                    <button class="btn purple-gradient">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection