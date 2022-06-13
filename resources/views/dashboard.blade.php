<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg circleBody">
                <div class="p-6 sm:px-20">
                    <div class="mt-8 text-2xl font-bold slide">
                        <h1 class="dashboard-head1">Welcome to DOST-FPRDI OD-PS </h1> 
                        <h2 class="dashboard-head2">Document Management Information System </h2>
                    </div>
        
                    <div class="mt-8 slide2" style="margin-left:20px; margin-top:20px; margin-bottom:50px;">
                        <h6 class="dashboard-description">This information system helps the Office of the Director - Planning Staff (OD-PS) to store, manage, automatically organize, secure, and make easy access to the records and reports stored in the file system of the OD-PS. It will process the scanned documents by creating keywords and storing them in a database housed in the local server host of the institute. Keywords can be used to search a specific soft copy of the document and show where the file is physically located. It will help the users and the admin to search for a particular file. An admin can manage the files located in the information system.</h6>  
                    </div>

                    
                    <div class="grid grid-cols-1 md:grid-cols-3 slide3 dash-margin">
                        <div class="content-box">
                            <div class="ml-4 text-gray-600 leading-7 font-semibold">
                                <p class="content-text"><i class="fas fa-file-contract"></i>&nbsp;&nbsp;&nbsp;File Count: {{ $FileCount }}</p>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="ml-4 text-gray-600 leading-7 font-semibold">
                                <p class="content-text"><i class="fas fa-ruler"></i>&nbsp;&nbsp;&nbsp;Total File Size: {{ $FileSize }}</p>
                            </div>
                        </div>
        
                        <div class="content-box">
                            <div class="ml-4 text-gray-600 leading-7 font-semibold">
                                <p class="content-text"><i class="fa-solid fa-chart-pie"></i>&nbsp;&nbsp;&nbsp;Available Space: {{ $freeSpace }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>

