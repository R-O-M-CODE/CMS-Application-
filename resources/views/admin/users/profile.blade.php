<x-admin-master>
    @section('content')
        <h1>User Profile For: {{$user->name}}</h1>
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="{{route('user.profile.update', $user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="file"
                               class="form-control-file"
                               name="avatar">
                    </div>
                    <div>
                        <img class="img-profile rounded-circle" height="100px" src="{{$user->avatar}}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"
                               name="username"
                               class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}"
                               id="username"
                               aria-describedby=""
                               value="{{$user->username}}">
                        @error('username')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                               name="name"
                               class="form-control @error('username') is-invalid @enderror"
                               id="name"
                               aria-describedby=""
                               value="{{$user->name}}">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                               name="email"
                               class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                               id="email"
                               aria-describedby=""
                               value="{{$user->email}}">
                        @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                               id="password"
                               aria-describedby="">
                        @error('password')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control {{$errors->has('password-confirmation') ? 'is-invalid' : ''}}"
                               id="password-confirmation"
                               aria-describedby="">
                        @error('password-confirmation')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
