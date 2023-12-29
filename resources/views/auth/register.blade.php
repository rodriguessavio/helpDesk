<style>
        /* body {
            font-family: 'Arial', sans-serif;
            background-color: #7E07F9;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    
        .register-container {
            background-color: #ffffff;
            width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin: auto; 
        }

        .register-title {
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
        } */

        
    
</style>


<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo /> -->
        </x-slot>

        <x-validation-errors class="mb-4" />
        
        <div class="register-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="register-title">{{ __('Cadastro') }}</div>

                <div>
                    <x-label for="name" value="{{ __('Nome') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <br>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>
                <br>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Senha') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
                <br>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirme Senha') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <br>

                <div class="mt-4">
                    <x-label for="role" value="{{ __('Selecione o grupo de usuário') }}" />
                    <select id="role" name="role" class="block mt-1 w-full">
                        <option value="user">Usuário comum</option>
                        <option value="technician">Técnico</option>
                    </select>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <br><br>
                    <x-button class="ms-4" class="botao">
                        {{ __('Cadastrar') }}
                    </x-button>

                    <br>
                    <br>
                    <br>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Já tem uma conta?') }}
                    </a>

                    
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
