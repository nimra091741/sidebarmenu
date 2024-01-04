
<div style=" pointer-events: none;" >


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
            height: 550px;
            margin: -644px 0 0px 375px;
        }

        .form h1 {
            margin: 0px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 1.5rem;
        }

        .form label {
            user-select: none;
            margin: 0px 0px 5px 5px;
            font-size: 0.9rem;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .form input {
            user-select:none;

            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 15px 5px;
            padding: 3px;
        }

        .form textarea
        {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px -5px 5px;
            padding: 3px;
            height: 70px;
        }
        .form select {
            border: 1px solid black;
            border-radius: 5px;
            margin: -17px 0px 28px 5px;
            padding: 3px;
        }

        .form a
        {
            pointer-events: auto;
            margin-left:440px;
            font-size: 0.8rem;
            padding: 3px;
            text-align: center;
            height: 20px;
            width: 50px;
            border: none;
            border-radius: 3px;
            float:right;
            font-family: Verdana;
            background: none;
            margin-top: 5px;
            color: rgb(255, 255, 255);
            text-decoration: none;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
        }

    </style>
    <form class="form">
        <h1>View Product</h1>
        <label for="product_name">Product name</label>
        <input type="text" class="form-control" wire:model="product_name" disabled />
        <x-input-error :messages="$errors->get('product_name')" class="mt-2" />

        <label for="description">Description</label>
        <textarea id="description" name="description" wire:model="description" rows="4" cols="50" disabled ></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />


        <label for="amount">Amount</label>
        <input type="number" class="form-control" wire:model="amount" disabled  />
        <x-input-error :messages="$errors->get('amount')" class="mt-2" />

            <label for="product_type">Product type</label>
            <select name="product_type" id="product_type" wire:model="product_type" disabled  >
                <option value="Finish" >Finish</option>
                 <option>Please select</option>
                 <option value="Unfinished"  >Unfinished</option>

            </select>
            <x-input-error :messages="$errors->get('product_type')" class="mt-2" />



            <a href="{{ route('productlisting')}}">Back</a>

    </form>
</div>
