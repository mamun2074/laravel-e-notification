@extends('admin.layouts.master')

@section('title')
    {{ $common['module_manage'] }}
@endsection
@push('include-css')
    <link href="{{ asset('admin/asset/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <section @if ($is_rtl) dir="rtl" @endif class="content">
        <div class="container-fluid">
            @include('admin.common.breadcrumb.breadcrumb')
            <!-- Inline Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header m-b-20">
                            {{ __('root.general_settings_language.language_edit_form') }}
                        </div>
                        <div class="body">
                            <form id="languageEditForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="hidden" id="id" value="{{ $language->id }}">
                                                <input autocomplete="off" value="{{ $language->name }}" name="name"
                                                    type="text" class="form-control">
                                                <label class="form-label">{{ __('root.general_settings_language.name') }}
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input autocomplete="off" value="{{ $language->code }}" name="code"
                                                    type="text" class="form-control">
                                                <label
                                                    class="form-label">{{ __('root.general_settings_language.code') }}<span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select data-live-search="true" class="form-control show-tick"
                                                    name="country_id">
                                                    <option value="0">Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option @if ($country->id == $language->country_id) selected @endif
                                                            value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input autocomplete="off" value="{{ $language->order }}" name="order"
                                                    type="number" class="form-control">
                                                <label class="form-label">{{ __('root.datatable_common.order') }} <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-line p-b-25">
                                            <button type="button" id="languageEditBtn"
                                                class="btn btn-primary waves-effect submitBtn">
                                                {{ __('root.common.update') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #END# Inline Layout | With Floating Label -->
            </div>
        </div>
    </section>
@endsection
@push('include-js')
    <script src="{{ asset('admin/asset/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ Helper::assetV('admin/asset/js/admin/general_settings/language/edit.js') }}"></script>
@endpush
