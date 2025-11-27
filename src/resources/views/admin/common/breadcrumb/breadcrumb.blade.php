<div class="block-header @if ($is_rtl) pull-right @else pull-left @endif">
    @if ($common['action_name'] == 'index')
        <h2>{{ $common['module_manage'] }} </h2>
    @endif
    @if ($common['action_name'] == 'create_or_update')
        <a href="{{ route($common['route_name']) }}" class="btn btn-info waves-effect">{{ __('root.common.back') }}</a>
    @endif
</div>
<ol class="breadcrumb breadcrumb-col-cyan @if ($is_rtl) pull-left  @else pull-right @endif">
    <li>
        <a href="{{ route('admin.dashboard') }}"><i class="material-icons">{{ $common['home_icon'] }}</i>
            {{ $common['home'] }}</a>
    </li>
    <li>
        <a href="{{ route($common['route_name']) }}">
            <i class="{{ $common['breadcrumb_icon'] }}"></i>
            &nbsp; {{ $common['current_module'] }}</a>
    </li>
    <li class="active">
        <i class="material-icons"></i>
        {{ $common['breadcrumb_active_name'] }}
    </li>
</ol>
