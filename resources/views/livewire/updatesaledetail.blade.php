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

        .form h1 {
            margin: 0px;
            margin-bottom: 25px;
            font-family: Verdana;
            font-size: 1.5rem;
        }

        .form select {
            height: 40px;
            border: 1px solid black;
            border-radius: 5px;
            margin: : -6px 0px -14px 5px;
            padding: 10px;
        }

        .form label {
            font-size: 0.9rem;
            margin: 0px 0px 7px 5px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .form input {
            height: 20px;
            border: 1px solid black;
            border-radius: 5px;
            margin: -1px 0px 31px 5px;
            padding: 10px;
        }
        .form .good {
            margin: 42px -83px -107px 10px;
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
        <h1>Update Sale Details</h1>
        <label for="product_id">Select product </label>
        <select name="product_id" wire:model="product_id" class="form-control">
            @foreach ($product as $item)
                <option value="{{ $item['id'] }}">{{ $item['product_name'] }}</option>
            @endforeach
            <option value="">Please select</option>
        </select><br>
        @error('product_id')
            <span style="color: red;">{{ $message }}</span><br>
        @enderror

        <label for="sales_id">Select sales</label>
        <select name="sales_id" wire:model="sales_id" class="form-control">
            @foreach ($sales as $item)
                <option value="{{ $item['id'] }}">{{ $item['date'] }}</option>
            @endforeach
            <option value="">Please select</option>
        </select><br>
        @error('sales_id')
            <span style="color: red;">{{ $message }}</span><br>
        @enderror


        <label for="product_price_with_profit">Product price</label>
        <input type="number" class="form-control" wire:model="product_price_with_profit"
            placeholder="Enter your product price with profit" />
        <x-input-error :messages="$errors->get('product_price_with_profit')" class="mt-2" />


        <label for="product_quantity">Product quantity</label>
        <input type="number" class="form-control" wire:model="product_quantity"
            placeholder="Enter your product quantity" />
        <x-input-error :messages="$errors->get('product_quantity')" class="mt-2" />

        <label for="gross_price">Gross price</label>
        <input type="number" class="form-control" wire:model="gross_price" placeholder="Enter your gross price" />
        <x-input-error :messages="$errors->get('gross_price')" class="mt-2" />

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
