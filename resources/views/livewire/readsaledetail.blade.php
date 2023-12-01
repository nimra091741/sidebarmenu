<div>
    @include('dashboard')
    <style>
        .read {
            height: 500px;
            border-radius: 10px;
            padding: 25px 25px 50px 25px;
            background-color: rgb(225, 241, 222);
            width: 500px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: -641px 0px 0px 382px;
        }

        .read p {
            text-align: justify;
            font-size: 0.8rem;
            margin: -44px 0px 0px 167px;
        }

        .read h6 {
            font-size: 0.8rem;
        }

        .read hr {
            width: 315px;
            margin: 10px 0px 0px 168px;
        }
    </style>
    <div class='read'>
        @foreach ($saledetail as $item)
            <h6>product id</h6>
            <p>{{ $item->product->id  }}</p>
            <hr>
            <h6>Price with name</h6>
            <p>{{ $item->product->product_name }}</p>
            <hr>
            <h6>Price with profit</h6>
            <p>{{ $item->product_price_with_profit }}</p>
            <hr>
            <h6>Quantity</h6>
            <p>{{ $item->product_quantity }}</p>
            <hr>
            <h6>Gross Price</h6>
            <p>{{ $item->gross_price }}</p>
            <hr>
        @endforeach
    </div>

</div>
