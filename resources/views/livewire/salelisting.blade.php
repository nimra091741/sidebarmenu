{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="your-styles.css">
    <!-- Include any other styles or scripts you need -->
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .content {
            flex-direction: column;
            width: 1125px;
            box-sizing: border-box;
            height: 100px;
            margin: -644px 0 0px 375px;
        }

        .content button {
            height: 27px;
            width: 59px;
            border: none;
            border-radius: 3px;
            color: white;
            font-family: Verdana;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
            /* background-color: rgb(0, 0, 0); */
        }
        .content button:hover {
            animation: shake 0.5s;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25%,
            75% {
                transform: translateX(-1px);
            }

            50% {
                transform: translateX(1px);
            }
        }
    </style>


</head>

<body>

    <div class="container">
        @include('dashboard')

        <div class="content">
            <button><a wire:click="create">Create</a></button>
            <br><br>
            @if (session()->has('delete'))
                <div
                    style="background-color: red;color:white; border: none; border-radius: 3px; display: flex; align-items: center; justify-content: center; height: 30px; width: calc(100% - 10px);">

                    {{ session('delete') }}
                </div>
            @elseif (session()->has('message'))
                <div
                    style="background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));color:white; border: none; border-radius: 3px; display: flex; align-items: center; justify-content: center; height: 30px; width: calc(100% - 10px);">
                    {{ session('message') }}
                </div>
            @endif


            @foreach ($sales as $item)
                <h4>{{ $item->total_amount }}|{{ $item->expenditure }}|{{ $item->profit }}|{{ $item->date }}
                </h4>

                 <button><a href="{{ url('/readsales/' . $item->id) }}"
                    style="color: white !important; text-decoration:none;">Read</a></button>

                <button><a href="{{ url('/updatesales/' . $item->id) }}"
                    style="color: white !important; text-decoration:none;">Update</a></button>

                <button><a wire:click="delete({{ $item->id }})">Delete</a></button>
            @endforeach
        </div>
    </div>

</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="your-styles.css">
    <!-- Include any other styles or scripts you need -->
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .content {
            flex-direction: column;
            width: 1125px;
            box-sizing: border-box;
            height: 100px;
            margin: -644px 0 0px 375px;
        }

        .internal {

            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* Adjust as needed */
        }

        .item {
            padding:15px;
            background-color: rgb(225, 241, 222);
            border-radius: 5px;
            width: calc(33.33% - 10px); /* Adjust as needed */
            box-sizing: border-box;
            margin-bottom: 20px; /* Add margin between items */
        }

        .content .btn button{
            height: 27px;
            width: 59px;
            border: none;
            border-radius: 3px;
            color: rgb(255, 255, 255);
            font-family: Verdana;
            background-color: rgb(10, 119, 83);
            margin-top: 5px; }

        .content .internal .item button {
            height: 27px;
            width: 59px;
            border: none;
            border-radius: 3px;
            color: rgb(10, 119, 83);
            font-family: Verdana;
            background-color: rgb(225, 241, 222);
            margin-top: 5px; /* Add margin between buttons */
        }


        .content button:hover a {
            color: white !important;
        }
        .content button:hover {

            animation: shake 0.1s;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
        }

        @keyframes shake {
            0%,
            100% {
                transform: translateX(0);
            }

            25%,
            75% {
                transform: translateX(-1px);
            }

            50% {
                transform: translateX(1px);
            }
        }
    </style>
</head>

<body>

    <div class="container">
        @include('dashboard')

        <div class="content">
            <div class="btn">
            <button ><a wire:click="create">Create</a></button></div>
            <br><br>
            @if (session()->has('delete'))
                <div
                    style="background-color: red;color:white; border: none; border-radius: 3px; display: flex; align-items: center; justify-content: center; height: 30px; width: calc(100% - 10px);">

                    {{ session('delete') }}
                </div>
            @elseif (session()->has('message'))
                <div
                    style="background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));color:white; border: none; border-radius: 3px; display: flex; align-items: center; justify-content: center; height: 30px; width: calc(100% - 10px);">
                    {{ session('message') }}
                </div>
            @endif
            <div class="internal">
                @foreach ($sales as $item)
                    <div class="item">
                        <p>{{ $item->total_amount }}|{{ $item->expenditure }}|{{ $item->profit }}</p>

                        <button><a href="{{ url('/readsales/' . $item->id) }}"
                                style="   color: rgb(10, 119, 83); text-decoration:none;">Read</a></button>

                        <button><a href="{{ url('/updatesales/' . $item->id) }}"
                                style="color: rgb(10, 119, 83); text-decoration:none;">Update</a></button>

                        <button><a wire:click="delete({{ $item->id }})"
                            style=" color: rgb(10, 119, 83); text-decoration:none;">Delete</a></button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>
