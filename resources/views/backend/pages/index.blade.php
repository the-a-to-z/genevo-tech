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
                                    <h4 class="title">Manage Pages</h4>
                                </div>

                                @if(hasPermission('create-page', $permissions))
                                    <div class="col-md-6">
                                        {!! btnToCreate('pages', 'New Page') !!}
                                    </div>
                                @endif

                            </div>

                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($allPages as $key => $page)

                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            {{ $page->display_name }}
                                        </td>
                                        <td>{{ $page->description }}</td>
                                        <td class="text-right">

                                            @if( hasPermission('edit-page', $permissions) )
                                                {!! btnToEdit('pages', $page->id) !!}
                                            @endif

                                            @if( hasPermission('delete-page', $permissions) )
                                            {!! btnDelete('pages', $page->id) !!}
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
                    html: 'You are about to delete a page. <br><br>If page is moved, the menu which links to this page will lead to 404 page.<br><br> Are you sure?'
                }
            });
        });
    </script>

@endsection