<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding-bottom:40px;">
                <div>
                    <li style="float:left;">
                        @include('back.BlackBack')
                    </li>

                    <center>
                        <li></li>
                    </center>

                    <li class="add-right-button">
                        <a href="{{  route('DrAcc.index') }}" title="Account List" class="right-button">
                            <x-jet-button>
                            <i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp;Accounts
                            </x-jet-button>
                        </a>
                    </li>
                </div>
                
                <center>
                    <div class="add-doc-header">
                        <h2>Create Account</h2>
                    </div>
                </center>
  
                <div>
                    @include('forms.AddAccount')
                </div>
            </div>
        </div>
    </div>
</x-base-layout>