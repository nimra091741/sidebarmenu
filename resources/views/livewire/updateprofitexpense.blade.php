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
            padding: 48px 40px 25px 25px;
            border: 1px solid black;
            display: grid;
            width: 500px;
            height: 570px;
            margin: -644px 0 0px 375px;
        }

        .form h1 {
            margin: 0px 0px 18px 0px;
            font-family: Verdana;
            font-size: 1.5rem;
        }

        .form select {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 28px 5px;
            padding: 3px;
            height: 40px;
        }

        .form label {
            font-size: 0.9rem;
            margin: 0px 0 23px 4px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .form input {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 5px 5px;
            padding: 3px;
            height: 30px;
        }
        .form textarea {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 5px 5px;
            padding: 3px;
            height: 70px;
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

        <h1>Update Profit/Expense</h1>

        <label for="sales_id">Select sales</label>
        <select wire:model="sales_id" class="form-control">

            @foreach ($sales as $item)
                <option value="{{ $item['id'] }}">{{ $item['date'] }}</option>
            @endforeach
            <option>Please select</option>
        </select>
        <x-input-error :messages="$errors->get('sales_id')" class="mt-2" />

        <label for="sale_detail_id">Select sale details</label>
        <select wire:model="sale_detail_id" class="form-control">
            <option>Please select</option>
            @foreach ($saledetails as $item)
                <option value="{{ $item['id'] }}">{{ $item['product_price_with_profit'] }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('sale_detail_id')" class="mt-2" />


        <label for="type">Type</label>
        <input type="text" wire:model="type" class="form-control" placeholder="Enter your type" />
        <x-input-error :messages="$errors->get('type')" class="mt-2" />


        <label for="description">Description</label>
        <textarea id="description" name="description" wire:model="description" rows="4" cols="50"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />


        <label for="amount">Total Amount</label>
        <input type="number"wire:model="amount" class="form-control" placeholder="Enter your amount" />
        <x-input-error :messages="$errors->get('amount')" class="mt-2" />


            @if (empty($error_message))
            <button class="btn btn-primary col-md-2" style="margin-top: 10px;"
                wire:click.prevent="edit()">Update</button>
        @elseif(!empty($error_message))
            <div class="good"></div>{{ $error_message }}
            <button>
                <a href="{{ route('profitexpenselisting') }}"
                    style="color: white !important; text-decoration:none;">Back</a></button>
        @endif
    </form>
</div>
