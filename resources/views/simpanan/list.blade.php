   @extends('layout.main')
       
   @endsection
   @section('style')
   <style>
          a{
              color: white;
              text-decoration: none;
          }
  
          a:hover{
              color:white; 
              text-decoration:none; 
              cursor:pointer;  
          }
   </style>    
   @endsection
   @section('content')
   <div class="container">


    
    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Anggota</th>
                <th scope="col">Jenis Transaksi</th>
                <th scope="col">Nominal</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Edit</th>
                {{-- <th scope="col">Delete</th> --}}
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
                            </button>
                        </td>
                        {{-- <td>
                            <form action="/simpanan/{{$simpanan->id}}" method="POST">
                                @csrf
                                @method('DELETE')    
                                <button type="submit" class="btn btn-outline-danger text-white">Delete</button>              
                            </form>                           
                        </td> --}}
                           
                    </tr>
                @endforeach 
            </tbody>
          </table>

          <div class="text-center">
            <button class="btn btn-outline-success"> 
                <a href="/simpanan/create"> Insert </a>
            </button>
          </div>
         
</div> 

   @endsection
   