<nav class="navbar">
    <div class="container-fluid">
        <div @if ($is_rtl) dir="rtl" @endif class="rtl-supported-navbar">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="">{{ env('APP_NAME', 'Starter') }}</a>
            </div>
            <div>
                <a href="javascript:void(0);" class="dropdown-toggle text-white" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="true">
                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu @if (!$is_rtl) pull-right @endif">
                    <li><a href="{{ route('users.profile', auth()->user()->id) }}"><i
                                class="material-icons">person</i>{{ __('root.menu.profile') }}</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0); document.getElementById('logout-form').submit();"><i
                                class=" fas fa-sign-out-alt"></i>{{ __('root.common.sign_out') }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="dis-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>
