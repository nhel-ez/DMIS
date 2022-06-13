<x-user-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg">
            <div class="user-search">
                @include('search.UserSearchBar')
            </div>
            <div class="table-style2">
                @include('tables.UserTable')
            </div>
        </div>
        </div>
    </div>
</x-user-layout>    

