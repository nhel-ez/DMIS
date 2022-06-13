<x-base-layout>
    <div class="py-10 slide-table">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @include('back.BlackBack')
                <li>
                    <div class="header-label1">
                        <h2>Account Information</h2>
                    </div>
                </li>
                <div class="add-head-button" title="Edit Information">
                    <a href="{{  route('DrAcc.edit', $data->id) }}">
                        <x-jet-button>
                            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Edit
                        </x-jet-button>
                    </a>
                </div>
                <div class="info-content">
                    <div class="info">
                        <li><i class="fas fa-user"></i></li>
                        <li><x-jet-label class="add-info-label" for="name" value="{{ __('Name:') }}" /></li>
                        <li><x-jet-label class="add-info-label" for="name" value="{{ $data->name }}" /></li>
                    </div>
                    <div class="info">
                        <li><i class="fas fa-envelope"></i></li>
                        <li><x-jet-label class="add-info-label" for="email" value="{{ __('Email:') }}" /></li>
                        <li><x-jet-label class="add-info-label" for="email" value="{{ $data->email }}" /></li>
                    </div>
                    <div class="info">
                        <li><i class="fas fa-calendar-alt"></i></li>
                        <li><x-jet-label class="add-info-label" for="date_created" value="{{ __('Date Created:') }}" /></li>
                        <li><x-jet-label class="add-info-label" for="date_created" value="{{ $data->created_at }}" /></li>
                    </div>
                    <div class="info">
                        <li><i class="fas fa-calendar-alt"></i></li>
                        <li><x-jet-label class="add-info-label" for="date_updated" value="{{ __('Date Updated:') }}" /></li>
                        <li><x-jet-label class="add-info-label" for="date_updated" value="{{ $data->updated_at }}" /></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>