<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body {
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(3, 3, 3));
        }

        .con {
            height: 430px;
            width: 100%;
            text-align: center;
        }

        .con h1 {
            height: 110px;
            line-height: 110px;
            /* Center the text vertically within the fixed height */
            color: white;
            overflow: hidden;
            font-size: 5rem;
        }

        .con button {
            font-family: Verdana;
            border: none;
            color: white;
            background: none;
            /* transition: font-size 0.7s; */
        }

        .con button:hover {
            font-size: 1rem;
            width: 84px;
            height: 25px;
            background-color: white;
            border-radius: 4px;
            color: black;
        }
    </style>




</head>

<body>
    <div class="con">
        <h1>Welcome to POS</h1>

        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <button style="width:100px;"onclick="window.location.href='{{ route('dashboard') }}'">Dashboard</button>
                @else
                    <button onclick="window.location.href='{{ route('login') }}'">Login</button>
                    @if (Route::has('register'))
                        <button onclick="window.location.href='{{ route('register') }}'">Register</button>
                    @endauth
            </div>
        @endif

    </div>
</body>

</html>
{{-- <button><a href="{{ route('register') }}">Register</a></button> --}}
@endif
