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
            width: calc(23% - 10px);
            box-sizing: border-box;
            height: 100px;
            margin: -644px 0 0px 375px;
        }

        .content button {
            height: 27px;
            width: 59px;
            border: none;
            border-radius: 3px;
            color:white;
            font-family: Verdana;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
            /* background-color: rgb(0, 0, 0); */
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
                <div style="background-color: red;color:white; border: none; border-radius: 3px; display: flex; align-items: center; justify-content: center; height: 30px; width: calc(100% - 10px);">

                    {{ session('delete') }}
                </div>

                @elseif (session()->has('message'))
                <div style="background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));color:white; border: none; border-radius: 3px; display: flex; align-items: center; justify-content: center; height: 30px; width: calc(100% - 10px);">
                 {{ session('message') }}
             </div>

                @endif
            @foreach ($saledetail as $item)
                <h4>{{ $item->product_price_with_profit }}|{{ $item->product_quantity }}|{{ $item->gross_price }}
                </h4>
                   <button><a wire:click="delete({{ $item->id }})">Delete</a></button>
            @endforeach
        </div>
    </div>

</body>

</html>
