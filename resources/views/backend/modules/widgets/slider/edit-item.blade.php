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
    <div class="hidden">
        {{ $key = 1 }}
        @foreach($slideDetail as $detail)
            {{ $key++ }}
        @endforeach
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="col-md-6">
                                <h4 class="title">
                                    Edit a Slideshow
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-fill btn-with-icon pull-right btnToCreate"
                                        id="addText">
                                    <i class="pe-7s-plus"></i>
                                    <p>Add Text</p>
                                </button>
                                <script>
                                    console.log({{$key}});

                                    var i = "{{$key}}";
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
                            </div>
                        </div>

                        {!! openFormUploadEdit('module/' . $module->id . '/slider/item', $sliderItem->id) !!}

                        <div class="content">

                            <div class="row">
                                <div class="col-md-4">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Current Image</label>
                                        <div class="currentSlideshow">
                                            <img src="{{url('uploads/slider/'.$sliderItem->image)}}"
                                                 alt="Current Slideshow Image"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text"
                                               name="title"
                                               class="form-control"
                                               placeholder="title"
                                               value="{{ (old('title') ? old(title) : $sliderItem->title) }}">

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
                            <div class="row">

                                @foreach($slideDetail as $index=>$detail)


                                    <div class="margin: 15px;">
                                        <h5> Text : {{++$index}}</h5>
                                        <div class="form-group" id="text">
                                            <div class="col-md-6">
                                                <label for="LineText">Text</label>
                                                <input type="text" name="lineText{{$index}}" class="form-control"
                                                       placeholder="Text Slideshow First Line"
                                                       value="{{ (old('lineText'.$index) ? old('lineText'.$index) : $detail->text) }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="ColorText">Color</label>
                                                <input type="color" name="colorText{{$index}}" class="form-control"
                                                       value="{{ (old('colorText'.$index) ? old('colorText'.$index) : $detail->color) }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="FontSizeText">Font Size (px)</label>
                                                <input type="number" name="fontSizeText{{$index}}" class="form-control"
                                                       value="{{ (old('fontSizeText'.$index) ? old('fontSizeText'.$index) : $detail->font_size) }}">
                                            </div>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row" id="texts">
                            </div>

                        </div>
                    </div>
                </div>

                {!! formEditFooter('modules/home-slideshow') !!}
                {!! closeForm() !!}
            </div>
        </div>
    </div>

@endsection
