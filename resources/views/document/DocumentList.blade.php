<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg table-background">
                @include('back.WhiteBack')
                <div class="user-search">
                    @include('search.DocumentListSearchBar')
                </div>
                <div class="add-head">
                    <li>
                        <div class="header-label2">
                            <h2>Document List</h2>
                        </div>
                    </li>
                    <div class="add-head-button" title="Assign Document">
                        <a href="{{ route('DrDoc.create') }}">
                            <x-jet-button>
                                <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Add
                                </x-jet-button>
                        </a>
                    </div>
                </div>
                @include('alerts.Saved')
                <div class="table-style">
                    @include('tables.DocumentListTable')
                </div>
            </div>
        </div>
    </div> 
</x-base-layout>