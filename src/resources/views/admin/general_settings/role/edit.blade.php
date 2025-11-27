@extends('admin.layouts.master')

@section('title')
    {{ $common['module_manage'] }}
@endsection
@push('include-css')
    <link href="{{ asset('admin/asset/plugins/json-hierarchical-tree-picker/jquery.simple-tree-picker.css') }}"
        rel="stylesheet">
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
                            {{ __('root.general_settings_role.role_and_permission_edit_form') }}
                        </div>
                        <div class="body">
                            <form id="roleEditForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="hidden" id="id" value="{{ $role->id }}">
                                                <input autocomplete="off" value="{{ $role->name }}" name="name"
                                                    type="text" class="form-control">
                                                <label class="form-label">{{ __('root.general_settings_role.name') }}
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input autocomplete="off" value="{{ $role->order }}" name="order"
                                                    type="number" class="form-control">
                                                <label class="form-label">{{ __('root.common.order') }} <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>{{ __('root.general_settings_role.update_permissions') }}</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tree mb-5"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-line p-b-25">
                                            <button type="button" id="roleEditBtn"
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
    <script>
        var treeData = {!! $tree !!};
        var oldData = {!! $old_tree !!};
    </script>
    <script src="{{ asset('admin/asset/plugins/json-hierarchical-tree-picker/jquery.simple-tree-picker.js') }}"></script>
    <script src="{{ Helper::assetV('admin/asset/js/admin/general_settings/role/edit.js') }}"></script>
@endpush
