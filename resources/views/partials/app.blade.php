<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" type="image/x-icon">
    <title> @yield('title') - {{env('APP_NAME')}} </title>

    <!-- Bootstrap Library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">

    <!-- Styles -->
    <link href="{{ asset('backend/main.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">

    @stack('css')

</head>

<body>
    <div id="app" class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        @include('partials.header')

        <div class="app-main">

            @include('partials.sidebar')

            <div class="app-main__outer">
                <div class="app-main__inner">

                   @yield('content')

                </div>

                @include('partials.footer')

            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('backend/assets/scripts/main.js')}}"></script>
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('backend/js/script.js') }}"></script>

    <!-- Form Validation -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
    @include('sweetalert::alert')
    @stack('js')
</body>

</html>
