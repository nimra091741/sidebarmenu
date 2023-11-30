<div>
    @include('dashboard')
    <style>
         /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .form {
            background-color: rgb(225, 241, 222);
            border-radius: 5px;
            padding: 25px;
            border: 1px solid black;
            display: grid;
            width: 500px;
            height: 500px;
            margin: -644px 0 0px 375px;
        }
        .form h1 {
            margin: 0px 0px 18px 0px;
            font-family: Verdana;
            font-size: 1.5rem;
        }
        .form label {
            font-size: 0.9rem;
            margin:0px 0px 23px 5px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .form input {
            border: 1px solid black;
            border-radius: 5px;
            height: 35px;
            margin: -17px 0px 28px 5px;
            padding: 3px;
        }
        .form .good
        {
            margin: 42px -83px -107px 5px;
        }
        .form button {

            color: white;
            border-radius: 5px;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
            width: 80px;
            height: 30px;
            margin: 0 0 0 418px;
            padding: 3px;
        }
        </style>
    <form class="form">

        <h1>Update Sales</h1>
        <label for="total_amount" >Total amount</label>
        <input type="number" class="form-control"
        wire:model="total_amount" placeholder="Enter your total amount" />
        <x-input-error :messages="$errors->get('total_amount')" class="mt-2" />


        <label for="expenditure" >Expenditure</label>
        <input type="number" class="form-control"
        wire:model="expenditure" placeholder="Enter your expenditure"  />
        <x-input-error :messages="$errors->get('expenditure')" class="mt-2" />


        <label for="profit" >Profit</label>
        <input type="number" class="form-control"
        wire:model="profit" placeholder="Enter your profit" />
        <x-input-error :messages="$errors->get('profit')" class="mt-2" />


            <label for="date" >Today date</label>
            <input type="date" class="form-control"
            wire:model="date" placeholder="Enter your date" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />

                @if (empty($error_message))
                <button class="btn btn-primary col-md-2" style="margin-top: 10px;"
                    wire:click.prevent="edit()">Update</button>
            @elseif(!empty($error_message))
                <div class="good"></div>{{ $error_message }}
                <button>
                    <a href="{{ route('saledetaillisting') }}"
                        style="color: white !important; text-decoration:none;">Back</a></button>
            @endif
    </form>
</div>
