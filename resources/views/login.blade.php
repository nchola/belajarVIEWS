<html dir="ltr" lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="container-fluid" style="min-height: 100vh">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="card w-100 mt-5" style="max-width: 400px">
                            <div class="card-body">
                                <h3 class="text-center mt-2">Login Admin</h3>

                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" placeholder="Masukkan username"
                                            name="username" value="{{ old('username') }}">
                                        <small class="text-danger">{{ $errors->first('username') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Password</label>
                                        <input type="password" class="form-control" placeholder="Masukkan password"
                                            name="password" value="">
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    </div>
                                    <button class="btn btn-primary mt-2 w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('layouts.scripts')
    @stack('scripts')
    @if ($errors->first('login_fail'))
        <script>
            $(function() {
                alert('{{ $errors->first('login_fail') }}')
            })
        </script>
    @endif
</body>

</html>
