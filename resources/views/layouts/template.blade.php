@php
    $mostrarSololectura = true;
    if(isset(Auth::user()->view_mode) && Auth::user()->view_mode) {
        ##Noche
        $bg_data = [
            'bg_mode' => 'dark',
        ];
    }else {
        ### Dia
        $bg_data = [
            'bg_mode' => 'light',
        ];
    }
@endphp
@include('layouts.header')

    <main class="principal">
            @yield('contents')
            @yield('javascript')
    </main>

@include('layouts.footer')
