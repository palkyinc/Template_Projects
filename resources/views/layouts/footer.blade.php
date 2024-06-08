    <footer class="bg-{{$bg_data['bg_footerHeader']}} fixed-bottom text-{{$bg_data['txt_footer']}} text-center p-2">
        Developed by Palky Inc. &copy;{{env('APP_NAME')}}.v{{Config::get('constants.APP_VERSION')}} - 2024
       | Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
</body>
</html>