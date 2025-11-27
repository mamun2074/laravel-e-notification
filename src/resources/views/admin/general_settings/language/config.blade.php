@extends('admin.layouts.master')

@section('title')
    {{ $common['module_manage'] }}
@endsection
@push('include-css')
    <!-- Bootstrap Select Css -->
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
                            {{ __('root.general_settings_language.language_config_form') }}
                        </div>
                        <div class="body">
                            <form id="languageConfigForm">
                                <input type="hidden" id="language_id" name="language_id" value="{{ $language->id }}" id="">
                                <div class="row">
                                    <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        @foreach ($root_file_items as $key => $root_files_item)
                                            <div class="panel panel-primary">
                                                <div class="panel-heading" role="tab"
                                                    id="language_menu_{{ $key }}">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion_1"
                                                            href="#collapse_{{ $key }}"
                                                            @if ($loop->first) aria-expanded="true"
                                                        @else
                                                        aria-expanded="false" @endif
                                                            aria-controls="collapse_{{ $key }}">
                                                            {{ ucfirst(str_replace('_', ' ', $key)) }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_{{ $key }}"
                                                    class="panel-collapse collapse @if ($loop->first) in @endif"
                                                    role="tabpanel" aria-labelledby="language_menu_{{ $key }}">
                                                    <div class="panel-body">
                                                        <div class="row p-t-10">
                                                            @foreach ($root_files_item as $keyD => $root_file_item)
                                                                @php
                                                                    $input_name = $key . '[' . $keyD . ']';
                                                                    if (isset($current_file_items[$key]) && isset($current_file_items[$key][$keyD])) {
                                                                        $current_file_value = $current_file_items[$key][$keyD];
                                                                    } else {
                                                                        $current_file_value = $root_file_item;
                                                                    }
                                                                @endphp
                                                                <div class="col-md-4">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input value="{{ $current_file_value }}"
                                                                                name="{{ $input_name }}" type="text"
                                                                                class="form-control">
                                                                            <label
                                                                                class="form-label">{{ $root_file_item }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-line p-b-25">
                                            <button type="button" id="languageConfigBtn"
                                                class="btn btn-primary waves-effect submitBtn">
                                                {{ __('root.common.save') }}
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
    <!-- Select Plugin Js -->
    <script src="{{ asset('admin/asset/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ Helper::assetV('admin/asset/js/admin/general_settings/language/create.js') }}"></script>
@endpush
