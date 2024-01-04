<div>
    <style>
        .form-container {
            display: flex;
            /* margin: 20px; */

            /* Add margin for better spacing */
        }

        .form {
            font-family: 'Verdana', 'Geneva', 'Tahoma', sans-serif;
            /* font-size: 0.9rem; */
            width: 100%;
            margin-right: 20px;
        }

        body .form table {
            width: 100%;
            margin-top: 10px;
            border: 2px solid #000000;
            /* overflow: hidden; */
            border-radius: 5px;
            /* font-size: 0.9rem; */
            border-collapse: collapse;
        }

        .form table th {
            /* margin: -50px; */
            font-size: 0.8rem;

            padding: 0px 0px 0px 5px;
            /* padding: -100px; */
            text-align: left;
            height: 50px;
            background-color: rgb(190, 207, 186);
            font-weight: bold;
        }

        .form table tr {
            width: 95%;
        }

        .form table tr:nth-child(odd) td:not(:empty) {
            background-color: rgb(225, 241, 222);
        }

        .form table td {
            font-size: 0.7rem;

            border: 1px solid black;
            padding: 0px 0px 0px 5px;
        }

        .sales {
            margin-top: -2px;
            border: 2px solid #000000;
            /* overflow: hidden; */
            /* border-radius: 5px; */
            font-family: 'Verdana', 'Geneva', 'Tahoma', sans-serif;
            font-size: 12px;
            width: 30%;
            /* height: 250px; */
            float: right;
        }

        .sales tr td {
            width: 95%;
            padding: 10px;
        }

        /* .sales tr:nth-child(odd) {
            background-color: rgb(225, 241, 222);
        } */

        @media print {

            body {
                font-size: 14px;
            }

            .form-container {
                display: block;
                margin: 0;
            }

            .form,
            .sales {
                width: 100%;
                margin: 0;
            }
        }
    </style>


    <div class="form">

        <h1> Sales </h1>
        @foreach ($data['sales'] as $sitem)
            <p style= "font-size:1rem; margin-bottom:
           20px;">Date:</p>
            <p style="margin: -37px 0px -3px 100px;"> {{ $sitem->date }} </p>
        @endforeach
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Product</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Gross Price</th>
            </tr>

            @if (isset($saledetails))

                @foreach ($saledetails['saledetail'] as $item)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <p>{{ $item->product_name }}</p>
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
                        @if (isset($profitandexpense['profit']) && !empty($profitandexpense['profit']))

                            @foreach ($profitandexpense['profit'] as $pitem)
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
                        <td></td>
                    </tr>
                @endif
            @endforeach
            @endif

            </tr>
            @endforeach
            @endif
        </table>
    </div>

    <table class="sales">
        @foreach ($data['sales'] as $sitem)
            <tr>

                <td>Expenditure:</td>
                <td>{{ $sitem->expenditure }}
                    <hr style="margin-bottom: -2px">
                </td>
            </tr>

            <tr>
                <td>Profit: </td>
                <td>{{ $sitem->profit }}
                    <hr style="margin-bottom: -2px">
                </td>
            </tr>

            <tr style=" background-color: rgb(225, 241, 222); border-collapse:collapse;">
                <td>Total amount:</td>
                <td>{{ $sitem->total_amount }}</td>
            </tr>
        @endforeach

    </table>

</div>
