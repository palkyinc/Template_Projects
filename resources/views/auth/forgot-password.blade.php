@extends('layouts.template')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Restablecer Password') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <p class="card-text">Revisá tus emails para continuar el restablecimiento de password. </p>
                        <p class="card-text">Status: {{session('status')}} </p>
                    @else
                        
                    <p class="card-text">
                        ¿Olvidaste tu contraseña? o ¿Quieres cambiarla? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.
                    </p>
                    
                    <!-- Session Status -->
                    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                    
                    <!-- Validation Errors -->
                    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            
                            <!-- Email Address -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Dirección de E-Mail') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Email Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection