<center>
    <div class="table-box" id="accountTable">
        <table class="min-w-full divide-gray-200 scroll" id="AccountTable">
            <thead>
                <tr>
                    <th class="px-6 show-account bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 show-account bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 show-account bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 show-account bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Created</th>
                    <th class="px-6 show-account bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" data-sortable = "false"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-gray-200">
                @csrf
                @if ($data->count())
                    @foreach ($data as $item)
                    <tr>
                        <td class="px-6 py-4 show-data text-sm whitespace-no-wrap">{{ $item->id }}</td>
                        <td class="px-6 py-4 show-data text-sm whitespace-no-wrap">{{ $item->name }}</td>
                        <td class="px-6 py-4 show-data text-sm whitespace-no-wrap">{{ $item->email }}</td>
                        <td class="px-6 py-4 show-data text-sm whitespace-no-wrap">{{ $item->created_at }}</td>
                        <td class="show-account-option  text-center text-sm">
                            <a class="view-button" href="{{ route('DrAcc.show',$item->id) }}">
                            <x-jet-button type="submit" style="border-radius:24px; background-color:white; width:112px; height:38px; font-size:13px; font-weight:500; text-align:center; opacity:75%;" class="btn2 btn--svg2 js-animated-button">
                            <span class="btn--svg__label2"><i class="fa-solid fa-eye"></i>&nbsp;{{ __('View') }}</span>
                                <svg class="btn--svg__circle2" width="100%" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60">
                                    <circle class="js-discover-circle" fill="black" cx="30" cy="30" r="28.7"></circle>
                                </svg>
                                <svg class="btn--svg__border2" width="110px" height="38px" x="0px" y="0px" preserveaspectratio="none" viewBox="2 29.3 56.9 13.4" enable-background="new 2 29.3 56.9 13.4">
                                    <g class="btn--svg__border--left2 js-discover-left-border" id="Calque_2">
                                        <path fill="none" stroke="black" stroke-width="0.5" stroke-miterlimit="1" d="M30.4,41.9H9c0,0-6.2-0.3-6.2-5.9S9,30.1,9,30.1h21.4"></path>
                                    </g>
                                    <g class="btn--svg__border--right2 js-discover-right-border" id="Calque_3">
                                        <path fill="none" stroke="black" stroke-width="0.5" stroke-miterlimit="1" d="M30.4,41.9h21.5c0,0,6.1-0.4,6.1-5.9s-6-5.9-6-5.9H30.4"></path>
                                    </g>
                                </svg>
                            </x-jet-button>
                            </a>

                            <form action ="{{ action('AccountController@destroy', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="delete-confirm-ark">
                                <x-jet-danger-button type="submit" style="border-radius:24px; background-color:white; width:112px; height:38px; font-size:14px; font-weight:500; text-align:center; opacity:75%;" class="btn btn--svg js-animated-button" onclick="return confirm('Are you sure you want to delete this item?')">
                                <span class="btn--svg__label"><i class="fas fa-trash-alt"></i>&nbsp;{{ __('Delete') }}</span>
                                <svg class="btn--svg__circle" width="100%" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60">
                                    <circle class="js-discover-circle" fill="red" cx="30" cy="30" r="28.7"></circle>
                                </svg>
                                <svg class="btn--svg__border" width="110px" height="38px" x="0px" y="0px" preserveaspectratio="none" viewBox="2 29.3 56.9 13.4" enable-background="new 2 29.3 56.9 13.4">
                                    <g class="btn--svg__border--left js-discover-left-border" id="Calque_2">
                                        <path fill="none" stroke="red" stroke-width="0.5" stroke-miterlimit="1" d="M30.4,41.9H9c0,0-6.2-0.3-6.2-5.9S9,30.1,9,30.1h21.4"></path>
                                    </g>
                                    <g class="btn--svg__border--right js-discover-right-border" id="Calque_3">
                                        <path fill="none" stroke="red" stroke-width="0.5" stroke-miterlimit="1" d="M30.4,41.9h21.5c0,0,6.1-0.4,6.1-5.9s-6-5.9-6-5.9H30.4"></path>
                                    </g>
                                </svg>
                                </x-jet-danger-button>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach                  
                @else
                @endif 
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        // Data Tables
        $(document).ready( function () {
            var account = $('#AccountTable').DataTable({
                language: { search: '', searchPlaceholder: "Search...", oPaginate: {
                sNext: '<i class="fa-solid fa-angles-right"></i>',
                sPrevious: '<i class="fa-solid fa-angles-left"></i>',
                dom: 'lrtip'
                }
            },
            drawCallback: function(settings) {
                var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            }
        });

        // Data Table Search
        $('#accountTable').show();

        $('#mySearchAccount').keyup( function() {
            $('#accountTable').show();
            account.search($(this).val()).draw();
        } );

        console.log('#AccountTable');
        } );     

    </script>
</center>