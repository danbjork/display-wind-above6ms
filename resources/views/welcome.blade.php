<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wind Application</title>

        <!-- Fonts -->
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
                width: 100%;
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

            @keyframes brand-flash {
                0% {opacity: .9; box-shadow: none; }
                10% {opacity: .9; box-shadow: none; }
                50% {opacity: .3; box-shadow: 0px 0px 0px 0px rgba(158, 219, 217, 1); }
                90% {opacity: .9; box-shadow: none; }
                100% {opacity: .9; box-shadow: none; }
            }

            .navbar-brand img{
                animation-name: brand-flash;
                animation-duration: 10s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;

                &:hover {
                    animation-name: none;
                    opacity: 1;
                    box-shadow: 0px 0px 0px 0px rgba(158, 219, 217, 1);
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <span class="navbar-brand">
                        <img class="img-responsive2" style="width: 50%" src="{{ url('images/test.svg') }}">
                    </span>
                </div>
            </div>
        </div>
    </body>
</html>
