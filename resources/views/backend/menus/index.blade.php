@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="title">Manage Menus</h4>
                                </div>

                                @if(hasPermission('create-menu', $permissions))
                                    <div class="col-md-6">
                                        {!! btnToCreate('menus', 'New Menu') !!}
                                    </div>
                                @endif

                            </div>

                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Menu Name</th>
                                    <th>Position</th>
                                    <th>Site</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($frontendMenus as $key => $menu)

                                    <tr>
                                        <td style="width: 80px;" class="td-input td-input-small">
                                            <input type="hidden" name="menu_id[]" value="{{ $menu->id }}">
                                            <input type="text"
                                                   name="default_order[]"
                                                   value="{{ $menu->default_order }}"
                                                   class="form-control input_menu_order"
                                            >
                                        </td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->menuPosition->display_name }}</td>
                                        <td>{{ $menu->menuSite->display_name }}</td>
                                        <td>{{ $menu->description }}</td>
                                        <td class="text-right">
                                            @if( hasPermission('edit-menu', $permissions) )
                                                {!! btnToEdit('menus', $menu->id) !!}
                                            @endif

                                            @if( hasPermission('delete-menu', $permissions) )
                                                {!! btnDelete('menus', $menu->id) !!}
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="{{ url('js/jquery.confirm-action.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.{!! btnDeleteHtmlClass() !!}').confirmAction({
                title: {
                    text: 'Deletion confirm!!'
                },
                message: {
                    html: 'You are about to delete a menu.<br><br> Are you sure?'
                }
            });

            $('input.input_menu_order').on('input', function () {
                var menuId = $(this).parent().find('input[name="menu_id[]"]').val();
                var newOrderValue = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "{{ backendUrl('menus/all/update') }}",
                    data: {menu_id: menuId, default_order: newOrderValue, '_token':"{{ csrf_token() }}"},
                    success: function( response ) {
                        $.notify({
                            icon: 'pe-7s-info',
                            message: response.message
                        }, {
                            type: response.message_type,
                            timer: 4000
                        });
                    }
                });
            });
        });
    </script>

@endsection