<div id="mySidenav" class="sidenav">
    <span class="closebutton" href="javascript:void(0)" onclick="closeNav()" title=" Close Menu"><i class="fas fa-bars"></i></span>
    <table class="admin">
        <th><i class="fas fa-user-circle admin_profile" style="font-size:30px;"></i></th>
        <th><p class="admin_account">&nbsp;&nbsp;&nbsp;{{ Auth::user()->name }}<br>&nbsp;&nbsp;&nbsp;{{ Auth::user()->email }}</p></th>
    </table>
    
    <a href="/dashboard"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a>
    
    <button class="dropdown-btn"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Document
        <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-container">
        <a href="{{  route('DrDoc.create') }}" title="Add New Document"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Add New Document</a>
        <a href="{{  route('DrDoc.index') }}" title="Document List"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;&nbsp;Document List</a>
        <a href="{{  route('DrType.index') }}" title="Document Type"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;&nbsp;Document Type</a>
        <a href="{{  route('DrCategory.index') }}" title="Document Category"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;&nbsp;Document Category</a>
    </div>

    <a href="{{  route('DrCabinet.index') }}" title="Cabinet List"><i class="fas fa-folder"></i>&nbsp;&nbsp;&nbsp;Cabinet List</a>
    
    @can('manage acc')
    <button class="dropdown-btn"><i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp;Account
        <i class="fa fa-caret-down"></i>
    </button>
    
    <div class="dropdown-container">
        <a href="{{  route('DrAcc.create') }}" title="Add New Account"><i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;&nbsp;Add New Account</a>
        <a href="{{  route('DrAcc.index') }}" title="Account List"><i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp;Account List</a>
    </div>
    @endcan
</div>
<!-- Menu Button -->   
    <div class="menu-button" title="Menu">
        <span onclick="openNav()"><i class="fas fa-bars"></i></span>
    </div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "270px";
    document.getElementById("main").style.marginLeft = "270px";
    document.getElementById("main2").style.marginLeft = "250px";
  }
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("main2").style.marginLeft= "0";
  }

    // Dropdown
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            }
            else {
            dropdownContent.style.display = "block";
            }
        });
    }
</script>