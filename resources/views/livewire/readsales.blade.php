<div>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
        .form-container {

            display: flex;
        }
        .form {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 0.9rem;
            margin: -638px 0px 0px 361px;
        }
        body .form table {
            padding: 10px;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            width: 80%;
            margin-top: 10px;
            border: 2px solid #ccc;
            pointer-events: none;
        }
        .form table th {
            padding: 5px;
            text-align: left;
            height: 50px;
            background-color: rgb(190, 207, 186);
            font-weight: bold;
            user-select: none;
        }
        .form table tr {
            width: 95%;
        }
        .form table tr:nth-child(odd) td:not(:empty) {
            background-color: rgb(225, 241, 222);
        }
        .form table td {
            padding: 5px;
            user-select: none;
        }
        /* .form input {

            border: none;
            background: none;
            outline: none;
        } */
        .form select {
            background: none;
            background-color: none;
            border: none;
            outline: none;
        }
        .form button {
            opacity: 0.4;
            border: none;
            color: rgb(10, 119, 83);
            background: none;
            width: 30px;
            height: 30px;
            padding: 3px;
        }

        .sales {
            border-color: rgb(10, 119, 83);
            border-width: 4px;
            overflow: hidden;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 0.9rem;
            width: 275px;
            height: 250px;
            margin: 15px 245px 0px 0px;
            float: right;
            border-radius: 5px;
            border-collapse: collapse;
        }

        .sales tr td {
            width: 95%;
            padding: 5px;
            user-select: none;
        }

        .sales tr:nth-child(odd) {
            background-color: rgb(225, 241, 222);
            /* color: rgb(168, 8, 8); */
        }

        .sales a {
           border: none;
            text-align: center;
            float: right;
            border: 1px solid black;
            color: white;
            height: 20px;
            width: 55px;
            border-radius: 3px;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
        }

        @media (max-width: 898px) {
            .sales {
                margin: 15px 0 0 0;

            }
            .sales button {
                margin: 0;
            }
        }
    </style>

    <div class="form">
        <h1 style="user-select:none;">View Sales </h1>

        @foreach ($sales as $item)
            <p style= "font-size:1rem; user-select:none">Date:</p>
            <p style="margin: -37px 0px -3px 100px; user-select:none"> {{ $item->date }} </p>
        @endforeach
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Product</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Gross Price</th>
                <th><button style="width:30px; height:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="auto" height="29" style="margin-top: -4px;"
                            viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </button></th>
            </tr>
            @foreach ($saledetail as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <p>{{ $item->product->product_name }}</p>
                    </td>
                    <td>
                        <p>{{ $item->product_price_with_profit }}</p>
                    </td>
                    <td>
                        <p>{{ $item->product_quantity }}</p>
                    </td>
                    <td>
                        <p>{{ $item->gross_price }}</p>
                    </td>
                    <td style="display: flex; align-items: center;">
                        <button style="width:30px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="auto" height="29"
                                style="margin-top: -4px;" viewBox="0 0 24 24" fill="none" stroke="black"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>

                        </button>

                        <button style="width:30px; display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 408.483 408.483" width="60"
                                height="60" style="transform: scale(0.8)">
                                <g fill="rgb(168, 8, 8)" stroke="red" stroke-width="2">
                                    <path
                                        d="M87.748,388.784c0.461,11.01,9.521,19.699,20.539,19.699h191.911c11.018,0,20.078-8.689,20.539-19.699l13.705-289.316 H74.043L87.748,388.784z M247.655,171.329c0-4.61,3.738-8.349,8.35-8.349h13.355c4.609,0,8.35,3.738,8.35,8.349v165.293 c0,4.611-3.738,8.349-8.35,8.349h-13.355c-4.61,0-8.35-3.736-8.35-8.349V171.329z M189.216,171.329 c0-4.61,3.738-8.349,8.349-8.349h13.355c4.609,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.737,8.349-8.349,8.349h-13.355 c-4.61,0-8.349-3.736-8.349-8.349V171.329L189.216,171.329z M130.775,171.329c0-4.61,3.738-8.349,8.349-8.349h13.356 c4.61,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.738,8.349-8.349,8.349h-13.356c-4.61,0-8.349-3.736-8.349-8.349V171.329z">
                                    </path>
                                    <path
                                        d="M343.567,21.043h-88.535V4.305c0-2.377-1.927-4.305-4.305-4.305h-92.971c-2.377,0-4.304,1.928-4.304,4.305v16.737H64.916 c-7.125,0-12.9,5.776-12.9,12.901V74.47h304.451V33.944C356.467,26.819,350.692,21.043,343.567,21.043z">
                                    </path>
                                </g>
                            </svg>



                        </button>
                    </td>
                    @foreach ($profit as $pitem)
                        @if ($pitem->sale_detail_id == $item->id)
                <tr>
                    <td></td>
                    <td>
                        <p>{{ $pitem->type }}</p>
                    </td>
                    <td>
                        <p>{{ $pitem->description }}</p>
                    </td>
                    <td>
                        <p>{{ $pitem->amount }}</p>
                    </td>
                    <td>
                        <button style="width:30px; display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 408.483 408.483" width="60"
                                height="60" style="transform: scale(0.8)">
                                <g fill="rgb(168, 8, 8)" stroke="red" stroke-width="2">
                                    <path
                                        d="M87.748,388.784c0.461,11.01,9.521,19.699,20.539,19.699h191.911c11.018,0,20.078-8.689,20.539-19.699l13.705-289.316 H74.043L87.748,388.784z M247.655,171.329c0-4.61,3.738-8.349,8.35-8.349h13.355c4.609,0,8.35,3.738,8.35,8.349v165.293 c0,4.611-3.738,8.349-8.35,8.349h-13.355c-4.61,0-8.35-3.736-8.35-8.349V171.329z M189.216,171.329 c0-4.61,3.738-8.349,8.349-8.349h13.355c4.609,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.737,8.349-8.349,8.349h-13.355 c-4.61,0-8.349-3.736-8.349-8.349V171.329L189.216,171.329z M130.775,171.329c0-4.61,3.738-8.349,8.349-8.349h13.356 c4.61,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.738,8.349-8.349,8.349h-13.356c-4.61,0-8.349-3.736-8.349-8.349V171.329z">
                                    </path>
                                    <path
                                        d="M343.567,21.043h-88.535V4.305c0-2.377-1.927-4.305-4.305-4.305h-92.971c-2.377,0-4.304,1.928-4.304,4.305v16.737H64.916 c-7.125,0-12.9,5.776-12.9,12.901V74.47h304.451V33.944C356.467,26.819,350.692,21.043,343.567,21.043z">
                                    </path>
                                </g>
                            </svg>
                        </button>
                    </td>
                </tr>
            @endif
            @endforeach

            </tr>
            @endforeach

        </table>
    </div>

    <table class="sales">
        @foreach ($sales as $item)
            <tr>
                <td>Expenditure:</td>
                <td>{{ $item->expenditure }}</td>
            </tr>
            <tr>
                <td>Profit: </td>
                <td>{{ $item->profit }}</td>
            </tr>
            <tr>
                <td>Total amount:</td>
                <td>{{ $item->total_amount }}</td>
            </tr>

            <tr>
                <td>
                    {{-- <button> --}}
                        <a  type="button"href="{{ route('salelisting') }}"
                            style="color: white !important; text-decoration:none;">Back</a>
                        {{-- </button> --}}
                    </td>

                            <td>
                                {{-- <button style="color: white !important; text-decoration:none;"> --}}
                                <a  style="color: white !important; text-decoration:none;" href="{{ url('/pdfGenerate/' . $item->id) }}">PDF</a>
                                {{-- </button> --}}
                            </td>

            </tr>
        @endforeach

    </table>

</div>
    {{-- @include('dashboard') --}}
