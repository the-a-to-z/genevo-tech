@extends('backend.layouts.master')

@section('content')

    @define($editWidget = ($widget && (isset($widget->id) ? $widget->id : null) != null))

    <div class="content">
        <div class="container-fluid">

            @if($widget && (isset($widget->id) ? $widget->id : null) != null)
            {!! openFormEdit(config('module.widget.job-listing.url'), $widget->id) !!}
            @else
            {!! openFormCreate(config('module.widget.job-listing.url')) !!}
            @endif

            <input type="hidden" name="module_id" value="{{ $module->id }}">

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
                                       value="{{ ($widget ? $widget->title : '') }}">
                            </h4>
                        </div>

                        <div class="content">
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    @define( $theme = old('theme') ? old('theme') : '')

                                    @if($editWidget)
                                        @define( $theme = old('theme') ? old('theme') : $widget->theme)
                                    @endif

                                    <label {{ $theme == null ? ' selected': '' }}>Display as</label>
                                    <select name="theme" class="cd-select">
                                        <option value=""{{ $theme == null ? ' selected': '' }} class="fa fa-list">
                                            List
                                        </option>
                                        <option value="grid"{{ $theme == 'grid' ? ' selected': '' }} class="fa fa-th-large">
                                            Grid
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Background color</label>
                                    <select name="css_class" class="cd-select">
                                        @define( $cssClass = old('css_class') ? old('css_class') : '')

                                        @if($editWidget)
                                            @define( $cssClass = old('css_class') ? old('css_class') : $widget->css_class)
                                        @endif

                                        <option value=""{{ $cssClass == null ? ' selected': '' }}>
                                            Default
                                        </option>
                                        <option value="gray-bg"{{ $cssClass == 'gray-bg' ? ' selected': '' }}>
                                            Gray
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Show category</label>
                                    <select name="show_category_filter" class="cd-select">

                                        @define( $showCategoryFilter = old('show_category_filter') ? old('show_category_filter') : '')

                                        @if($editWidget)
                                            @define( $showCategoryFilter = old('show_category_filter') ? old('show_category_filter') : $widget->show_category_filter)
                                        @endif

                                        <option value="1"{{ $showCategoryFilter == '1' ? ' selected': '' }}>
                                            Yes
                                        </option>
                                        <option value="0"{{ $showCategoryFilter == '0' ? ' selected': '' }}>
                                            No
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Number of display per page</label>

                                    @define( $displayPerPage = old('display_per_page') ? old('display_per_page') : '')

                                    @if($editWidget)
                                        @define( $displayPerPage = old('display_per_page') ? old('display_per_page') : $widget->display_per_page)
                                    @endif
                                    <input type="number"
                                           name="display_per_page"
                                           class="form-control"
                                           value="{{ $displayPerPage }}"
                                    >
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            @if($editWidget)
                {!! formEditFooter('modules') !!}
            @else
                {!! formCreateFooter('modules') !!}
            @endif

            {!! closeForm() !!}

            @if($editWidget)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">

                            <div class="row">
                                <div class="col-md-12">
                                    {!! btnToCreate('module/' . $module->id . '/job-listing/create-item', 'New job', false) !!}

                                    <a href="{{ backendUrl('module/' . $module->id . '/job-listing/category') }}" class="btn btn-fill btn-with-icon pull-right btnToCreate">
                                        <i class="pe-7s-ticket"></i> <p>New category</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="content has-datatable">

                            @if($items)
                            <div class="table-responsive table-full-width">
                                <table class="table table-hover" id="job-listing-table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Close On</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    {{--<tbody>--}}

                                    {{--@foreach($items as $key => $item)--}}

                                        {{--<tr>--}}
                                            {{--<td>{{ ++$key }}</td>--}}
                                            {{--<td>--}}
                                                {{--{{ $item->job_title }}--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--{{ $item->company }}--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--@if($item->close_on > addDay(3, date('Y-m-d')))--}}
                                                    {{--{{ displayDate($item->close_on) }}--}}
                                                {{--@elseif($item->close_on >= addDay(3, date('Y-m-d')))--}}
                                                    {{--<span class="text-warning">{{ displayDate($item->close_on) }}</span>--}}
                                                {{--@else--}}
                                                    {{--<span class="text-danger">{{ displayDate($item->close_on) }}</span>--}}
                                                {{--@endif--}}
                                            {{--</td>--}}
                                            {{--<td class="text-right">--}}
                                                {{--{!! btnToEdit('module/' . $module->id . '/job-listing/item', $item->id) !!}--}}

                                                {{--{!! btnDelete('module/' . $module->id. '/job-listing/delete-item', $item->id) !!}--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}

                                    {{--@endforeach--}}

                                    {{--</tbody>--}}
                                </table>

                            </div>

                            @endif

                        </div>
                    </div>
                </div>

            </div>
            @endif

        </div>
    </div>

@endsection

@section('style')

    <link href="{{ url('vendors/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ url('vendors/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ url('css/image-grid.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('vendors/SimpleDropDownEffects/css/basic.css') }}">

@endsection

@section('script')

    <script src="{{  url('vendors/SimpleDropDownEffects/js/modernizr.custom.63321.js')  }}"></script>
    <script src="{{  url('vendors/SimpleDropDownEffects/js/jquery.dropdown.js')  }}"></script>
    <script src="{{ url('js/jquery.confirm-action.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.cd-select').each(function () {
                $(this).dropdown({
                    gutter: 0,
                    stack: false
                });
            });

            /*
             * Create job listing datatable
             */
            $('#job-listing-table').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 0, "desc" ]],
                ajax: '{!! backendUrl('module/' . $module->id . '/job-listing/item-data') !!}',
                columns: [
                    {data: 'id'},
                    {data: 'job_title'},
                    {data: 'company'},
                    {
                        data: 'close_on',
                        render: function (date, type, full, meta) {
                            var close_on = moment(date);
                            var now = moment();

                            var diffDates = close_on.diff(now, 'days');

                            if(diffDates <= 0) {
                                close_on = '<span class="text-danger">' + moment(date).format("MMMM Do, YYYY") + ' (overdue)</span>';
                            } else if (diffDates < 7) {
                                close_on = '<span class="text-warning">' +
                                        moment(date).format("MMMM Do, YYYY") +
                                        ' (' + diffDates + ' days left)</span>';
                            } else {
                                close_on = '<span>' + moment(date).format("MMMM Do, YYYY") + '</span>';
                            }

                            return close_on;
                        }
                    },
                    {
                        data: null,
                        className: 'text-right',
                        sortable: false,
                        render: function (data, type, full, meta) {
                            var btn = " ";

                            btn += helper.btnToEdit('module/{{ $module->id }}/job-listing/item/' + data.id + '/edit');
                            btn += ' ' + helper.btnDelete('module/{{ $module->id }}/job-listing/delete-item', data.id);

                            return btn;
                        }
                    }
                ],
                fnDrawCallback: function () {
                    $('.{!! btnDeleteHtmlClass() !!}').confirmAction({
                        title: {
                            text: 'Deletion confirm!!'
                        },
                        message: {
                            html: 'Are you sure to delete this job?'
                        }
                    });
                }
            });

        });
    </script>

@endsection