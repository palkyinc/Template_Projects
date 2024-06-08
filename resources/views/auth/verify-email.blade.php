@extends('layouts.template')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="/img/7763740_messaging_we_chat_icon.svg" class="card-img-top" style="width: 12rem;" alt="Company-logo">
                    <div class="card-body">
                        <h5 class="card-title">Anuncio</h5>
                        <p class="card-text">
                            Gracias por registrarte! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.
                        </p>

                        @if (session('status') == 'verification-link-sent')
                            <p class="card-text">
                                Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.
                            </p>
                        @endif

                        <div class="">
                            <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <button type="submit" class="btn btn-secundary">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection