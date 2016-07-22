@extends('backend.layouts.master')

@section('style')

    <link href="{{ url('css/slideshow.css') }}" rel="stylesheet"/>
    <link href="{{ url('vendors/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ url('vendors/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

@endsection

@section('script')

    <script src="{{ url('vendors/jquery.filer/js/jquery.filer.min.js') }}"></script>
    <script src="{{ url('js/jquery.confirm-action.js') }}"></script>
    <script>
        $(document).ready(function () {
            /**
             * Upload item
             */
            $('.filer_input').filer({
                limit: 1,
                maxSize: 3,
                extensions: ['jpg', 'jpeg', 'png', 'gif'],
                changeInput: true,
                showThumbs: true
            });
        });
    </script>
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="col-md-6">
                                <h4 class="title">
                                    Add a new Slideshow
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-fill btn-with-icon pull-right btnToCreate"
                                        id="addText">
                                    <i class="pe-7s-plus"></i>
                                    <p>Add Text</p>
                                </button>
                            </div>
                        </div>

                    {!! openFormUploadCreate('module/' . $module->id . '/slider/item') !!}

                        <input type="hidden" name="slider_id" value="{{ $slider->id }}">

                    <div class="content">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload File</label>
                                    <input type="file"
                                           name="image"
                                           class="filer_input"
                                           value="{{ (old('fileUpload') ? old('fileUpload') : '') }}"
                                    >

                                    {!! formError($errors->first('image') ) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           placeholder="title"
                                           value="{{ (old('title') ? old('title') : '') }}">

                                    {!! formError($errors->first('title')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row" id="Note">
                            <div class="col-md-12">
                                <label for="Note" class="text-warning note">Note: recommand for image Slideshow are
                                    WIDTH: 450px (Should Keep Size 450px Fixed), HEIGHT: 1360px</label>
                            </div>
                        </div>
                        <div class="row" id="texts"></div>

                    </div>

                    {!! formCreateFooter('module/' . $module->id . '/slider/item') !!}

                    {!! closeForm() !!}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        var i = 1;
        function createTicketComponent() {

            var elements = [],
                    rootElement = document.createElement('div');
            rootElement.style.margin = '15px';

            elements.push('<h5> Text : ' + i + '</h5>');

            elements.push('<div class="form-group" id = "text' + i + '">');
            elements.push('<div class="col-md-6">');
            elements.push('<label for="LineText">Text</label>');
            elements.push('<input type="text" name="lineText' + i + '" class="form-control" placeholder="Text Slideshow First Line" value="">');

            elements.push('</div>');

            elements.push('<div class="col-md-2">');
            elements.push('<label for="ColorText">Color</label>');
            elements.push('<input type="color" name="colorText' + i + '" class="form-control">');
            elements.push('</div>');

            elements.push('<div class="col-md-2">');
            elements.push('<label for="FontSizeText">Font Size (px)</label>');
            elements.push('<input type="number" name="fontSizeText' + i + '" class="form-control" value="14">');
            elements.push('</div>');

            elements.push('</div>');
            elements.push('<div style="clear: both;"></div>');

            rootElement.innerHTML = elements.join('');

            return rootElement;
        }

        function onClickCreateTicketButton(event) {
            var button = event.target,
                    container = document.querySelector('#texts'),
                    component;

            if (i == 4) {
                component = '';

            } else {
                component = createTicketComponent();
            }

            container.appendChild(component);
            i++;
        }

        var buttons = document.getElementById('addText');
        buttons.addEventListener('click', onClickCreateTicketButton);
    </script>
@endsection
