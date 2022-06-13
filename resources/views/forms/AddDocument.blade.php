<center>
    @include('alerts.Saved')
    <form class="add-doc" method="POST" enctype="multipart/form-data" action="{{ route('DrDoc.store') }}">
        @csrf
        <table>
            <tr>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocTitle" value="{{ __('Title') }}" />
                        <x-jet-input id="DocTitle" class="block mt-1 w-full" type="text" name="DocTitle" :value="old('Title')" required autofocus />
                    </div>
                </th>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocTrackNo" value="{{ __('Tracking No.') }}" />
                        <x-jet-input id="DocTrackNo" class="block mt-1 w-full" type="text" name="DocTrackNo" :value="old('Tracking No.')" required autofocus />
                    </div>
                </th>
            </tr>
            <tr>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocCategory" value="{{ __('Category') }}" />
                        <select class= "select-category border-gray focus:border-indigo-300 rounded-md shadow-sm" name="DocCategory" id="DocCategory">
                            @if ($category->count())
                                <option>-- Select A Category --</option>
                                @foreach ($category as $categories)
                                    @if (old('item')==$categories->CategoryId)
                                        <option value= {{ $categories->CategoryId }} selected>{{ $categories->CategoryTitle }}</option>
                                    @else
                                        <option value= {{ $categories->CategoryId }} >{{ $categories->CategoryTitle }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option>-- Add New Category in the Menu --</option>
                            @endif
                        </select>
                    </div>
                </th>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocType" value="{{ __('Type') }}" />
                        <select class= "select-type border-gray focus:border-indigo-300 rounded-md shadow-sm" name="DocType" id="DocType">
                            @if ($data->count())
                                <option>-- Select A Type --</option>
                                @foreach ($data as $item)
                                    {{-- <option value= {{ $item->TypeId }} {{ ($item == $SelectedType) ? 'selected' : '' }}>{{ $item->TypeTitle }}  ( {{ $item->TypeCode }} )</option> --}}
                                @if (old('item')==$item->TypeId)
                                
                                    <option value= {{ $item->TypeId }} selected>{{ $item->TypeTitle }}  ( {{ $item->TypeCode }} )</option>
                                @else
                                    <option value= {{ $item->TypeId }} >{{ $item->TypeTitle }}  ( {{ $item->TypeCode }} )</option>
                                @endif
                                @endforeach
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
                        <x-jet-label class="add-doc-label" for="DocReceivedBy" value="{{ __('Recieved By') }}" />
                        <x-jet-input id="DocReceivedBy" class="block mt-1 w-full" type="text" name="DocReceivedBy" :value="old('Recieved By')" required autofocus />
                    </div>
                </th>
                <th>
                    <div class="input-doc">
                        <x-jet-label class="add-doc-label" for="DocReceivedDate" value="{{ __('Recieved Date') }}" />
                        <x-jet-input id="DocReceivedDate" class="block mt-1 w-full" type="text" name="DocReceivedDate" :value="old('Recieved Date')" required autofocus />
                    </div>
                </th>
            </tr>
            <table class="uploadfile">
                <th>
                <center>
                    <div class="upload-file">
                    <x-jet-label class="add-doc-label" value="{{ __('Attach Document') }}" />
                        <div id="file-remove" class="file-upload-border">
                            <input type="file" style="position: absolute; height: 55px; width:65%; margin-left:-290px; margin-top:-10px; opacity: 0;"for="DocFile" id="DocFile" name="DocFile" accept=".pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" onchange="Filevalidation()" required>
                            <li><x-jet-label class="file-drag" id="DocName" for="DocFile">
                            <i class="fa-solid fa-cloud-arrow-up"></i>&nbsp;&nbsp;&nbsp;Choose a file or drag it here
                            <li><div id="show-file" class="show-file">
                            <span id="file-chosen"></span>
                            <span id="file-size"></span>
                            </div></li>
                            </x-jet-label></li> 
                        </div>
                    </div>
                </center>
                </th>
            </table>
        </table>
        <x-jet-button class="add-doc-button">
            {{ __('Add Document') }}
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