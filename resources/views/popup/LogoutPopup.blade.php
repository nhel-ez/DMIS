<div id="myModal3" class="modal3">
    <div class="modal-content3 border-box">
        <div>
            <h4>Are you sure you want to logout?</h4>
        </div>
        <center>
            <li class="logout-confirm-button">
                <x-jet-button class="close3">
                    {{ __('No') }}
                </x-jet-button> 
            </li>
            <li class="logout-confirm-button">
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf  
                    <a class="logout-confirm-ark" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        <x-jet-button>
                            {{ __('Yes') }}
                        </x-jet-button>
                    </a>
                </form>
            </li>
        </center>
    </div>
</div>