
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
        @foreach ($sales as $item)
            <h6>Total amount</h6>
            <p>{{ $item->total_amount }}</p>
            <hr>
            <h6>Expenditure</h6>
            <p>{{ $item->expenditure }}</p>
            <hr>
            <h6>Profit</h6>
            <p>{{ $item->profit }}</p>
            <hr>
            <h6>Date</h6>
            <p>{{ $item->date }}</p>
            <hr>
        @endforeach
    </div>
</div>
