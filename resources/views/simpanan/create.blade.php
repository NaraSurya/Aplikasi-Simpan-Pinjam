@extends('layout.main')

@section('content')
<div class="container">
    <div class="card card border-primary mb-3 mt-4">
            <div class="card-header bg-transparent border-primary text-primary text-center">
              Tambah Simpanan
            </div>
            <div class="card-body text-primary">
              <form action="/simpanan" method="POST">
                @csrf
                <div class="form-group row">
                   <label for="colFormLabel" class="col-sm-2 col-form-label">ID Anggota</label>
                        <div class="col-sm-10">
                        <input type="number" name="id" class="form-control" id="colFormLabel" placeholder="Harap diisi">
                        <span>{!!$errors->first('id', '<p class="alert alert-danger" >:message</p>') !!}</span> 
                        </div>
                       
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nominal</label>
                        <div class="col-sm-10">
                        <input type="number" name="nominal" class="form-control" id="colFormLabel" placeholder="Harap diisi">
                        <span>{!!$errors->first('nominal', '<p class="alert alert-danger" >:message</p>') !!}</span> 
                        </div>
                   </div>
                   <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                        <input type="date" name="tanggal" class="form-control" id="colFormLabel" placeholder="Harap diisi" >
                        <span>{!!$errors->first('tanggal', '<p class="alert alert-danger" >:message</p>') !!}</span> 
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
</div> 
@endsection

   