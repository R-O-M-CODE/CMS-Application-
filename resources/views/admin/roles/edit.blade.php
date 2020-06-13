<x-admin-master>
    @section('content')

        <div class="row">
            <div class="col-md-6">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <h1>Edit Role: {{$role->name}}</h1>
                <form action="{{route('roles.update', $role->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$role->name}}" name="name" id="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        <div class="row">
            @if($permissions->isNotEmpty())
                <div class="col-md-12 mt-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td><input type="checkbox"
                                            @foreach($role->permissions as $role_permission)
                                                @if($role_permission->slug == $permission->slug)
                                                    checked
                                                @endif
                                            @endforeach
                                                ></td>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->slug}}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-warning mx-1"><i class="fas fa-edit"></i></a>
                                            <form method="post" action="{{route('roles.destroy', $role)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mx-1"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    @endsection
</x-admin-master>
