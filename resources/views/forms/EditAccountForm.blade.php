<x-jet-authentication-card>
    <x-slot name="logo"></x-slot>
    <x-jet-validation-errors class="mb-4" />
    <form id="register" action ="{{ action('AccountController@update', $data['id']) }}" method="POST">
        @csrf
        @method('put')
        <div class="input-add-admin">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{ $data->name }}" required/>
        </div>
        <div class="input-add-admin">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" value="{{ $data->email }}" required/>
        </div>
        <div class="input-add-admin">
            <li><x-jet-label for="password" value="{{ __('Password') }}" /></li><li><span>&nbsp;&nbsp;</span></li><li><span id="result"></span></li>
            <x-jet-input id="password" class="block mt-1 w-full" title="Passwords will contain at least 1 upper case letter
Passwords will contain at least 1 lower case letter
Passwords will contain at least 1 number or special character
Passwords will contain at least 8 characters in length" type="password" name="password" required autocomplete="new-password" />
            <span id="toggle_pwd" class="fa-solid fa-eye-slash" style="margin-right: 1rem; margin-top: -1.9rem; display:inline; vertical-align: middle; float:right; font-size:20px;"></span>
        </div>
        <div class="input-add-admin">
            <li><x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" /></li><li><span>&nbsp;&nbsp;</span></li><li><span id="result2"></span></li>
            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <span id="toggle_pwd2" class="fa-solid fa-eye-slash" style="margin-right: 1rem; margin-top: -1.9rem; display:inline; vertical-align: middle; float:right; font-size:20px;"></span>
        </div>
        <center>
            <div class="add-admin-button">
                <x-jet-button class="ml-4">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </center>
    </form>
</x-jet-authentication-card>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    // Confirm Password Authentication
    var password = document.getElementById("password"), confirm_password = document.getElementById("password_confirmation");
                    
    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords do not match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
             
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    // Eye Show/Hide Password
    $(function () {
        $("#toggle_pwd").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
               var type = $(this).hasClass("fa-solid fa-eye") ? "text" : "password";
                $("#password").attr("type", type);
            }
        );

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

    // Strong Password Checker
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
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
            if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
            if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
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

            // Confirm Password Checker
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