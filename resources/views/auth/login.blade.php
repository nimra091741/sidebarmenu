<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

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

</head>

<body>
    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <p>POS</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf


            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" /><br>
                <input id="email" class="block mt-1 w-full"type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" /><br>

                <input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>



            <!-- Login button -->
            <button class="ms-3">
                {{ __('Log in') }}
            </button>
        </form>
    </x-guest-layout>
</body>

</html>




{{-- <div>
    <style>
        form {
            display: grid;
            align-items: center;
            height: 390px;
            width: 477px;
            background-color: white;
            border: 2px solid black;
            border-radius: 5px;
            margin: -100px 0px 200px 531px;
            padding: 30px;
        }

        button {
            color: rgb(255, 255, 255);
            font-family: Verdana;
            width: 80px;
            height: 29px;
            border: none;
            font-family: Verdana;
            font-size: 0.9rem;
            background: none;
            text-align: left;
            margin-left: 15px;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
            border-radius: 3px;
            text-align: center;
            float: right;
        }

        input {
            width: 400px;
            height: 35px;
            padding: 5px;
            outline: none;
            border: 1px solid black !important;
            border-radius: 3px !important;
            transition: border-width 0.3s;
        }

        input:focus {
            border-width: 2px !important;
        }

        label {
            padding: 5px;
        }
    </style><x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" /><br>
                <input id="email" class="block mt-1 w-full"type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" /><br>

                <input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center"><br>
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700
                         text-green-600 shadow-sm focus:ring-green-500 dark:focus:ring-green-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>


            <button class="ms-3">
                {{ __('Log in') }}
            </button>
</div>

</form>

</x-guest-layout> </div> --}}
{{-- <div class="login-page">
    <style>
        .login-page {
            margin: 0;
            padding: 0;
            height: 100%;
            /* display: inline-block; */
            align-items: center;
            justify-content: center;
        }

        .form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: -620px 0px 0px 0px;
            width: 427px;
            height: 340px;
        }

        .login-page button {
            color: rgb(255, 255, 255);
            font-family: Verdana;
            width: 80px;
            height: 29px;
            border: none;
            font-family: Verdana;
            font-size: 0.9rem;
            background: none;
            text-align: left;
            margin-left: 15px;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
            border-radius: 3px;
            text-align: center;
            float: right;
        }

        .form input {
            border-radius: 5px;
            width: 100%;
            height: 45px;
            border: 2px solid #020202;
            /* Add a border for better visibility */
            padding: 8px;
            margin: 10px 0px 20px 0px;
            box-sizing: border-box;
        }

        .form input:focus {
            outline: none;
            border-color: rgb(4, 46, 32);
        }

        .form input[type="checkbox"] {
            width: 20px;
        }

        .form label {
            margin: 0 0 10px 0px;
            padding: 0 0 10px 0px;
        }
    </style>
    <x-guest-layout >
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class='form'>
                <div>
                    <label for="email" :value="__('Email')">Email</label>
                    <input type="email" name="email" :value="old('email')" id="email"
                        placeholder="Enter your email" required autofocus autocomplete="useremail" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" :value="__('Password')">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required
                        autofocus autocomplete="current-password" />
                    <br>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <button>Log in</button>
            </div>
        </form>

    </x-guest-layout>
</div> --}}
