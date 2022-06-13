<div id="myModal" class="modal">
    <div class="modal-content border-box">
        <div>
            <li><h2>Add Cabinet</h2></li>
            <li class="close-modal2"><span class="close2">&times;</span></li>
        </div>
        <center>
            <form method="POST" action="{{ route('DrCabinet.store') }}">
                @csrf
                <th>
                    <div class="input-type">
                        <x-jet-label class="add-type-label" for="CabinetName" value="{{ __('Cabinet Name') }}" />
                        <x-jet-input id="CabinetName" class="block mt-1 w-full" type="text" name="CabinetName" :value="old('Cabinet Name')" required autofocus />
                    </div>
                </th>
                <x-jet-button class="add-type-button" action="{{ route('DrCabinet.store') }}">
                    {{ __('Save') }}
                </x-jet-button>
            </form>
        </center>
    </div>
</div>