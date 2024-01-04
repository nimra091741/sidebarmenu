<div>
    <style>
        .form select {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 28px 5px;
            padding: 3px;
        }

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
            height: 550px;
            margin: -644px 0 0px 375px;
        }

        .form h1 {
            margin: 0px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 1.5rem;
        }

        .form label {
            margin: 0px 0px 5px 5px;
            font-size: 0.9rem;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .form input {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 15px 5px;
            padding: 3px;
        }

        .form textarea {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px -5px 5px;
            padding: 3px;
            height: 70px;
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
        <h1>Add Product</h1>
        <label for="product_name">Product name</label>
        <input type="text" name="product_name":value="old('product_name')" id="product_name" wire:model="product_name"
            placeholder="Enter your product name" required autofocus autocomplete="product_name" />
        @error('product_name')
            <span>{{ $message }}</span>
        @enderror


        <label for="description">Description</label>
        <textarea id="description" name="description" wire:model="description" rows="4" cols="50"></textarea>
        @error('description')
            <span>{{ $message }}</span>
        @enderror


        <label for="amount">Amount</label>
        <input type="number" name="amount":value="old('amount')" id="amount" wire:model="amount"
            placeholder="Enter your amount" required autofocus autocomplete="amount" />
            @error('amount')
            <span>{{ $message }}</span>
        @enderror

        <label for="product_type">Product type</label>
        <select name="product_type" id="product_type" wire:model="product_type" required autofocus
            autocomplete="username">
            <option>Please select</option>
            <option value="Finish">Finish</option>

            <option value="Unfinished">Unfinished</option>

        </select>
        @error('product_type')
            <span>{{ $message }}</span>
        @enderror

        <button class="btn btn-primary col-md-2" style="margin-top: 10px;" wire:click.prevent="store()">Add</button>
    </form>
</div>
{{-- @include('dashboard') --}}
