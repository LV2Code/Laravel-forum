<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                   {{--  @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a> --}}
                    @endauth
                </div>
            @endif

            <div class="content">

                <a href="{{ route('forums.index') }}" style="color: #636b6f; text-decoration: none;" class="title m-b-md">
                    Laravel Forum
                </a>

                <span>
                    
                    <h3> Access With &nbsp; <i class="fas fa-arrow-down"></i> </h3> 

                </span> <hr>

                <div class="links">

                    <a href="{{ route( 'social.auth', [ 'provider' => 'github' ] ) }}">GitHub</a>
                    <a href="{{ route( 'login' ) }}">Already Have Account</a>
                    <a href="{{ route( 'register' ) }}">Create An Account</a>

                </div>
            </div>
        </div>
    </body>
</html>
