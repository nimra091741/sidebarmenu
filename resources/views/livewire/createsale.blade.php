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


        <label for="total_amount" >Total amount</label>
        <input type="number" name="total_amount":value="old('total_amount')" id="total_amount"
        wire:model="total_amount" placeholder="Enter your total amount" required
            autofocus autocomplete="total_amount" />
        <x-input-error :messages="$errors->get('total_amount')" class="mt-2" />


        <label for="expenditure" >Expenditure</label>
        <input type="number" name="expenditure":value="old('expenditure')" id="expenditure"
        wire:model="expenditure" placeholder="Enter your expenditure" required
            autofocus autocomplete="expenditure" />
        <x-input-error :messages="$errors->get('expenditure')" class="mt-2" />


        <label for="profit" >Profit</label>
        <input type="number" name="profit":value="old('profit')" id="profit"
        wire:model="profit" placeholder="Enter your profit" required
            autofocus autocomplete="profit" />
        <x-input-error :messages="$errors->get('profit')" class="mt-2" />


            <label for="date" >Today date</label>
            <input type="date" name="date":value="old('date')" id="date"
            wire:model="date" placeholder="Enter your date" required
                autofocus autocomplete="date" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />

            <button class="btn btn-primary col-md-2" style="margin-top: 10px;" wire:click.prevent="store()">Create</button>
    </form>
</div>
