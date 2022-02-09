@extends('layouts.auth_app')
@section('title')
    Admin Login
@endsection
@section('content')
    <div class="card avi-border-green">
        <div class="card-header">
            <h4 class="avi-text-orange">Inicio de Sesión</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                        placeholder="Enter Email" tabindex="1"
                        value="{{ Cookie::get('email') !== null ? Cookie::get('email') : old('email') }}" autofocus
                        required>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Contraseña</label>
                        <div class="float-right">
                            {{-- <a href="{{ route('password.request') }}" class="text-small">
                                Forgot Password?
                            </a> --}}
                        </div>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                        value="{{ Cookie::get('password') !== null ? Cookie::get('password') : null }}"
                        placeholder="Enter Password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember"
                            {{ Cookie::get('remember') !== null ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Recordarme</label>
                    </div>
                </div>



                <div class="form-group">
                    <button type="submit" class="btn avi-boton-green btn-lg btn-block text-white" tabindex="4">
                        Login
                    </button>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <a class="" href="/register">Registrarme</a>
                </div>
            </form>
        </div>
    </div>
@endsection
