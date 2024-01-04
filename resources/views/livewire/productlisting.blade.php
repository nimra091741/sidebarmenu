<div class="content">

    <style>
        .modal {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .content {
            margin: -677px 0px 0px 343px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;

        }

        .internal-container {
            display: flex;
        }

        body .internal table {
            padding: 10px;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            width: 80%;
            margin-top: 10px;
            pointer-events: none;
        }

        .internal table th {
            padding: 5px;
            text-align: center;
            height: 50px;
            background-color: rgb(190, 207, 186);
            font-weight: bold;
            user-select: none;
        }

        .internal table tr {
            width: 95%;
            border-bottom: 1px solid rgb(225, 241, 222);
        }

        .internal table tr:nth-child(odd) {
            background-color: rgb(225, 241, 222);
        }

        .internal table tr:hover {
            background-color: rgb(225, 241, 222);
        }

        .internal table td {
            max-width: 300px;
            text-align: center;
            padding: 5px;
            font-size: 0.9rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            user-select: none;
        }

        .content button {
            height: 27px;
            width: 59px;
            border: none;
            border-radius: 3px;
            color: rgb(10, 119, 83);
            font-family: Verdana;
            background: none;
            margin-top: 5px;
            cursor: pointer;
        }

        .content a
        {pointer-events: auto;
            font-size: 0.8rem;
            padding: 5px;
            height: 27px;
            width: 59px;
            border: none;
            border-radius: 3px;
            font-family: Verdana;
            background: none;
            margin-top: 5px;
            color: rgb(255, 255, 255);
            text-decoration: none;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
        }
        .internal table a
        {
            pointer-events: auto;
            font-size: 0.8rem;
            height: 27px;
            width: 59px;
            border-radius: 3px;
            font-family: Verdana;
            background: none;
             text-decoration: none;
        }
        .internal table a:hover,
        .content a:hover ,
        .content button:hover {
            font-size: 0.9rem;
            color: white !important;
            /* animation: shake 0.5s !important ; */
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

        .container .pagination {
            float: right;
            margin-right: 250px;
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .pagination button {
            text-decoration: none;
            display: inline;
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .pagination button:active {
            background-color: green !important;
            outline: none;
        }

        @media (max-width: 800px) {
            .internal table td {
                font-size: 0.6rem;
                width: 80%;
            }

            .internal table th {
                font-size: 0.7rem;
            }

            .container .pagination {
                float: right;
                margin-right: 80px;
                display: flex;
                justify-content: center;
                margin-top: 10px;
            }
        }

        #myModal {
            /* display: none; */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 10px;
            max-height: 500px;
            overflow-y: auto;
            background-color: #ffffff;
            border: 1px solid black;
            border-radius: 3px;
        }
    </style>
    <h1
        style="color: black !important; margin:0px 0px 10px 0px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 1.5rem;">
        Products</h1>
{{-- padding: 10px 20px; --}}


        <a href="{{ url('/createproduct/') }}">Create</a>
   {{-- style="color: rgb(255, 255, 255); text-decoration: none;
   background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
     display: inline-block; border-radius: 5px; cursor: pointer;" --}}

    @if (session()->has('delete'))
        <br><br>
        <div
            style="  background-color: rgb(190, 207, 186);
                    color:rgb(0, 0, 0);margin: 0px 0px 14px 0px; width: calc(81% - 10px);
                    border: none; border-radius: 3px; display: flex; align-items: center; justify-content: center; height: 30px; ">
            {{ session('delete') }}
        </div>
    @elseif (session()->has('message'))
        <br><br>
        <div
            style="background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
              width: calc(81% - 10px);   margin: 0px 0px 14px 0px;color:white; border: none; border-radius: 3px;
               display: flex; align-items: center; justify-content: center; height: 30px; ">
            {{ session('message') }}
        </div>
    @endif

    <div class="internal">
        @if (count($products) > 0)
            <table>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>

                @foreach ($products as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->product_type }}</td>
                        <td>
                            <a href="{{ url('/readproduct/' . $item->id) }}"style="color:rgb(10, 119, 83);
                             font-size: 0.8rem;text-decoration:none;">View</a>
                            <a href="{{ url('/updateproduct/' . $item->id) }}"style="color:rgb(10, 119, 83);
                              font-size: 0.8rem;text-decoration:none;">Update</a>
                            <button wire:click="openModal({{ $item->id }})" style="color: rgb(10, 119, 83);">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach

            </table>
        @else
            <p>Data not found!!</p>

        @endif
    </div>

    <div class="pagination">
        {{ $products->links() }}
    </div>

    @if ($delete_modal == true)
        <div id="myModal" class="modal" wire:ignore.self wire:loading.class="opacity-50"
            style="width: 400px; padding: 10px; max-height: 500px; overflow-y: auto;background-color:#ffffff;
     border: 1px solid black; border-radius: 3px;">

            <span wire:click="back()"
                style="cursor: pointer; float: right; width: 21px; height: 21px;
        border: 1px solid black; border-radius: 3px; color: rgb(10, 119, 83);
        display: flex; justify-content: center; align-items: center; margin: 0px 3px 0px 0px;">
                &times;
            </span>

            <div>
                <p>Are you sure you want to delete it?</p>
                <button style="float: right;" wire:click="delete($id)">Delete</button>
                <button style="float: right; " wire:click="back">Cancel</button>
            </div>
        </div>
    @endif

    {{--  --}}
</div>
{{-- <script>
        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script> --}}
