<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
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
</body>
</html>
