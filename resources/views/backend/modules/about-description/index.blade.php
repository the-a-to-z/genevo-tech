@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            @if($data->id)
            {!! openFormEdit('modules/about-description', $data->id) !!}
            @else
            {!! openFormCreate('modules/about-description') !!}
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       placeholder="Title..."
                                       autofocus
                                       value="{{ ($data->title ? $data->title : '') }}">
                            </h4>
                        </div>
                        <div class="content">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Description </h4>

                                        @section('text-editor')
                                            @parent
                                        @endsection
                                        {!! textEditor('description', ($data->description ? $data->description : '')) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>

                <footer class="form-fixed-footer">
                    <div class="container-fluid">
                        <button type="submit"
                                class="btn btn-info btn-fill pull-right m-left-5"
                                id="btnSubmit">Update
                        </button>

                        <a href="{{ url(config('constants.backend-url') . 'roles') }}"
                           class="btn btn-danger btn-fill pull-right">Cancel</a>
                    </div>
                </footer>

                {!! closeForm() !!}

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
                    html: 'You are about to delete a module.<br><br> Are you sure?'
                }
            });
        });
    </script>

@endsection