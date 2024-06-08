@extends('layouts.template')

@section('contents')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cambiar Password') }}</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" :value="__('Email')" />

                            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button>
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection