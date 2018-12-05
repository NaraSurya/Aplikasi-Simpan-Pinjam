@extends('layout.main')
@section('action','/simpanan-search')

@section('content')
<table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">No Anggota</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">KTP</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td>{{$anggotas->no_anggota}}</td>
          <td>{{$anggotas->nama}}</td>
          <td>{{$anggotas->alamat}}</td>
          <td>{{$anggotas->no_tlp}}</td>
          <td>{{$anggotas->no_ktp}}</td>
          <td>{{$anggotas->tgl_lahir}}</td>
          <td>{{$anggotas->jenis_kelamin}}</td>
          </tr>
         
        </tbody>
      </table> 
        Saldo
        <table class="table table-dark">
            <tbody>
             <tr>
               <th>Saldo</th>
             </tr>
            </tbody>
            <tr>
                <td>
                     {{$anggotas->saldo()}}
                </td>
            </tr>
          </table>

          <div class="card card border-primary mb-3 mt-4">
              <div class="card-header bg-transparent border-primary text-primary text-center">
                Tambah Simpanan
              </div>
              <div class="card-body text-primary">
                <form action="/simpanan" method="POST">
                  @csrf
                <input type="hidden" name="anggota_id" class="form-control" value="{{$anggotas->id}}" placeholder="Harap diisi">
                    <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Nominal</label>
                          <div class="col-sm-10">
                          <input type="number" name="nominal" class="form-control" id="colFormLabel" placeholder="Harap diisi">
                          <span>{!!$errors->first('nominal', '<p class="alert alert-danger" >:message</p>') !!}</span> 
                          </div>
                     </div>
                
                     <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Jenis Transaksi</label>
                          <div class="col-sm-10">
                              <select class="custom-select" name="jenis">
                                  <option disabled selected value> -- Pilih Jenis Transaksi -- </option>
                                  @foreach($traks as $trak)
                                  <option value="{{$trak->id}}">{{$trak->transaksi}}</option>
                              @endforeach
                              </select>
                              <span>{!!$errors->first('jenis', '<p class="alert alert-danger" >:message</p>') !!}</span> 
                          </div>
                      </div>
                   
                     <div class="text-center">
                           <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    </div>
               </form>
              </div>
            </div>
      

@endsection
