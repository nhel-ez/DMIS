<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg table-background">
                @include('back.WhiteBack')
                <div class="user-search">
                    @include('search.AccountSearchBar')
                </div>
                <div class="add-head">
                    <li>
                        <div class="header-label2">
                            <h2>Account List</h2>
                        </div>
                    </li>
                    <div class="add-head-button" title="Add New Accout">
                        <a href="{{  route('DrAcc.create') }}">
                            <x-jet-button>
                                <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Create
                            </x-jet-button>
                        </a>
                    </div>
                    @include('alerts.Saved')
                    <div class="table-style">
                        @include('tables.AccountTable')
                    </div>
                </div>
            </div>
        </div>
    </div>     
</x-base-layout>