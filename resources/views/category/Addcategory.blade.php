<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg table-background">
                @include('back.WhiteBack')
                <div class="user-search">
                    @include('search.CategorySearchBar')
                </div>
                <div class="add-head">
                    <li>
                        <div class="header-label2">
                            <h2>Category List</h2>
                        </div>
                    </li>

                    <div class="add-head-button" title="Add New Document Category">
                        <x-jet-button id="myBtn">
                            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Add
                        </x-jet-button>
                    </div>
                    @include('popup.AddCategoryPopup')
                </div>

                @include('alerts.Saved')
                <div class="table-style">
                    @include('tables.CategoryTable')
                </div>
            </div>
        </div>
    </div>     
    <script>
        // Category Modal
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close1")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
</x-base-layout>