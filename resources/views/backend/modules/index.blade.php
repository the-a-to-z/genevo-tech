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
                                    <h4 class="title">Manage Modules</h4>
                                </div>

                                @if(hasPermission('create-module', $permissions))
                                    <div class="col-md-6">
                                        {!! btnToCreate('modules', 'New Module') !!}
                                    </div>
                                @endif

                            </div>

                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Display Name</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($modules as $key => $module)

                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            {{ $module->display_name }}
                                        </td>
                                        <td>
                                            {{ $module->name }}
                                        </td>
                                        <td>{{ $module->description }}</td>
                                        <td class="text-right">

                                            @if( hasPermission('edit-module', $permissions) )
                                                {!! btnToEdit('modules/' . $module->name) !!}
                                            @endif

                                            @if( hasPermission('delete-module', $permissions) )
                                                {!! btnDelete('modules', $module->id) !!}
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
                    html: 'You are about to delete a module.<br><br>This module will also be deleted from any page. <br><br> Are you sure?'
                }
            });
        });
    </script>

@endsection