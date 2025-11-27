@extends('admin.layouts.master')

@section('title')
    {{ $common['module_manage'] }}
@endsection
@push('include-css')
    <!-- css for datatable -->
    @include('admin.common.css.datatable')
@endpush

@section('content')
    <section @if ($is_rtl) dir="rtl" @endif class="content">
        <div class="container-fluid">
            @include('admin.common.breadcrumb.breadcrumb')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('languages.create') }}"
                                class="btn btn-primary waves-effect">{{ __('root.common.add') }}</a>
                        </div>
                        <div class="body m-t-20">
                            <table id="languageDataTable"
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
    @include('admin.common.js.datatable')
    <script src="{{ Helper::assetV('admin/asset/js/admin/general_settings/language/list.js') }}"></script>
@endpush
