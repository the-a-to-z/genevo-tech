@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                Home Page Slideshow
                            </h4>
                        </div>
                        <div class="content">

                            <div class="row wrap-slide">
                                @foreach($data as $slide)
								
									<div class="col-md-4 col-sm-6 col-lg-3">
										<div class="wrap-slide-item">
											<div class="wrap-slide-image">
												<img src="{{ uploadUrl('slideshow/'. $slide->image) }}" alt="" />
											</div>
											<div class="wrap-slide-title">
												{{ $slide->title }}
												
												{!! btnDelete('modules/home-slideshow', $slide->id) !!}
												
											</div>
										</div>
									</div>
								
								@endforeach
                            </div>

                            <div class="clearfix"></div>
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
                    html: 'You are about to delete an image.<br><br> Are you sure?'
                }
            });
        });
    </script>

@endsection