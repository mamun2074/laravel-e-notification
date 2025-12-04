@extends('enotification::admin.layouts.master')

@push('include-css')
    <!-- css for datatable -->
    @include('enotification::admin.common.css.datatable')
@endpush

@section('content')
    <!-- Stats Grid -->
    <div class="row g-4 mb-5">
        <div class="col-12">
            <div class="card h-100 border-0 bg-white">
                <div class="card-body p-4">

                    <table id="myTable" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Extn.</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Extn.</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('include-js')
    @include('enotification::admin.common.js.datatable')
@endpush
