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

        .form label {
            font-size: 0.9rem;
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

        <label for="product_name">Product name</label>
        <input type="text" name="product_name":value="old('product_name')" id="product_name" wire:model="product_name"
            placeholder="Enter your product name" required autofocus autocomplete="product_name" />
        <x-input-error :messages="$errors->get('product_name')" class="mt-2" />


        <label for="description">Description</label>
        <input type="text" name="description":value="old('description')" id="description" wire:model="description"
            placeholder="Enter your description" required autofocus autocomplete="description" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />


        <label for="amount">Amount</label>
        <input type="number" name="amount":value="old('amount')" id="amount" wire:model="amount"
            placeholder="Enter your amount" required autofocus autocomplete="amount" />
        <x-input-error :messages="$errors->get('amount')" class="mt-2" />

        <label for="product_type">Product type</label>
        <input type="text" name="product_type":value="old('product_type')" id="product_type"
            wire:model="product_type" placeholder="Enter your product type" required autofocus
            autocomplete="username" />
        <x-input-error :messages="$errors->get('product_type')" class="mt-2" />

        <button class="btn btn-primary col-md-2" style="margin-top: 10px;" wire:click.prevent="store()">Create</button>
    </form>
</div>
