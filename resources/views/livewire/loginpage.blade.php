<div>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(3, 3, 3) 120%);
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 0.9rem;
            width: 400px;
            background-color: rgb(255, 255, 255);
            border: 2px solid black;
            overflow: hidden;
            border-radius: 10px;
            padding: 15px;
        }

        button {
            color: rgb(255, 255, 255);
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
            border-radius: 3px;
            font-family: Verdana;
            font-size: 0.9rem;
            width: 80px;
            height: 29px;
            border: none;
            margin-top: 25px;
            justify-self: end;
            margin-right: 15px;
        }



        p {
            margin: 0px 0px 49px 160px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 3rem;
            font-style: italic;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        label {
            float: left;
            margin: 10px 20px 0px 20px;
        }

        input {
            width: 90%;
            height: 30px;
            outline: none;
            margin: 10px 20px 10px 20px;
            border: 1px solid black !important;
            border-radius: 3px !important;
        }

        input:focus {
            border-width: 2px !important;
        }
    </style>

    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <p>POS</p>
        <form wire:submit.prevent="store">
            @csrf

            <!-- Error message -->
            @if (session('error'))
                <div style="color:red; margin:0px 0px 0px 15px;">{{ session('error') }}</div>
            @endif

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" /><br>
                <input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required
                    autofocus autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" /><br>
                <input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                    required autocomplete="current-password" />
            </div>

            <!-- Login button -->
            <button type="submit" class="ms-3">
                {{ __('Log in') }}
            </button>



        </form>
    </x-guest-layout>

</div>
