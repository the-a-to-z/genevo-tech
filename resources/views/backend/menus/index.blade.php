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
                                        {!! btnToCreate('menus/create', 'New Menu') !!}
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

                                @foreach($allMenus as $key => $menu)

                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->menuPosition->display_name }}</td>
                                        <td>{{ $menu->menuSite->display_name }}</td>
                                        <td>{{ $menu->description }}</td>
                                        <td class="text-right">

                                            @if( hasPermission('edit-menu', $permissions) )
                                            <a href="{{ url( config('constants.backend-url') . 'permissions/' . $menu->id . '/edit') }}" class="btn btn-primary btn-mini">
                                                <i class="fa fa-wrench"></i>
                                            </a>
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
            $('.btnSubmitDelete').confirmAction({
                title: {
                    text: 'Deletion confirm!!'
                },
                message: {
                    html: 'You are about to delete a permission.<br><br> Are you sure?'
                }
            });
        });
    </script>

@endsection