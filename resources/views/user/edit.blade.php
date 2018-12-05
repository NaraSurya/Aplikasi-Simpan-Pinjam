<form id="user" method="POST" action="/user" enctype="multipart/form-data">
            @csrf
                    <div class="card-body">
                        <div class="form-group col ">
                            <label for="nama_gr">Nama</label>
                            <div class="input-container">
                               
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Harap diisi">
                            </div>    
                        </div>
                        <div class="form-row ml-2 ">
                            <div class="form-group col mr-4">
                                <label for="nis">NIK</label>
                                <div class="input-container">
                                    
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Harap diisi">
                                </div>      
                            </div>
                        </div>
                        <div class="form-group col ">
                            <label for="username">Username</label>
                            <div class="input-container">
                               
                                <input type="text" class="form-control" name="username" id="username" placeholder="Harap diisi">
                            </div>    
                        </div>
                        <div class="form-group col ">
                            <label for="pass">Password</label>
                            <div class="input-container">
                               
                                <input type="password" class="form-control" name="password" id="password" placeholder="Harap diisi">
                            </div>    
                        </div>
                        <div class="form-row ml-2 ">
                            <div class="form-row ml-2">
                                <div class="form-group col mr-3">
                                    <label for="user_role">Role</label>
                                    <div class="input-container">
                                            <select id="agama_gr" name="user_role" class="custom-select">
                                            <option selected disabled>Pilih Role</option>
                                            <option value="1">Pengelola Simpanan</option>
                                            <option value="2">Pengelola Pinjaman</option>
                                            <option value="3">User Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                                                                       
                         </div>  
                         <div class="btn-sub-edit my-5 text-center">
                            <button  type="submit" >Submit</button>
                        </div>
                    </div>
            
            
</form>