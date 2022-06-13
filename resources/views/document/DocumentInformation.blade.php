<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @include('back.BlackBack')
                @csrf
                @foreach ($data as $item )
                    <li>
                        <div class="header-label1">
                            <h2>Document Information</h2>
                        </div>
                    </li>
                    @can('edit', $item)
                        <div class="add-head-button">
                            <a href="{{  route('DrDoc.edit', $item->id) }}" >
                                <x-jet-button>
                                <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Edit
                                </x-jet-button>
                            </a>
                        </div>
                    @endcan
                    <div class="info-content">
                        <div class="info">
                            <li><i class="fas fa-file-alt"></i></li>
                            <li><x-jet-label class="add-info-label" for="DocTrackingNo" value="{{ __('Tracking No:') }}" /></li>
                            <li><x-jet-label class="add-info-label" for="DocTrackinNo" value="" />{{ $item->DocumentTrackNo }}</li>
                        </div>
                        <div class="info">
                            <li><i class="fas fa-file-alt"></i></li>
                            <li><x-jet-label class="add-info-label" for="DocTitle" value="{{ __('Title:') }}" /></li>
                            <li><x-jet-label class="add-info-label" for="DocTitle" value="" />{{ $item->DocumentTitle }}</li>
                        </div>
                        <div class="info">
                            <li><i class="fas fa-file-alt"></i></li>
                            <li><x-jet-label class="add-info-label" for="DocCategory" value="{{ __('Category:') }}" /></li>
                            <li><x-jet-label class="add-info-label" for="DocCategory" value="" />{{ $item->CategoryTitle }}</li>
                        </div>
                        <div class="info">
                            <li><i class="fas fa-file-alt"></i></li>
                            <li><x-jet-label class="add-info-label" for="DocType" value="{{ __('Type:') }}" /></li>
                            <li><x-jet-label class="add-info-label" for="DocType" value="" />{{ $item->TypeTitle }}</li>
                        </div>
                        <div class="info">
                            <li><i class="fas fa-user"></i></li>
                            <li><x-jet-label class="add-info-label" for="DocReciever" value="{{ __('Received by:') }}" /></li>
                            <li><x-jet-label class="add-info-label" for="DocReciever" value="" />{{ $item->ReceiverId }}</li>
                        </div>
                        <div class="info">
                            <li><i class="fas fa-calendar-alt"></i></li>
                            <li><x-jet-label class="add-info-label" for="DocDate" value="{{ __('Date Created:') }}" /></li>
                            <li><x-jet-label class="add-info-label" for="DocDate" value="" />{{ $item->created_at }}</li>
                        </div>
                        <div class="info">
                            <li><i class="fas fa-paperclip"></i></li>
                            <li><x-jet-label class="add-info-label" for="DocFile" value="{{ __('Attached File:') }}" /></li>
                            <li><x-jet-label class="add-info-label" for="DocFile" value="" />{{ $item->DocumentFileName }}</li>
                        </div>

                        <div class="info">
                            <li><i class="fas fa-paperclip"></i></li>
                            <li><x-jet-label class="add-info-label" for="DocFile" value="{{ __('Get File:') }}" /></li>
                            <li>
                                <a onclick='window.open("{{ $item->DocumentFilePath }}", "_blank", "width=700, height=700");'>
                                    <x-jet-button>
                                        View
                                    </x-jet-button>
                                </a>
                            </li>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-base-layout>