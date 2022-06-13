<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <li style="float:left;">
                        @include('back.BlackBack')
                    </li>

                    <center>
                        <li></li>
                    </center>

                    <li class="add-right-button">
                        <a href="{{  route('DrDoc.index') }}" title="Document List" class="right-button">
                            <x-jet-button class="right-button" >
                                <i class="fa-solid fa-file"></i>&nbsp;&nbsp;&nbsp;Documents
                            </x-jet-button>
                        </a>
                        <x-jet-button class="right-button" title="Category" id="myBtn1">
                            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Category
                        </x-jet-button>
                        <x-jet-button class="right-button" title="Type" id="myBtn2">
                            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Type
                        </x-jet-button>
                    </li>
                </div>
                @include('popup.DocumentAddCategoryPopup')
                @include('popup.DocumentAddTypePopup')
   
                <center>
                    <div class="add-doc-header">
                        <h2>Edit Document</h2>
                    </div>
                </center>
                <div>
                    @include('forms.EditDocument')
                </div>
            </div>
        </div>
    </div>
    <script>
        // Category Modal
        var modal1 = document.getElementById("myModal1");
        var btn1 = document.getElementById("myBtn1");
        var span1 = document.getElementsByClassName("close1")[0];
 
        btn1.onclick = function() {
            modal1.style.display = "block";
        }
        span1.onclick = function() {
            modal1.style.display = "none";
        }

        // Type Modal
        var modal2 = document.getElementById("myModal2");
        var btn2 = document.getElementById("myBtn2");
        var span2 = document.getElementsByClassName("close2")[0];

        btn2.onclick = function() {
            modal2.style.display = "block";
        }
        span2.onclick = function() {
            modal2.style.display = "none";
        }
    </script>
</x-base-layout>