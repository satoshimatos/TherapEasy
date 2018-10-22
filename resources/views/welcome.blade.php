<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TherapEasy</title>

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
                height: 90vh;
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
                font-size: 70px;
                margin-bottom: 30px;
            }
        </style>
        <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">
        <link rel="manifest" href="{{ asset('manifest.json') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Cadastro</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <img src="images/icone-ajst.jpg" height="300" width="300" />
                <h1>TherapEasy</h1>
                <div>
                    <b>
                        A sua central de informações<br>
                        com seus clientes.
                    </b>
                </div>
            </div>
        </div>
        <footer class="row">
            <div id="copyright" align="center">
                <b>Versão 4.0.0</b>
            </div>
        </footer>
    </body>
</html>
