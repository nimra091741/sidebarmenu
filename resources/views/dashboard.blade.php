<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First View</title>
    <style>
        .nav {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 60px;
            width: 99%;
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
            /* overflow: auto; */
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
    </style>
</head>

<body>

    <div class="nav">
        <ul>

            <li> <button onclick="window.location.href='{{ route('productlisting') }}'">Home</button></li>
            <li><button onclick="window.location.href='{{ route('salelisting') }}'">Sales</button></li>
            <li><button style="width:100px;" onclick="window.location.href='{{ route('saledetaillisting') }}'">Sale Details</button></li>
            <li><button onclick="window.location.href='{{ route('profitexpenselisting') }}'">Profit</button></li>
            <li><button>About</button></li>
            <li><input type="search" name="" id=""></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button method="POST" onclick="window.location.href='{{ route('logout') }}'">Log out</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="sidebar">

        <ul>
            <li><button>Dashboard</button> </li>
            <hr>
            <li><button>Joining</button></li>
            <hr>
            <li><button>Contact</button></li>
            <hr>
            <li><button>About</button> </li>
            <hr>
            <li><button>Joining</button></li>
            <hr>
            <li><button>Contact</button></li>
            <hr>
            <li><button>About</button> </li>
        </ul>



    </div>

</body>

</html>
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First View</title>
    <style>
        .nav {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 60px;
            width: 99%;
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

        }

        .nav ul li input {
            border: 1px solid white;
            border-radius: 4px;
        }

        .nav ul li input:hover {
            border-color: rgb(10, 119, 83);
        }

        .nav ul li input:focus {
            border-color: rgb(10, 119, 83);
        }

        .nav ul li button:hover {

            border-radius: 3px;
        }

        .sidebar {
            display: block;
            /* overflow: auto; */
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
            width: 84px;
            height: 25px;
            border-radius: 3px;
            text-align: left;
            padding-left: 10px;
        }

        .sidebar ul hr {
            padding: 0 -20px 0 0px;
            width: 240px;
        }
    </style>
</head>

<body>

    <div class="nav">
        <ul>

            <li><button>Home</button></li>
            <li><button>Classes</button></li>
            <li><button>Joining</button></li>
            <li><button>Contact</button></li>
            <li><button>About</button></li>
            <li><input type="search" name="" id=""></li>
        </ul>
    </div>


    <div class="sidebar">

        <ul>
            <li><button>Dashboard</button> </li>
            <hr>
            <li><button>Joining</button></li>
            <hr>
            <li><button>Contact</button></li>
            <hr>
            <li><button>About</button> </li>
            <hr>
            <li><button>Joining</button></li>
            <hr>
            <li><button>Contact</button></li>
            <hr>
            <li><button>About</button> </li>
        </ul>



    </div>

</body>

</html> --}}
