<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #7E07F9;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin: auto; 
        }

        .login-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #343a40; 
        }


        .botao {
            background-color: #7E07F9; 
            color: #ffffff; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        .botao:hover {
            background-color: #cc0000; 
        }
</style>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo /> -->
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="login-container">

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-title">{{ __('Login') }}</div>

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar senha') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">

                    <x-button class="botao">
                        {{ __('Log in') }}
                    </x-button>
                    <br><br>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif

                </div>
            </form>
        </div>

        <div class="mt-4 text-center" style="color: #fff;">
            <span class="text-sm text-gray-600">
                {{ __("Não tem uma conta?") }}
            </span>
            <a class="underline text-sm text-blue-500 hover:text-blue-700" href="{{ route('register') }}" style="color: #fff; text-decoration:none;">
                {{ __('Registre-se agora!') }}
            </a>
        </div>

    </x-authentication-card>
</x-guest-layout>
