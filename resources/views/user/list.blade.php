<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h4 class="display-6">List User</h4>
                <table class="table table-borderless text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="font-color-grey">Nama</th>
                            <th scope="col" class="font-color-grey">NIK</th>
                            <th scope="col" class="font-color-grey">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-white my-5 align-middle">
                                <td class="align-middle">{{ $user->nama }}</td>
                                <td class="align-middle">{{ $user->nik }}</td>
                                <td class="align-middle">{{ $user->user_role }}</td>
                                <td><a href="/user/{{$user->id}}/edit " class="btn btn-primary">Edit</a></td>
                                <td><form method="POST" action="/user/{{$user->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger">Delete</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>