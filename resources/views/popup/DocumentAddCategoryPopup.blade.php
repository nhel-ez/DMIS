<div id="myModal1" class="modal1">
    <div class="modal-content1 border-box">
        <div>
            <li><h2>Add Category</h2></li>
            <li class="close-modal1"><span class="close1">&times;</span></li>
        </div>
        <center>
            <form method="POST" action="{{ route('DrCategory.store') }}">
                @csrf
                <th>
                    <div class="input-type">
                        <x-jet-label class="add-type-label" for="CategoryTitle" value="{{ __('Category Title') }}" />
                        <x-jet-input id="CategoryTitle" class="block mt-1 w-full" type="text" name="CategoryTitle" :value="old('Type Name')" required autofocus />
                    </div>
                </th>
                <x-jet-button class="add-type-button" action="{{ route('DrCategory.store') }}">
                    {{ __('Save') }}
                </x-jet-button>
            </form>
        </center>
    </div>
</div>