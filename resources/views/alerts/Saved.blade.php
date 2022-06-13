
@if(Session::has('success'))
    <div id='hideMe' class="saved1">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@elseif (Session::has('failed'))
    <div id='hideMe' class="saved2">
        {{ Session::get('failed') }}
        @php
            Session::forget('failed');
        @endphp
    </div>
@elseif (Session::has('deleted'))
    <div id='hideMe' class="saved3">
        {{ Session::get('deleted') }}
        @php
            Session::forget('deleted');
        @endphp
    </div>
@endif