<x-slot name="header">
<nav x-data="{ open: false }" class="bg-black border-b border-gray-100" id="main2">
    <div class="flex justify-between h-16">
        <!-- Side Nav Bar -->
        <li>
              
        </li>

            <!-- Head Logo -->
        <center>
            <li>
                <table class="head">
                    <th class="head-logo">
                        <a href="/dashboard">
                        <x-jet-application-mark />
                        </a>
                    </th>
                    <th class="header-text">
                        <h3>DOST-FPRDI OD-PS <br> Document Management Information System</h3>
                    </th>
                </table>
            </li>
        </center>

        <!-- Logout Button -->
        <li>
            <div class="logout-button" title="Logout">
                <a id="myBtn3" style="color:white;">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </li>
        @include('popup.LogoutPopup')
    </div>
</nav>

<script>
        var modal3 = document.getElementById("myModal3");
        // Get the button that opens the modal
        var btn3 = document.getElementById("myBtn3");

        // Get the <span> element that closes the modal
        var span3 = document.getElementsByClassName("close3")[0];

        // When the user clicks the button, open the modal 
        btn3.onclick = function() {
            modal3.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span3.onclick = function() {
            modal3.style.display = "none";
        }
    </script>