<div>
    @include('dashboard')
    <style>
        .read {
            padding: 25px 25px 50px 25px;
            background-color: rgb(225, 241, 222);
            /* height: 400px;*/
            width: 500px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: -641px 0px 0px 382px;
            border-radius:10px;
        }

        .read p {
            text-align: justify;
            font-size: 0.8rem;
           margin: -43px 0px 0px 135px;
        }
        .read h6 {
            font-size: 0.8rem;
        }
        .read hr {

            width: 360px;
            margin: 10px 0px 0px 135px;
        }
    </style>
    <div class='read'>
        @foreach ($products as $item)
            <h6>Product name</h6>
            <p>{{ $item->product_name }}</p>
            <hr>
            <h6>Description</h6>
            <p>{{ $item->description }}</p>
            <hr>
            <h6>Amount</h6>
            <p>{{ $item->amount }}</p>
            <hr>
            <h6>Status</h6>
            <p> {{ $item->product_type }}
            </p>
            <hr>
        @endforeach
    </div>
</div>
