<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Products</title>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
    @livewireStyles()
      <style>
        .nav {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 60px;
            width: 99%;
            min-width: 300px;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(3, 3, 3) 180%);
            padding-right: 20px;

        }

        .nav ul {
            float: right;
        }

        .nav ul li {
            margin: 5px;
            display: inline;
        }

        .nav ul li button {
            font-size: 0.9rem;
            color: rgb(255, 255, 255);
            height: 25px;
            width: 65px;
            border: none;
            font-family: Verdana;
            background: none;
            transition: transform 0.2s;
        }

        .nav ul li button:hover {
            transform: scale(1.1);
        }

        .nav ul li form {
            display: inline;
        }

        .nav ul li form button,
        .nav ul li form button:hover {
            height: 25px;
            width: 80px;
        }

        .nav ul li input {
            border: 1px solid white;
            border-radius: 4px;
            height: 25px;
            width: 100px;
            /* Adjust the width as needed */
        }

        .nav ul li input:hover,
        .nav ul li input:focus {
            border-color: rgb(10, 119, 83);
        }


        .sidebar {
            display: block;
            /* overflow: hidden; */
            margin-top: 5px;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
            height: 700px;
            width: 300px;
        }


        .sidebar ul {
            margin: 0px;
            padding: 20px 0 0px 15px;
        }

        .sidebar ul li {
            align-items: flex-end;
            display: block;
            margin: 10px;
            float: left;
        }

        .sidebar ul li button {
            font-size: 0.9rem;
            transition: transform 0.2s;
            color: white;
            font-family: Verdana;
            width: 84px;
            height: 25px;
            border: none;
            font-family: Verdana;
            background: none;
            text-align: left;
            padding-left: 10px;

        }

        .sidebar ul li button:hover {
            transform: scale(1.1);

        }

        .sidebar ul hr {
            padding: 0 -20px 0 0px;
            width: 240px;
        }

        @media (max-width: 800px) {

            .nav {
                width: 122%;
            }

            .nav ul {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
  @include('dashboard')
    @livewire('updateproduct',['id' =>request('id')])
    @livewireScripts
</body>
</html>
