@php
    if(isset(Auth::user()->view_mode) && Auth::user()->view_mode) {
        ##Noche
        $bg_data = [
            'bg_footerHeader' => 'secondary',
            'txt_footer' => 'white',
            'bg_body' => 'bg-dark text-white'
        ];
    }else {
        ### Dia
        $bg_data = [
            'bg_footerHeader' => 'info',
            'txt_footer' => 'dark',
            'bg_body' => 'bg-white text-dark'
        ];
    }
@endphp
@include('layouts.header')

    <main class="principal">
            @yield('contents')
            @yield('javascript')
    </main>

@include('layouts.footer')
