@extends('admin.layouts.master')

@section('title')
    {{ $common['module_manage'] }}
@stop

@section('top-bar')
    @include('admin.includes.top-bar')
@stop

@section('left-sidebar')
    @include('admin.includes.left-sidebar')
@stop

@push('include-css')
    <link href="{{ asset('admin/asset/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <section @if ($is_rtl) dir="rtl" @endif class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{ __('root.dashboard.heading_dashboard') }}</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance</i>
                        </div>
                        <div class="content">
                            <div class="text">{{ __('root.dashboard.total_earn') }}</div>
                            <div class="number count-to" data-from="0" data-to="{{ $dashboard_info['total_earning'] }}"
                                data-speed="1000" data-fresh-interval="20">
                                {{ $dashboard_info['total_earning'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">{{ __('root.dashboard.complete_booking') }}</div>
                            <div class="number count-to" data-from="0"
                                data-to="{{ $dashboard_info['total_complete_booking'] }}" data-speed="1000"
                                data-fresh-interval="20">{{ $dashboard_info['total_complete_booking'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">{{ __('root.dashboard.pending_booking') }}</div>
                            <div class="number count-to" data-from="0"
                                data-to="{{ $dashboard_info['total_pending_booking'] }}" data-speed="1000"
                                data-fresh-interval="20">{{ $dashboard_info['total_pending_booking'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">backspace</i>
                        </div>
                        <div class="content">
                            <div class="text">{{ __('root.dashboard.cancel_booking') }}</div>
                            <div class="number count-to" data-from="0"
                                data-to="{{ $dashboard_info['total_cancel_booking'] }}" data-speed="1000"
                                data-fresh-interval="20">{{ $dashboard_info['total_cancel_booking'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">{{ __('root.dashboard.driver') }}</div>
                            <div class="number count-to" data-from="0" data-to="{{ $dashboard_info['total_driver'] }}"
                                data-speed="1000" data-fresh-interval="20">{{ $dashboard_info['total_driver'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airport_shuttle</i>
                        </div>
                        <div class="content">
                            <div class="text">{{ __('root.dashboard.vehicle') }}</div>
                            <div class="number count-to" data-from="0" data-to="{{ $dashboard_info['total_car'] }}"
                                data-speed="1000" data-fresh-interval="20">{{ $dashboard_info['total_car'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-orange hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">gesture</i>
                        </div>
                        <div class="content">
                            <div class="text">{{ __('root.dashboard.total_request') }}</div>
                            <div class="number count-to" data-from="0"
                                data-to="{{ $dashboard_info['total_booking_request'] }}" data-speed="1000"
                                data-fresh-interval="20">
                                {{ $dashboard_info['total_booking_request'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">{{ __('root.dashboard.customer') }}</div>
                            <div class="number count-to" data-from="0" data-to="{{ $dashboard_info['total_customer'] }}"
                                data-speed="1000" data-fresh-interval="20">{{ $dashboard_info['total_customer'] }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <h2>{{ __('root.dashboard.booking_status') }}</h2>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select data-live-search="true" class="form-control  show-tick"
                                                name="year" id="booking_year">
                                                @foreach ($dashboard_info['years'] as $year)
                                                    <option
                                                        @if ($dashboard_info['current_year'] == $year) @selected(true) @endif
                                                        value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select data-live-search="true" class="form-control  show-tick"
                                                name="month" id="booking_month">
                                                @foreach ($dashboard_info['months'] as $key => $month)
                                                    <option
                                                        @if ($dashboard_info['current_month'] == $key) @selected(true) @endif
                                                        value="{{ $key }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <canvas id="myChartBooking" height="150"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <h2>{{ __('root.dashboard.booking_request_status') }}</h2>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select data-live-search="true" class="form-control  show-tick"
                                                name="year" id="booking_request_year">
                                                @foreach ($dashboard_info['years'] as $year)
                                                    <option
                                                        @if ($dashboard_info['current_year'] == $year) @selected(true) @endif
                                                        value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select data-live-search="true" class="form-control  show-tick"
                                                name="month" id="booking_request_month">
                                                @foreach ($dashboard_info['months'] as $key => $month)
                                                    <option
                                                        @if ($dashboard_info['current_month'] == $key) @selected(true) @endif
                                                        value="{{ $key }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <canvas id="myChartRequestStatus" height="150"></canvas>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@stop
@push('include-js')
    <script src="{{ asset('admin/asset/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('admin/asset/plugins/jquery-countto/jquery.countTo.js') }}"></script>
    <!-- ChartJs -->
    <script src="{{ asset('admin/asset/plugins/chartjs/chart.min.js') }}"></script>

    <script>
        // booking graph
        function bookingGraphData(year, month) {
            return new Promise((resolve, reject) => {
                Helper.ajaxRequest('GET', `admin/graph-booking-status?year=${year}&month=${month}`).then((
                    res) => {
                    let data = res.data;
                    var datasets = [{
                            label: "{{ __('root.reservation_manage_booking.pending') }}",
                            data: data.pending, // Data for pending bookings
                            borderColor: 'rgba(137, 34, 155, 1)',
                            backgroundColor: 'rgba(137, 34, 155, 1)',
                            fill: false
                        },
                        {
                            label: "{{ __('root.reservation_manage_booking.cancel') }}",
                            data: data.cancel, // Data for canceled bookings
                            borderColor: 'rgba(217, 4, 41, 1)',
                            backgroundColor: 'rgba(217, 4, 41, 1)',
                            fill: false
                        },
                        {
                            label: "{{ __('root.reservation_manage_booking.done') }}",
                            data: data.done, // Data for completed bookings
                            borderColor: 'rgba(0, 127, 95, 1)',
                            backgroundColor: 'rgba(0, 127, 95, 1)',
                            fill: false
                        }
                    ];
                    resolve(datasets);
                }).catch((error) => {
                    reject(0);
                });
            });
        }
        const ctxBooking = document.getElementById('myChartBooking').getContext('2d');
        let lineChartOfBookingGraph;

        var booking_current_year = document.getElementById('booking_year').value;
        var booking_current_month = document.getElementById('booking_month').value;

        bookingGraphData(booking_current_year, booking_current_month).then((datasets) => {
            lineChartOfBookingGraph = new Chart(ctxBooking, Helper.configChart('line',
                Helper.getDaysInMonth(booking_current_year, booking_current_month), datasets));
        }).catch((error) => {
            return 0;
        });
        document.getElementById("booking_year").addEventListener('change', (e) => {
            var month = document.getElementById('booking_month').value;
            bookingGraphData(e.target.value, month).then((datasets) => {
                lineChartOfBookingGraph.destroy();
                lineChartOfBookingGraph = new Chart(ctxBooking, Helper.configChart('line',
                    Helper.getDaysInMonth(e.target.value, month), datasets));
            }).catch((error) => {
                console.log(error);
            });
        });

        document.getElementById("booking_month").addEventListener('change', (e) => {
            var year = document.getElementById('booking_year').value;
            bookingGraphData(year, e.target.value).then((datasets) => {
                lineChartOfBookingGraph.destroy();
                lineChartOfBookingGraph = new Chart(ctxBooking, Helper.configChart('line', Helper
                    .getDaysInMonth(year, e.target.value),
                    datasets));
            }).catch((error) => {
                console.log(error);
            });
        });

        // booking request graph
        function bookingRequestGraphData(year, month) {
            return new Promise((resolve, reject) => {
                Helper.ajaxRequest('GET', `admin/graph-booking-request-status?year=${year}&month=${month}`).then((
                    res) => {
                    let data = res.data;
                    var datasets = [{
                            label: "{{ __('root.reservation_manage_booking_request.initiate') }}",
                            data: data.initiate, // Data for pending bookings
                            borderColor: 'rgba(217, 4, 41, 1)',
                            backgroundColor: 'rgba(217, 4, 41, 1)',
                            fill: false,
                        },
                        {
                            label: "{{ __('root.reservation_manage_booking_request.car_select') }}",
                            data: data.car_select, // Data for canceled bookings
                            borderColor: 'rgba(137, 34, 155, 1)',
                            backgroundColor: 'rgba(137, 34, 155, 1)',
                            fill: false,
                        },
                        {
                            label: "{{ __('root.reservation_manage_booking_request.on_the_waya_to_complete') }}",
                            data: data.on_the_waya_to_complete, // Data for completed bookings
                            borderColor: 'rgba(0, 127, 95, 1)',
                            backgroundColor: 'rgba(0, 127, 95, 1)',
                            fill: false,
                        },
                    ];
                    resolve(datasets);
                }).catch((error) => {
                    reject(0);
                });
            });
        }
        let barChartOfBookingRequestGraph;
        var booking_request_current_year = document.getElementById('booking_request_year').value;
        var booking_request_current_month = document.getElementById('booking_request_month').value;
        const ctxBookingRequest = document.getElementById('myChartRequestStatus').getContext('2d');
        bookingRequestGraphData(booking_request_current_year, booking_request_current_month).then((datasets) => {
            barChartOfBookingRequestGraph = new Chart(ctxBookingRequest, Helper.configChart('bar',
                Helper.getDaysInMonth(booking_request_current_year, booking_request_current_month), datasets
            ));
        }).catch((error) => {
            return 0;
        });
        document.getElementById("booking_request_year").addEventListener('change', (e) => {
            var month = document.getElementById('booking_request_month').value;
            bookingRequestGraphData(e.target.value, month).then((datasets) => {
                barChartOfBookingRequestGraph.destroy();
                barChartOfBookingRequestGraph = new Chart(ctxBookingRequest, Helper.configChart('bar',
                    Helper.getDaysInMonth(e.target.value, month), datasets));
            }).catch((error) => {
                console.log(error);
            });
        });

        document.getElementById("booking_request_month").addEventListener('change', (e) => {
            var year = document.getElementById('booking_request_year').value;
            bookingRequestGraphData(year, e.target.value).then((datasets) => {
                barChartOfBookingRequestGraph.destroy();
                barChartOfBookingRequestGraph = new Chart(ctxBookingRequest, Helper.configChart('bar',
                    Helper.getDaysInMonth(year, e.target.value), datasets));
            }).catch((error) => {
                console.log(error);
            });
        });
    </script>
@endpush
