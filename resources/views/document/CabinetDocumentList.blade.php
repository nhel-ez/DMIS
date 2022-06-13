<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg table-background">
                @include('back.WhiteBack')
                <div class="user-search">
                    @include('search.CabinetDocumentListSearchBar')
                </div>
                <div class="add-head">
                    <li>
                        <div class="header-label2">
                            <h2>{{ $cabinet->CabinetName }} Cabinet - Document List</h2>
                        </div>
                    </li>
                    <div class="add-head-button" title="Assign Document">
                        <a href="#popup4">
                            <x-jet-button id="myBtn">
                                <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Assign
                            </x-jet-button>
                        </a>
                    </div>
                    @include('popup.AddCabinetDocumentPopup')
                </div>
                @include('alerts.Saved')
                <div class="table-style">
                    @include('tables.CabinetDocumentListTable')
                </div>
            </div>
        </div>
    </div>
    <script>
        // Assign Document Modal
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