<center>
    @include('alerts.Saved')
    <form action="{{ action('DocumentController@update', $data['id']) }}" class="add-doc" method="POST" >
        @csrf
        @method('put')
        <table>
            <tr>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocTitle" value="{{ __('Title') }}" />
                        <x-jet-input id="DocTitle" class="block mt-1 w-full" type="text" name="DocTitle" :value="old('Title')" value="{{ $data->DocumentTitle }}" required autofocus />
                    </div>
                </th>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocTrackNo" value="{{ __('Tracking No.') }}" />
                        <x-jet-input id="DocTrackNo" class="block mt-1 w-full" type="text" name="DocTrackNo" :value="old('Tracking No.')" value="{{ $data->DocumentTrackNo }}" required autofocus />
                    </div>
                </th>
            </tr>
            <tr>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocCategory" value="{{ __('Category') }}" />
                        <select class= "select-category" name="DocCategory" id="DocCategory">
                            @if ($data->count())
                                <option>{{ $data->CategoryTitle }}</option>
                                
                                    @if (old('data')==$data->CategoryId)
                                        <option value= {{ $data->CategoryId }} selected>{{ $data->CategoryTitle }}</option>
                                    @else
                                        <option value= {{ $data->CategoryId }} >{{ $data->CategoryTitle }}</option>
                                    @endif
                                
                            @else
                                <option>-- Add New Category in the Menu --</option>
                            @endif
                        </select>
                    </div>
                </th>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocType" value="{{ __('Type') }}" />
                        <select class= "select-category" name="DocType" id="DocType">
                        @if ($data->count())
                                <option>{{ $data->TypeTitle }} ( {{ $data->TypeCode }} )</option>
                                
                                    {{-- <option value= {{ $item->TypeId }} {{ ($data == $SelectedType) ? 'selected' : '' }}>{{ $data->TypeTitle }}  ( {{ $item->TypeCode }} )</option> --}}
                                @if (old('data')==$data->TypeId)
                                
                                    <option value= {{ $data->TypeId }} selected>{{ $data->TypeTitle }}  ( {{ $data->TypeCode }} )</option>
                                @else
                                    <option value= {{ $data->TypeId }} >{{ $data->TypeTitle }}  ( {{ $data->TypeCode }} )</option>
                                @endif
                               
                            @else
                                <option>-- Enter New Type in the Menu --</option>
                            @endif
                        </select>
                    </div>
                </th>
            </tr>
            <tr>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocReceivedBy" value="{{ __('Received By') }}" />
                        <x-jet-input id="DocReceivedBy" class="block mt-1 w-full" type="text" name="DocReceivedBy" :value="old('Recieved By')" value="{{ $data->ReceiverId }}" required autofocus />
                    </div>
                </th>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocReceivedDate" value="{{ __('Received Date') }}" />
                        <x-jet-input id="DocReceivedDate" class="block mt-1 w-full" style="border-radius:5px;" type="text" id="DocReceivedDate" name="DocReceivedDate" :value="old('Recieved Date')" value="{{ $data->created_at }}" required autofocus />
                    </div>
                </th>
            </tr>
            <table>
                <th>
                <div class="upload-file">
                        <x-jet-label class="add-doc-label" id="DocName" value="{{ __('Attach Document') }}" />
                        <div class="file-upload-border">
                            <x-jet-label style="text-align:center; padding-top:5px;" class="add-doc-label" id="DocName" value="{{ $data->DocumentFileName }}" />
                        </div>
                    </div>
                </th>
            </table>
        </table>
        <x-jet-button class="add-doc-button">
            {{ __('Save Changes') }}
        </x-jet-button>
    </form>
</center>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
// Upload File
Filevalidation = () => { 
    const fi = document.getElementById('DocFile');

    if (fi.files.length > 0) { 
        for (const i = 0; i <= fi.files.length - 1; i++) { 
            const fsize = fi.files.item(i).size; 
            const file = Math.round((fsize / 1000)); 

            if (file <= 1000) {
                document.getElementById('file-size').innerHTML = '<b>'+ file + '</b> KB'; 
            } 
            else if (file >= 1000 && file <= 1000000) {
                document.getElementById('file-size').innerHTML = '<b>'+ Math.round(file/1000) + '</b> MB';
            }
            else if (file >= 1000000) {
                document.getElementById('file-size').innerHTML = '<b>'+ Math.round(file/1000000) + '</b> GB';
            } 

        }
    } 
}
// Show File
const DocFile = document.getElementById('DocFile');
const fileChosen = document.getElementById('file-chosen');

DocFile.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})

// Date Picker
$( function() {
    $( "#DocReceivedDate" ).datepicker();
});
  </script>