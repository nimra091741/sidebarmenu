<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- <style>
        form {
            display: center;
            flex-direction: column;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 0.9rem;
            margin: -600px 0px 0px 558px;
            height: 400px;
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
            font-family: Verdana;
            margin-top: 25px;
            margin-right: 15px;
            float: right;
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

        p {
            justify-content: center;
            overflow: hidden;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 3rem;
            font-style: italic;
            margin: -573px 0px 653px 725px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 4);
        }

    </style> --}}

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(3, 3, 3) 120%);
            flex-direction: column; /* Added this line to make the items stack vertically */
        }

        p {
            margin: 20px 0; /* Adjusted the margin for spacing */
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 3rem;
            font-style: italic;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        form {
            display: grid;
            flex-direction: column;
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
            font-family: Verdana;
            margin-top: 25px;
            float: right;
            margin-right: 15px;
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
</head>

<body>
    <x-guest-layout />
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <p>POS</p>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class='form'>

            <!-- Name -->
            <div>
                <label for="name" :value="__('Name')">Name</label>
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    placeholder="Enter your name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" :value="__('Email')">Email</label>
                <input type="email" name="email":value="old('email')" id="email" placeholder="Enter your email"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" :value="__('Password')">Password</label>

                <input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" placeholder="Enter your password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>

                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                    required autocomplete="new-password" placeholder="Confirm your password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

        </div>
        <div >

            <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Register
            </button>
        </div>


    </form>
    </div>
    </form>
</body>

</html>

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        .login-page {
            margin: 0;
            padding: 0;
            height: 400px;
            /* display: flex; */
            align-items: center;
            justify-content: center;

        }

        .login-page button {
            color: rgb(0, 0, 0);
            font-family: Verdana;
            width: 84px;
            height: 25px;
            border: none;
            font-family: Verdana;
            background: none;
            text-align: left;
            margin-left: 15px;
            background-color: rgb(10, 119, 83);
            border-radius: 3px;
            text-align: center;
        }

        .form input {
            border-radius: 5px;
            width: 100%;
            border: 1px solid black !important;
        }

        .form input:focus {
            border: 2px solid rgb(4, 46, 32) !important;
        }

        .form input[type="checkbox"] {
            width: 20px;
        }

        .form label {
            margin: 0 0 10px 0px;
            padding: 0 0 10px 0px;
        }
    </style>

</head>

<body>

<x-guest-layout>
    <div class="login-page">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class='form'>

        <!-- Name -->
        <div>
            <label for="name" :value="__('Name')" >Name</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Enter your name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" :value="__('Email')">Email</label>
            <input type="email" name="email":value="old('email')" id="email"
                            placeholder="Enter your email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" :value="__('Password')" >Password</label>

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Enter your password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" :value="__('Confirm Password')" >Confirm Password</label>

            <input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password"
                             placeholder="Confirm your password"
                            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

    </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

           <button>Register</button>


        </div>
    </form>
</x-guest-layout> --}}
