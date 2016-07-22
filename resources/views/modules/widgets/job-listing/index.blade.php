@section('style')
    <link href="{{ url('css/job-listing.css') }}" rel="stylesheet">
    <link href="{{ url('css/flat-pagination.css') }}" rel="stylesheet">
@endsection

<div id="{{ $moduleName }}" class="job-listing">
    <section class="page-title bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Opening Job Opportunities</h4>
                </div>
            </div>
        </div>
    </section>

    @if($data['portfolio']->show_category_filter == '1')
    <div class="page-content gray-bg">

        <div class="container">
            <ul class="portfolio-filter">
                <li class="active"><a href="#" data-filter="*"> All</a></li>
                @foreach($data['portfolio']->categories as $category)
                    <li>
                        <a href="#" data-filter=".{{ $category->name }}">
                            {{ $category->display_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="page-content items{{ ($data['portfolio']->css_class ? ' ' . $data['portfolio']->css_class : '') }}">

        <div class="container">

            <div class="row">
                <div class="col-3">
                    @foreach($data['portfolio']->paginateItems() as $item)

                        @define($categories = '');
                        @define($categoryDisplays = '');

                        @foreach($item->itemCategory as $itemCategory)
                            <?php $categories .= ' ' . $itemCategory->category->name;?>
                            <?php $categoryDisplays .= '<a href="#">' . $itemCategory->category->display_name . '</a>, ';?>
                        @endforeach

                        <div class="col-md-6{{ $categories }}">
                            <div class="featured-item">
                                <div class="position-name">
                                    <span class="label">&nbsp;</span>
                                    <a href="{{ url(str_slug($moduleName) . '/' . str_slug($item->job_title)) }}" class="text">
                                        {{ $item->job_title }}
                                    </a>
                                </div>
                                <div class="company-name">
                                    <span class="label">Company </span>
                                    <span class="text">{{ $item->company }}</span>
                                </div>
                                <div class="close-date">
                                    <span class="label">Close on </span>
                                    <span class="text">{{ displayDate($item->close_on) }}</span>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-pagination">
                            {!! $data['portfolio']->paginateItems()->render() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>