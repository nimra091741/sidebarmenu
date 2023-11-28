
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



        <button style=" width: 140px;
        height: 25px;">
            <div>{{ Auth::user()->name }}</div>

            <div class="ms-1  h-4 w-4">
                <svg class="fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">
  <path fill-rule="evenodd"
  {{-- d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1
    1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" --}}
     clip-rule="evenodd" />

                </svg>
            </div>
        </button>
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
