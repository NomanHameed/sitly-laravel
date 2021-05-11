<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Day Care') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/jquery.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>0
    <script src="{{ asset('js/jquery.steps.js') }}" defer></script>
    <script src="{{ asset('js/jquery.validate.js') }}" defer></script>
    <script src="{{ asset('js/datepicker.js') }}" defer></script>
    <script src="{{ asset('js/functions.js') }}" defer></script>
    @stack('footer')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>--}}
    <script>
        $(document).ready(function() {

            $("#form")
                .steps({
                    bodyTag: "fieldset",
                    onStepChanging: function (event, currentIndex, newIndex) {
                        // Always allow going backward even if the current step contains invalid fields!
                        if (currentIndex > newIndex) {
                            return true;
                        }
                        // Forbid suppressing "Warning" step if the user is to young
                        if (newIndex === 3 && Number($("#age").val()) < 18) {
                            return false;
                        }
                        var form = $(this);
                        // Clean up if user went backward before
                        if (currentIndex < newIndex) {
                            // To remove error styles
                            $(".body:eq(" + newIndex + ") label.error", form).remove();
                            $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                        }
                        // Disable validation on fields that are disabled or hidden.
                        form.validate().settings.ignore = ":disabled,:hidden";
                        // Start validation; Prevent going forward if false
                        return form.valid();
                    },
                    onStepChanged: function (event, currentIndex, priorIndex) {
                        // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                        if (currentIndex === 2 && priorIndex === 3) {
                            $(this).steps("previous");
                            return;
                        }
                        // Suppress (skip) "Warning" step if the user is old enough.
                        if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                            $(this).steps("next");
                        }
                    },
                    onFinishing: function (event, currentIndex) {
                        var form = $(this);
                        // Disable validation on fields that are disabled.
                        // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                        form.validate().settings.ignore = ":disabled";
                        // Start validation; Prevent form submission if false
                        return form.valid();
                    },
                    onFinished: function (event, currentIndex) {
                        var form = $(this);
                        // Submit form input
                        form.submit();
                    },
                })
                .validate({
                    errorPlacement: function (error, element) {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password",
                        },
                    },
                });
            $('[data-toggle="datepicker"]').datepicker({
                format: 'yyyy-mm-dd'
            });

        });
    </script>
</body>
</html>
