@define($widget = $data['widget'])
@define($module = $data['module'])
@define($item = $data['item'])

@section('style')
    <link href="{{ url('css/modules/job-listing/frontend.css') }}" rel="stylesheet">
@endsection

<div class="job-listing-detail">

    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">
                        @if(isset($data['currentMenu']))
                            <a href="{{ url('/' . $currentPage->name) }}" class="inactive-link">
                                {{ $widget->title }}
                            </a>
                        @else
                            <a href="{{ url($module->name) }}">
                                {{ $widget->title }}
                            </a>
                        @endif
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="body-content">
        <div class="page-content">
            <div class="container">

                <div class="row">

                    <div class="col-md-12">
                        <!--classic image post-->
                        <div class="job-listing-content">
                            <h3 class="job-title">
                                <a href="#">{{ $item->company }}</a>
                            </h3>
                            <h4>
                                <span class="light">Company: </span> <span class="bold">{{ $item->company }}</span>
                            </h4>
                            <h4>
                                <span class="light">Close on: </span>
                                @if($item->close_on > addDay(3, date('Y-m-d')))
                                    <span class="bold">{{ displayDate($item->close_on) }}</span>
                                @elseif($item->close_on >= addDay(3, date('Y-m-d')))
                                    <span class="bold text-warning">{{ displayDate($item->close_on) }}</span>
                                @else
                                    <span class="bold text-danger">{{ displayDate($item->close_on) }}</span>
                                @endif
                            </h4>

                            <div class="description">
                                {!! $item->description !!}
                            </div>

                            <hr>

                            <div class="clearfix inline-block m-bot-50">
                                <h5 class="text-uppercase social-area-title">Share Post </h5>

                                @include('partials.socials', ['title' => $item->job_title])
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
</div>