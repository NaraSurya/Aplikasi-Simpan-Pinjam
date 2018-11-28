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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
            <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Anggota</th>
                        <th scope="col">Jenis Transaksi</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($simpanans as $simpanan)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$simpanan->anggota_id}}</td>
                                <td>{{$simpanan->transaksi->transaksi}}</td>
                                <td>{{$simpanan->nominal_transaksi}}</td>
                                <td>{{$simpanan->tanggal}}</td>
                                <td>
                                    <button class="btn btn-outline-primary">
                                        <a href="/simpanan/{{$simpanan->id}}/edit">Edit</a>
                                    </button>||
                                    
                                    <form action="/simpanan/{{$simpanan->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')    
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>                  
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                  </table>

                  <button class="btn btn-outline-success"> 
                      <a href="/simpanan/create"> Insert </a>
                      
                  </button>
    </div> 
</body>
</html>
