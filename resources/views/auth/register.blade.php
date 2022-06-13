<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
            <x-jet-authentication-card>
            <x-slot name="logo">
                <center>
                    <x-jet-authentication-card-logo />
                    <div class="login-reg-head">
                        <h2>Register</h2>
                    </div>
                </center>
            </x-slot>    
            <x-jet-validation-errors class="mb-4" />
                <form id="register" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="mt-4">
                    <li><x-jet-label for="password" value="{{ __('Password') }}" /></li><li><span>&nbsp;&nbsp;</span></li><li><span id="result"></span></li>
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" title="Passwords will contain at least 1 upper case letter
Passwords will contain at least 1 lower case letter
Passwords will contain at least 1 number or special character
Passwords will contain at least 8 characters in length" required autocomplete="new-password" />
                    <span id="toggle_pwd" class="fa-solid fa-eye-slash" style="margin-right: 1rem; margin-top: -1.9rem; display:inline; vertical-align: middle; float:right; font-size:20px;"></span>
                </div>
                <div class="mt-4">
                    <li><x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" /></li><li><span>&nbsp;&nbsp;</span></li><li><span id="result2"></span></li>
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <span id="toggle_pwd2" class="fa-solid fa-eye-slash" style="margin-right: 1rem; margin-top: -1.9rem; display:inline; vertical-align: middle; float:right; font-size:20px;"></span>
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                    <div class="flex items-center">
                    <x-jet-checkbox name="terms" id="terms"/>
                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                    </div>
                     @endif
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-jet-button class="ml-4">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </form>
            </x-jet-authentication-card>
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

            $("#toggle_pwd2").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
               var type = $(this).hasClass("fa-solid fa-eye") ? "text" : "password";
                $("#password_confirmation").attr("type", type);
            });

            $('#toggle_pwd').hide();
            $('#toggle_pwd2').hide();
  
  
            $('#password').keyup( function() {
            $('#toggle_pwd').show();
            });

            $('#password_confirmation').keyup( function() {
            $('#toggle_pwd2').show();
            });

            $('#password').keyup( function() {
                if($(this).val() == ''){
                    $('#toggle_pwd').hide();
                }
            });

            $('#password_confirmation').keyup( function() {
                if($(this).val() == ''){
                    $('#toggle_pwd2').hide();
                }
            });
        });

        // strong password checker

        $(document).ready(function() {
            $('#password').keyup(function() {
                $('#result').html(checkStrength($('#password').val()))
            })
            function checkStrength(password) {
                var strength = 0
                if (password.length < 6) {
                    $('#result').removeClass()
                    $('#result').addClass('short')
                return 'Too short'
                }
                if (password.length > 7) strength += 1
                // If password contains both lower and uppercase characters, increase strength value.
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
                // If it has numbers and characters, increase strength value.
                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
                // If it has one special character, increase strength value.
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // If it has two special characters, increase strength value.
                if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // Calculated strength value, we can return messages
                // If value is less than 2
                if (strength < 2) {
                    $('#result').removeClass()
                    $('#result').addClass('weak')
                return 'Weak'
                }
                else if (strength == 2) {
                    $('#result').removeClass()
                    $('#result').addClass('good')
                return 'Good'
                }
                else {
                    $('#result').removeClass()
                    $('#result').addClass('strong')
                return 'Strong'
                }
            }
            function checkPasswordMatch() {
                var password = $("#password").val();
                var confirmPassword = $("#password_confirmation").val();
                if (password != confirmPassword)
                    $("#result2").html("Password does not matched").css("color", "#FF0000" );
                else
                    $("#result2").html("Password matched").css("color", "limegreen");
            }
            $(document).ready(function () {
                $("#password_confirmation").keyup(checkPasswordMatch);
            });

            $('#password').keyup( function() {
                if($(this).val() == ''){
                    $('#result').hide();
                }
                else {
                    $('#result').show();
                }
            });

            $('#password_confirmation').keyup( function() {
                if($(this).val() == ''){
                    $('#result2').hide();
                }
                else {
                    $('#result2').show();
                }
            });
        });

        jQuery(".password").toolTip()
    </script>
</x-guest-layout>
