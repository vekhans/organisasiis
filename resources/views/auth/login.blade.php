<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'ITDM') }}</title>
    <!-- Required meta tags -->
     <link rel="stylesheet" href="{{asset('dogin/bootstrap.min.css')}}">
     
    <!-- <link rel="icon" type="image/x-icon" href="assets/login.jpg"/> -->
    <link rel="icon" href="{{asset('media/logo.png')}}" type="image/png" sizes="206x16">
</head>
<body>
    <div style="background-image: url('dogin/login.jpg')">
        <div class="modal-dialog   modal-dialog-centered  " role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-sm-10 py-sm-10 ">
                        <div class=" bg-light rounded ">
                            <div class="text-center" >
                                <img src="{{asset('dogin/img/fire.svg')}}" alt="">
                            </div>
                            <h2 class="pt-sm-3 text-center"></h2>
                            <p class="text-muted text-center">
                                Masuk dengan Passowd Yang sudah terdaftar.
                            </p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Alamat Email</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>@if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                Simpan di Perangkat ini...
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Masuk
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Lupa Password?
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <div class="pt-3 ">
                                <small><a href="{{ url('/') }}">Beranda</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>