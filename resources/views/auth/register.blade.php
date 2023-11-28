
<!DOCTYPE html>
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
</x-guest-layout>
