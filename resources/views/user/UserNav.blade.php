<x-slot name="header">
<nav x-data="{ open: false }" class="bg-black border-b border-gray-100" id="main2">
    <div class="flex justify-between h-16">  
        <li>
            <x-jet-button class="right-button" style="margin-top:10px; margin-left:10px; opcity: 100%; background-color:transparent; visibility:hidden;">
                Login
            </x-jet-button>
        </li>

        <center>
            <li>
                <table class="head">
                    <th class="head-logo">
                        <a href="/user">
                        <x-jet-application-mark />
                        </a>
                    </th>
                    <th class="header-text">
                        <h3>DOST-FPRDI OD-PS <br> Document Management Information System</h3>
                    </th>
                </table>
            </li>
        </center>

        <li>
            <a href="{{  route('login') }}" title="Login" style="text-decoration: none;">
                <x-jet-button class="right-button" style="margin-top:10px; margin-right:10px; opcity: 100%; background-color:transparent;">
                    Login
                </x-jet-button>
            </a>
        </li>
    </div>
</nav>

