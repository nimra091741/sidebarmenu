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
            display: block;
            width: 800px;
            height: 1200px;
            margin: -644px 0 0px 375px;
        }

        .form h1 {
            margin: 0px;
            font-family: Verdana;
            font-size: 1.5rem;
        }

        .form label {
            font-size: 0.9rem;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .form input {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 28px 5px;
            padding: 3px;
            width: 250px;
            display: inline-block;
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
        <h1>Add Sales</h1>

        salesdata
        <label for="date">Date</label>
        <input type="date" name="date" id="date" wire:model="date" placeholder="Enter your date" required
            autofocus autocomplete="date" />
        <x-input-error :messages="$errors->get('date')" class="mt-2" /><br>


        <label for="total_amount">Total amount</label>
        <input type="number" name="total_amount":value="old('total_amount')" id="total_amount"
            wire:model="total_amount" placeholder="Enter your total amount" required autofocus
            autocomplete="total_amount" />
        <x-input-error :messages="$errors->get('total_amount')" class="mt-2" /><br>


        <label for="expenditure">Expenditure</label>
        <input type="number" name="expenditure":value="old('expenditure')" id="expenditure" wire:model="expenditure"
            placeholder="Enter your expenditure" required autofocus autocomplete="expenditure" />
        <x-input-error :messages="$errors->get('expenditure')" class="mt-2" /><br>


        <label for="profit">Profit</label>
        <input type="number" name="profit":value="old('profit')" id="profit" wire:model="profit"
            placeholder="Enter your profit" required autofocus autocomplete="profit" />
        <x-input-error :messages="$errors->get('profit')" class="mt-2" /><br>

        {{-- saledetails --}}
        Sale Details data

        <label for="product_id">Select product </label>
        <select name="product_id" wire:model.live="product_id" class="form-control" style="height:50px;">
            <option value="">Please select</option>
            @foreach ($product as $item)
                <option value="{{ $item['id'] }}">{{ $item['product_name'] }}</option>
            @endforeach
        </select><br>
        @error('product_id')
            <span style="color: red;">{{ $message }}</span><br>
        @enderror

        <button class="btn btn-secondary ml-2" wire:click.prevent="resetField()">+</button><br>

        <label for="product_price_with_profit"> One Product price</label>
        <input type="number" name="product_price_with_profit":value="old('product_price_with_profit')"
            id="product_price_with_profit" wire:model.live="product_price_with_profit"
            placeholder="Enter your product price with profit" required autofocus
            autocomplete="product_price_with_profit" />
        <x-input-error :messages="$errors->get('product_price_with_profit')" class="mt-2" /><br>


        <label for="product_quantity">Product quantity</label>
        <input type="number" name="product_quantity":value="old('product_quantity')" id="product_quantity"
            wire:model="product_quantity" placeholder="Enter your product quantity" required autofocus
            autocomplete="product_quantity" />
        <x-input-error :messages="$errors->get('product_quantity')" class="mt-2" /><br>

        <label for="gross_price">Gross price</label>
        <input type="number" name="gross_price":value="old('gross_price')" id="gross_price" wire:model="gross_price"
            placeholder="Enter your gross price" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('gross_price')" class="mt-2" /><br>
        {{-- profit/expense  --}}

        profit data
        <label for="type">Type</label>
        <select name="type" id="type" wire:model="type">
            <option>Please select</option>
            <option value="Profit">Profit</option>
            <option value="Expense">Expense</option>
        </select>
        <x-input-error :messages="$errors->get('type')" class="mt-2" /><br>


        <label for="description">Description</label>
        <textarea id="description" name="description" wire:model="description" rows="4" cols="50"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" /><br>


        <label for="amount">Total Amount</label>
        <input type="number" name="amount":value="old('amount')" id="amount" wire:model="amount"
            placeholder="Enter your of profit/expense" required autofocus autocomplete="amount" />
        <x-input-error :messages="$errors->get('amount')" class="mt-2" /><br>

        <button class="btn btn-primary col-md-2" style="margin-top: 10px;" wire:click.prevent="store()">Add</button>
    </form>
</div>
