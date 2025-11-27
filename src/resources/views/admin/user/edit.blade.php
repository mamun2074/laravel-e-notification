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
                            {{ __('root.user.user_edit_form') }}
                            <br>
                            <span class="fs-10 fw-bold">User default password is:
                                {{ env('USER_DEFAULT_PASSWORD', 'secret') }}</span>
                        </div>
                        <div class="body">
                            <form id="userEditForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="hidden" id="id" value="{{ $user->id }}">
                                                <input autocomplete="off" value="{{ $user->name }}" name="name"
                                                    type="text" class="form-control">
                                                <label class="form-label">{{ __('root.user.name') }} <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input autocomplete="off" value="{{ $user->email }}" name="email"
                                                    type="text" class="form-control">
                                                <label class="form-label">{{ __('root.user.email') }} <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input autocomplete="off" value="{{ $user->order }}" name="order"
                                                    type="number" class="form-control">
                                                <label class="form-label">{{ __('root.common.order') }} <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <label class="error dis-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>{{ __('root.user.roles') }}</h5>
                                                <hr class="mt-0">
                                                <div class="form-group form-float h-full">
                                                    <input value="" name="customer_ruels" type="hidden"
                                                        class="form-control">
                                                    <label class="error dis-none"></label>
                                                </div>
                                            </div>
                                            @foreach ($roles as $role)
                                                <div class="col-md-2">
                                                    <div class="form-group form-float">
                                                        <div class="custom-control custom-switch">
                                                            <input @if (in_array($role->id, $previous_roles)) checked @endif
                                                                type="checkbox" name="roles[]" value="{{ $role->id }}"
                                                                class="custom-control-input" id="{{ $role->id }}">
                                                            <label class="custom-control-label"
                                                                for="{{ $role->id }}">{{ $role->name }}</label>
                                                        </div>
                                                        <label class="error dis-none"></label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-line p-b-25">
                                            <button type="button" id="editUserBtn"
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
    <!-- Bootstrap Select js -->
    <script src="{{ asset('admin/asset/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ Helper::assetV('admin/asset/js/admin/user/edit.js') }}"></script>
@endpush
