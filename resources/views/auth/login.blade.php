<x-guest-layout>
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <div class="bg-white">
                <x-jet-authentication-card>
                <x-slot name="logo">
                    <center>
                        <x-jet-authentication-card-logo />
                        <div class="login-reg-head">
                            <h2>Login</h2>
                        </div>
                    </center>
                </x-slot>
                <x-jet-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            <span id="toggle_pwd" class="fa-solid fa-eye-slash" style="margin-right: 1rem; margin-top: -1.9rem; display:inline; vertical-align: middle; float:right; font-size:20px;"></span>
                        </div>
                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                            <x-jet-button class="ml-4">
                                {{ __('Login') }}
                            </x-jet-button>
                        </div>
                    </form>
                </x-jet-authentication-card>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(function () {
            $("#toggle_pwd").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var type = $(this).hasClass("fa-solid fa-eye") ? "text" : "password";
                $("#password").attr("type", type);
            });

            $('#toggle_pwd').hide();
  
            $('#password').keyup( function() {
                $('#toggle_pwd').show();
            } );

            $('#password').keyup( function() {
                if($(this).val() == ''){
                    $('#toggle_pwd').hide();
                }
            });
        });
    </script>
</x-guest-layout>
