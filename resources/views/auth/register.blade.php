@extends('layouts.auth_app')
@section('title')
    Registro
@endsection
@section('content')
    <div class="card avi-border-green">
        <div class="card-header">
            <h4 class="avi-text-orange">Registro</h4>
        </div>

        <div class="card-body pt-1">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">Nombre completo:</label><span class="text-danger">*</span>
                            <input id="firstName" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                tabindex="1" placeholder="Enter Full Name" value="{{ old('name') }}" autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Correo:</label><span class="text-danger">*</span>
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="Enter Email address" name="email" tabindex="1" value="{{ old('email') }}"
                                required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Contraseña
                                :</label><span class="text-danger">*</span>
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Set account password" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label">Confirmar Contraseña:</label><span
                                class="text-danger">*</span>
                            <input id="password_confirmation" type="password" placeholder="Confirm account password"
                                class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                name="password_confirmation" tabindex="2">
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn text-white avi-boton-green btn-lg btn-block" tabindex="4">
                                Registrar
                            </button>
                        </div>
                    </div>

                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="/login">Iniciar Sesión</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Already have an account ? <a href="{{ route('login') }}">SignIn</a>
    </div>
@endsection
