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
            height: 550px;
            margin: -644px 0 0px 375px;
        }

        .form select {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 28px 5px;
            padding: 3px;
        }

        .form label {
            font-size: 0.9rem;
            margin: 0 0 5 0px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .form input {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 28px 5px;
            padding: 3px;
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


        <label for="sales_id">Select sales</label>
        <select wire:model="sales_id">
            <option>Please select</option>
            @foreach ($sales as $item)
                <option value="{{ $item['id'] }}">{{ $item['date'] }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('sales_id')" class="mt-2" />

        <label for="sale_detail_id">Select sale details</label>
        <select wire:model="sale_detail_id">
            <option>Please select</option>
            @foreach ($saledetails as $item)
                <option value="{{ $item['id'] }}">{{ $item['product_price_with_profit'] }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('sale_detail_id')" class="mt-2" />


        <label for="type">Type</label>
        <input type="text" name="type":value="old('type')" id="type" wire:model="type"
            placeholder="Enter your type" required autofocus autocomplete="type" />
        <x-input-error :messages="$errors->get('type')" class="mt-2" />


        <label for="description">Description</label>
        <input type="text" name="description":value="old('description')" id="description" wire:model="description"
            placeholder="Enter your description" required autofocus autocomplete="description" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />


        <label for="amount">Total Amount</label>
        <input type="number" name="amount":value="old('amount')" id="amount" wire:model="amount"
            placeholder="Enter your amount" required autofocus autocomplete="amount" />
        <x-input-error :messages="$errors->get('amount')" class="mt-2" />

        <button class="btn btn-primary col-md-2" style="margin-top: 10px;" wire:click.prevent="store()">Create</button>
    </form>
</div>
