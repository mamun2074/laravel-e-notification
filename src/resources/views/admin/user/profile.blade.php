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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card profile-card">
                                <input type="hidden" name="user_profile" id="user_id" value="{{ $user->id }}">
                                <div class="profile-header">&nbsp;</div>
                                <div class="profile-body">
                                    <div class="image-area">
                                        @if (is_null($user_profile) || empty(@$user_profile->avatar))
                                            <img class="width-140 height-140"
                                                src="{{ asset('admin/asset/images/default/avator.png') }}" alt="Avatar" />
                                        @else
                                            <img class="width-140 height-140" src="{{ asset(@$user_profile->avatar) }}"
                                                alt="Profile Picture" />
                                        @endif
                                    </div>
                                    <div class="content-area">
                                        <h3>{{ @$user_profile->last_name }} {{ @$user_profile->first_name }}</h3>
                                        <p>{{ @$user_profile->designation }}</p>
                                        <p>{{ @$user_profile->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-about-me">
                                <div class="header">
                                    <h2>{{ __('root.profile.about_me') }}</h2>
                                </div>
                                <div class="body">
                                    <ul>
                                        <li>
                                            <div class="title">
                                                <i class="material-icons">library_books</i>
                                                {{ __('root.profile.education') }}
                                            </div>
                                            <div class="content">
                                                {{ @$user_profile->education }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                <i class="material-icons">location_on</i>
                                                {{ __('root.profile.location') }}

                                            </div>
                                            <div class="content">
                                                {{ @$user_profile->present_address }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                <i class="material-icons">notes</i>
                                                {{ __('root.profile.description') }}
                                            </div>
                                            <div class="content">
                                                {{ @$user_profile->description }}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="body">
                                    <div>
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#profile_settings" aria-controls="settings" role="tab"
                                                    data-toggle="tab">{{ __('root.profile.profile_settings') }}</a>
                                            </li>
                                            <li role="presentation"><a href="#change_password_settings"
                                                    aria-controls="settings" role="tab"
                                                    data-toggle="tab">{{ __('root.profile.change_password') }}</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active m-t-30" id="profile_settings">
                                                <form id="profileUpdateForm" class="form-horizontal">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="first_name"
                                                            class="col-sm-2 control-label">{{ __('root.profile.first_name') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" id="first_name" class="form-control"
                                                                    name="first_name"
                                                                    placeholder="{{ __('root.profile.first_name') }}"
                                                                    value="{{ @$user_profile->first_name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name"
                                                            class="col-sm-2 control-label">{{ __('root.profile.last_name') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" id="last_name"
                                                                    name="last_name"
                                                                    placeholder="{{ __('root.profile.last_name') }}"
                                                                    value="{{ @$user_profile->last_name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone_number"
                                                            class="col-sm-2 control-label">{{ __('root.profile.phone_number') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" id="phone_number"
                                                                    name="phone_number"
                                                                    placeholder="{{ __('root.profile.phone_number') }}"
                                                                    value="{{ @$user_profile->phone_number }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="designation"
                                                            class="col-sm-2 control-label">{{ __('root.profile.designation') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" id="designation"
                                                                    name="designation"
                                                                    placeholder="{{ __('root.profile.designation') }}"
                                                                    value="{{ @$user_profile->designation }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender"
                                                            class="col-sm-2 control-label">{{ __('root.profile.gender') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <select class="form-control show-tick" name="gender"
                                                                    id="gender">
                                                                    <option value="0">
                                                                        {{ __('root.profile.select_gender') }}</option>
                                                                    @foreach ($gender_types as $key => $gender_type)
                                                                        <option
                                                                            @if ($gender_type == @$user_profile->gender) @selected(true) @endif
                                                                            value="{{ $gender_type }}">
                                                                            {{ ucfirst(str_replace('_', '', $key)) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NID"
                                                            class="col-sm-2 control-label">{{ __('root.profile.nid') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" id="NID"
                                                                    name="NID"
                                                                    placeholder="{{ __('root.profile.nid') }}"
                                                                    value="{{ @$user_profile->NID }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="education"
                                                            class="col-sm-2 control-label">{{ __('root.profile.education') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" id="education"
                                                                    name="education"
                                                                    placeholder="{{ __('root.profile.education') }}"
                                                                    value="{{ @$user_profile->education }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="permanent_address"
                                                            class="col-sm-2 control-label">{{ __('root.profile.permanent_address') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control"
                                                                    id="permanent_address" name="permanent_address"
                                                                    placeholder="{{ __('root.profile.permanent_address') }}"
                                                                    value="{{ @$user_profile->permanent_address }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="present_address"
                                                            class="col-sm-2 control-label">{{ __('root.profile.present_address') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control"
                                                                    id="present_address" name="present_address"
                                                                    placeholder="{{ __('root.profile.present_address') }}"
                                                                    value="{{ @$user_profile->present_address }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description"
                                                            class="col-sm-2 control-label">{{ __('root.profile.description') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <textarea class="form-control" id="description" name="description" rows="1"
                                                                    placeholder="{{ __('root.profile.description') }}">{{ @$user_profile->description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description"
                                                            class="col-sm-2 control-label">{{ __('root.profile.profile_picture') }}</label>
                                                        <div class="col-sm-10">
                                                            <input name="avatar" type="file" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="language_id"
                                                            class="col-sm-2 control-label">{{ __('root.profile.assaign_language') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <select class="form-control show-tick" name="language_id"
                                                                    id="language_id">
                                                                    <option value="">
                                                                        {{ __('root.profile.select_language') }}</option>
                                                                    @foreach ($languages as $language_name)
                                                                        <option
                                                                            @if (@$language->id == @$language_name->id) selected @endif
                                                                            value="{{ @$language_name->id }}">
                                                                            {{ @$language_name->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="button" id="updateProfileBtn"
                                                                class="btn btn-primary waves-effect submitBtn">
                                                                {{ __('root.common.update') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade in m-t-30" id="change_password_settings">
                                                <form id="updateUserPasswordForm" class="form-horizontal">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label class="w-100 text-right" for="new_password">{{ __('root.profile.new_password') }}
                                                                    <span class="text-danger">*</span> </label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="form-line">
                                                                    <input type="password" class="form-control"
                                                                        id="new_password" name="password"
                                                                        placeholder="{{ __('root.profile.new_password') }}">
                                                                </div>
                                                                <label class="error dis-none"></label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group m-t-10">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button id="updateUserPasswordBtn" type="button"
                                                                class="btn btn-primary waves-effect">{{ __('root.common.update') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('include-js')
    <!-- Bootstrap Select js -->
    <script src="{{ asset('admin/asset/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ Helper::assetV('admin/asset/js/admin/user/edit.js') }}"></script>
@endpush
