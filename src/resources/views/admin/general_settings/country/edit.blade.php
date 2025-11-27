@extends('admin.layouts.master')

@section('title')
    {{ $common['module_manage'] }}
@endsection
@push('include-css')
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
                            {{ __('root.general_settings_country.country_edit_form') }}
                        </div>
                        <div class="body">
                            <form id="countryEditForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="hidden" id="id" value="{{ $country->id }}">
                                                <input autocomplete="off" value="{{ $country->name }}" name="name"
                                                    type="text" class="form-control">
                                                <label class="form-label">{{ __('root.general_settings_country.name') }}
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input autocomplete="off" value="{{ $country->currency_code }}"
                                                    name="currency_code" type="text" class="form-control">
                                                <label
                                                    class="form-label">{{ __('root.general_settings_country.currency_code') }}<span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input autocomplete="off" value="{{ $country->currency_symbol }}"
                                                    name="currency_symbol" type="text" class="form-control">
                                                <label
                                                    class="form-label">{{ __('root.general_settings_country.currency_symbol') }}<span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input autocomplete="off" value="{{ $country->order }}" name="order"
                                                    type="number" class="form-control">
                                                <label class="form-label">{{ __('root.common.order') }} <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-line p-b-25">
                                            <button type="button" id="countryEditBtn"
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
    <script src="{{ Helper::assetV('admin/asset/js/admin/general_settings/country/edit.js') }}"></script>
@endpush
