@section('style')
    <link href="{{ url('css/modules/job-listing/frontend.css') }}" rel="stylesheet">
    <link href="{{ url('css/flat-pagination.css') }}" rel="stylesheet">
@endsection

@define($items = $data['widget']->items()->paginate($data['widget']->display_per_page))
@if(isset($data['category']))
    @define($items = $data['category']->items()->paginate($data['widget']->display_per_page))
@endif

@define($widget = $data['widget'])
@define($module = $data['module'])

<div id="{{ $module->name }}" class="job-listing">
    <section class="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Opening Job Opportunities</h4>
                </div>
            </div>
        </div>
    </section>

    @if($widget->show_category_filter == '1' && $widget->theme == 'grid')
        <div class="page-content gray-bg">

            <div class="container-fluid">
                <ul class="portfolio-filter">
                    <li class="active"><a href="#" data-filter="*"> All</a></li>
                    @foreach($widget->categories as $category)
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

    <div class="page-content items{{ ($widget->css_class ? ' ' . $widget->css_class : '') }}">

        <div class="container-fluid">

            @if($widget->theme == 'grid')
                <div class="row">
                    <div class="col-3">
                        @foreach($items as $item)

                            @define($categories = '');
                            @define($categoryDisplays = '');

                            @foreach($widget->categories as $category)
                                <?php $categories .= ' ' . $category->name;?>
                                <?php $categoryDisplays .= '<a href="#">' . $category->display_name . '</a>, ';?>
                            @endforeach

                            <div class="col-md-6{{ $categories }}">
                                <div class="featured-item">
                                    <div class="position-name">
                                        <span class="label">&nbsp;</span>
                                        <a href="{{ url(str_slug($widget->name) . '/' . str_slug($item->job_title)) }}"
                                           class="text">
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

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-pagination">
                            {!! $items->render() !!}
                        </div>
                    </div>
                </div>

            @else

                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="sidebar">
                                <h3>Categories</h3>
                                <ul class="icon-list">
                                    <li class="{{ Request::is($currentPage->name) ? 'active' : '' }}">
                                        <a href="{{ url('/' . $currentPage->name) }}" data-filter="*">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i> All
                                        </a>
                                    </li>

                                    @if($widget->show_category_filter == '1')
                                        @foreach($widget->categories as $category)
                                            @define($active = '')
                                            @if(Request::is($currentPage->name . '/category/' . $category->name))
                                                @define($active = 'active')
                                            @endif

                                            <li class="{{ $active }}" >
                                                <a href="{{ url('/' . $currentPage->name . '/category/' . $category->name) }}">
                                                    <i class="fa fa-angle-right"
                                                       aria-hidden="true"></i> {{ $category->display_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover table-job-listing">
                                    <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Close On</th>
                                        <th class="text-center">Share</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($items as $item)

                                        <tr>
                                            @if($item->close_on > addDay(3, date('Y-m-d')))

                                                <td>
                                                    <div class="icon">
                                                        <i class="fa fa-fw"></i>
                                                    </div>
                                                    <a href="{{ url(str_slug($currentPage->name) . '/' . str_slug($item->job_title) . '/' . $item->id) }}">
                                                        {{ $item->job_title }}
                                                    </a>
                                                </td>
                                                <td> {{ $item->company }} </td>
                                                <td> {{ displayDate($item->close_on) }} </td>
                                                <td class="has-socials has-socials-small">
                                                    @include(
                                                        'partials.socials-small', [
                                                        'title' => $item->job_title
                                                    ])
                                                </td>

                                            @elseif($item->close_on >= addDay(3, date('Y-m-d')))

                                                <td>
                                                    <div class="icon text-warning">
                                                        <i class="icon-lightbulb"></i>
                                                    </div>
                                                    <a href="{{ url(str_slug($currentPage->name) . '/' . str_slug($item->job_title) . '/' . $item->id) }}">
                                                        {{ $item->job_title }}
                                                    </a>
                                                </td>
                                                <td> {{ $item->company }} </td>
                                                <td>
                                                    <span class="text-warning">{{ displayDate($item->close_on) }}</span>
                                                </td>
                                                <td class="has-socials has-socials-small">
                                                    @include(
                                                        'partials.socials-small', [
                                                        'title' => $item->job_title
                                                    ])
                                                </td>

                                            @else

                                                <td>
                                                    <div class="icon text-danger">
                                                        <i class="icon-lightbulb"></i>
                                                    </div>
                                                    <a href="{{ url(str_slug($currentPage->name) . '/' . str_slug($item->job_title) . '/' . $item->id) }}">
                                                        {{ $item->job_title }}
                                                    </a>
                                                </td>
                                                <td> {{ $item->company }} </td>
                                                <td>
                                                    <span class="text-danger">{{ displayDate($item->close_on) }}</span>
                                                </td>
                                                <td class="has-socials has-socials-small">
                                                    @include(
                                                        'partials.socials-small', [
                                                        'title' => $item->job_title
                                                    ])
                                                </td>

                                            @endif
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="flat-pagination">
                                        {!! $items->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

        </div>
    </div>
</div>