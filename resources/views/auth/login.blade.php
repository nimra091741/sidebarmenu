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
            height: 300px;
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
            float:right;
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
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->

                <div class='form'>
                    <div>
                        <label for="email" :value="__('Email')">Email</label>

                        <input type="email" name="email":value="old('email')" id="email"
                            placeholder="Enter your email" required autofocus autocomplete="username" />
                        {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" /> --}}
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <br>
                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" :value="__('Password')">Password</label>

                        <input type="password" name="password" id="password" placeholder="Enter your password" required
                            autofocus autocomplete="current-password" />
                        <br>


                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <br>
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                </div>



                    <button>Log in</button>

                </div>
            </form>
        </div>
    </x-guest-layout>

</body>

</html>
 {{-- <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a style="class= 'border-rgb(10, 119, 83) dark:border-rgb(10, 119, 83)
                        dark:bg-rgb(10, 119, 83) dark:text-rgb(10, 119, 83) focus:border-rgb(10, 119, 83)
                        dark:focus:border-rgb(10, 119, 83) font-family: Verdana focus:ring-rgb(10, 119, 83) dark:focus:ring-rgb(10, 119, 83) rounded-md shadow-sm !important' "
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif --}}
