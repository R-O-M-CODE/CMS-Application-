<x-admin-master>
    @section('content')
        @if(Session::has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <h1>Permission For: {{$permission->name}}</h1>
                <form action="{{route('permissions.update', $permission->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$permission->name}}" name="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
