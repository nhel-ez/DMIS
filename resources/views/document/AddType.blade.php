<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg table-background">
                @include('back.WhiteBack')
                <div class="user-search">
                    @include('search.TypeSearchBar')
                </div>
                <div class="add-head">
                    <li>
                        <div class="header-label2">
                            <h2>Type List</h2>
                        </div>
                    </li>

                    <div class="add-head-button" title="Add New Document Type">
                        <x-jet-button id="myBtn">
                            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Add
                        </x-jet-button>
                    </div>
                    @include('popup.AddTypePopup')
                </div>
                @include('alerts.Saved')
                <div class="table-style">
                    @include('tables.TypeTable')
                </div>
            </div>
        </div>
    </div>
    <script>
        // Type Modal
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close2")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
</x-base-layout>