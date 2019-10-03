<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Cadastro de produtos</title>
    <!--<meta name="csrf-token" content="{{csrf_token()}}"> -->
    <style>
        body{
            padding: 0;
        }

        .navbar{
            margin-bottom: 20px;
        }

        body > .container{
            margin: 0 !important;
            padding: 0 !important;
            max-width: 100vw;
        }
    </style>
</head>
<body>
    <div class="container">
        @component('navbar')
        @endcomponent
        <main role="main">
            @hasSection ('body')
                @yield('body')
            @endif
        </main>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    
    @hasSection('javascript')
        @yield('javascript')
    @endIf
</body>
</html>