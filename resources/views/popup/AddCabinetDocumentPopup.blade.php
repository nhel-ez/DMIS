<div id="myModal" class="modal">
    <div class="modal-content border-box">
        <div>
            <li><h2>Assign Document</h2></li>
            <li class="close-modal2"><span class="close2">&times;</span></li>
        </div>
        <center>
            <form name="autocomplete-textbox "id="autocomplete-textbox"  method="POST" action="{{ route('DrCabinet.store') }}">
                @csrf
                <th>
                    <div class="input-type">
                        <x-jet-label class="add-type-label" for="AssignDocument" value="{{ __('Document Title') }}" />
                        <x-jet-input id="AssignDocument" class="block mt-1 w-full" type="text" name="AssignDocument" :value="old('Document Title')" required autofocus />
                    </div>
                </th>
                <x-jet-button class="add-type-button" action="{{ route('DrCabinet.store') }}">
                    {{ __('Save') }}
                </x-jet-button>
            </form>
        </center>
    </div>
</div>

<script>
// Assign Document Auto Complete
$(document).ready(function() {
    $( "#AssignDocument" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: siteUrl + '/' +"autocomplete",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.name;
               }); 
  
               response(resp);
            }
        });
    },
    minLength: 2
 });
});
</script>