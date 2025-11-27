@extends('enotification::admin.layouts.master')

@section('title')
    {{ $common['module_manage'] }}
@endsection

@push('include-css')
    <!-- css for datatable -->
    @include('enotification::admin.common.css.datatable')
@endpush

@section('content')
    <section @if ($is_rtl) dir="rtl" @endif class="content">
        <div class="container-fluid">
            @include('enotification::admin.common.breadcrumb.breadcrumb')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            {{-- @permission('brands.create')
                                <a href="{{ route('brands.create') }}"
                                    class="btn btn-primary waves-effect">{{ __('root.common.add') }}</a>
                            @endpermission --}}
                        </div>
                        <div class="body m-t-20">
                            <table id="brandDataTable"
                                class="table table-bordered table-striped table-hover js-basic-example dataTable"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('include-js')
    <!-- datatable all js -->
    @include('enotification::admin.common.js.datatable')
    <script src="{{ Helper::assetV('admin/asset/js/admin/brand/list.js') }}"></script>
@endpush
