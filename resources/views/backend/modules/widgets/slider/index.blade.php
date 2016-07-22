@extends('backend.layouts.master')
@section('style')

<link href="{{ url('css/slideshow.css') }}" rel="stylesheet"/>

@endsection
@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
							<div class="raw">
								<div class="col-md-6">
									<h4 class="title">
										Slider
									</h4>
								</div>
                            
								@if(hasPermission('edit-module', $permissions))
									<div class="col-md-6">
										{!! btnToCreate('module/' . $module->id. '/slider/item', 'Add slide item') !!}
									</div>
								@endif
							</div>
                        </div>
                        <div class="content slideshow">

                            <div class="row wrap-slide">
                                @foreach($items as $item)
									
										<div class="col-md-4 col-sm-6 col-lg-3">
											<div class="wrap-slide-item">
												<div class="wrap-slide-image">
													<img src="{{ url(uploadPath('slider/'. $item->image)) }}" alt="" />
												</div>
												<div class="wrap-slide-title">
													{{ $item->title }}
													{!! btnDelete('module/' . $module->id . '/slider/item', $item->id) !!}
													{!! btnToEdit('module/' . $module->id . '/slider/item', $item->id) !!}
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