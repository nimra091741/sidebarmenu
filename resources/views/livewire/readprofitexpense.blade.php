<div>
    @include('dashboard')
    <style>
        .read {
            border-radius:10px;
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
        @foreach ($profit as $item)
            <h6>Type(profit/expense)</h6>
            <p>{{ $item->type }}</p>
            <hr>
            <h6>Description</h6>
            <p>{{ $item->description }}</p>
            <hr>
            <h6>Amount</h6>
            <p>{{ $item->amount }}</p>
            <hr>
        @endforeach
    </div>
</div>
