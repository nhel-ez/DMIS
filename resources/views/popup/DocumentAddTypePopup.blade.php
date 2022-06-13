<div id="myModal2" class="modal2">
    <div class="modal-content2 border-box">
        <div>
            <li><h2>Add Type</h2></li>
            <li class="close-modal2"><span class="close2">&times;</span></li>
        </div>
        <center>
            <form method="POST" action="{{ route('DrType.store') }}">
                @csrf
                <th>
                    <div class="input-type">
                        <x-jet-label class="add-type-label" for="TypeTitle" value="{{ __('Type Title') }}" />
                        <x-jet-input id="TypeTitle" class="block mt-1 w-full" type="text" name="TypeTitle" :value="old('Type Name')" required autofocus />
                    </div>
                </th>
                <th>
                    <div class="input-type">
                        <x-jet-label class="add-type-label" for="TypeCode" value="{{ __('Type Code') }}" />
                        <x-jet-input id="TypeCode" class="block mt-1 w-full" type="text" name="TypeCode" :value="old('Type Code')" required autofocus />
                    </div>
                </th>
                <x-jet-button class="add-type-button" action="{{ route('DrType.store') }}">
                    {{ __('Save') }}
                </x-jet-button>
            </form>
        </center>
    </div>
</div>