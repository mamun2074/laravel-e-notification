@php
    $current_route_name = Request::route()->getName();
@endphp
<section>
    <aside id="leftsidebar" class="sidebar rtl-supported-sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li @if ($current_route_name === 'admin.dashboard') class="active" @endif>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>{{ __('root.menu.dashboard') }}</span>
                    </a>
                </li>
                @php
                    $user_url = [
                        'users.index',
                        'users.create',
                        'users.edit',
                        'roles.index',
                        'roles.create',
                        'roles.edit',
                        'languages.index',
                        'languages.create',
                        'languages.edit',
                        'languages.configure_lang',
                    ];
                @endphp
                @permission($user_url)
                    <li @if (in_array($current_route_name, $user_url)) class="active" @endif>
                        <a class="menu-toggle " href="javascript:void(0);">
                            <i class="fas fa-users"></i>
                            <span>{{ __('root.user.user_manage') }} </span>
                        </a>
                        <ul class="ml-menu">
                            @permission('users.index')
                                <li @if (in_array($current_route_name, ['users.index', 'users.create', 'users.edit'])) class="active" @endif>
                                    <a href="{{ route('users.index') }}">
                                        <span>{{ __('root.menu.user') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('languages.index')
                                <li @if (in_array($current_route_name, [
                                        'languages.index',
                                        'languages.create',
                                        'languages.edit',
                                        'languages.configure_lang',
                                    ])) class="active" @endif>
                                    <a href="{{ route('languages.index') }}">
                                        <span>{{ __('root.menu.language') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('roles.index')
                                <li @if (in_array($current_route_name, ['roles.index', 'roles.create', 'roles.edit'])) class="active" @endif>
                                    <a href="{{ route('roles.index') }}">
                                        <span>{{ __('root.menu.role') }}</span>
                                    </a>
                                </li>
                            @endpermission
                        </ul>
                    </li>
                @endpermission

                @php
                    $reservation_url = [
                        'cars.index',
                        'cars.create',
                        'cars.edit',
                        'cars.offer',
                        'cars.car_offer',
                        'drivers.index',
                        'drivers.create',
                        'drivers.edit',
                        'offers.index',
                        'offers.create',
                        'offers.edit',
                        'customers.index',
                        'customers.create',
                        'customers.edit',
                        'bookings.index',
                        'bookings.create',
                        'bookings.edit',
                        'bookings.show',
                    ];
                @endphp
                @permission($reservation_url)
                    <li @if (in_array($current_route_name, $reservation_url)) class="active" @endif>
                        <a class="menu-toggle " href="javascript:void(0);">
                            <i class="fas fa-ticket-alt"></i>
                            <span>{{ __('root.menu.reservation_manage') }} </span>
                        </a>
                        <ul class="ml-menu">
                            @permission('cars.index')
                                <li @if (in_array($current_route_name, ['cars.index', 'cars.create', 'cars.edit', 'cars.offer', 'cars.car_offer'])) class="active" @endif>
                                    <a href="{{ route('cars.index') }}">
                                        <span>{{ __('root.menu.car') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('drivers.index')
                                <li @if (in_array($current_route_name, ['drivers.index', 'drivers.create', 'drivers.edit'])) class="active" @endif>
                                    <a href="{{ route('drivers.index') }}">
                                        <span>{{ __('root.menu.driver') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('offers.index')
                                <li @if (in_array($current_route_name, ['offers.index', 'offers.create', 'offers.edit'])) class="active" @endif>
                                    <a href="{{ route('offers.index') }}">
                                        <span>{{ __('root.menu.offer') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('customers.index')
                                <li @if (in_array($current_route_name, ['customers.index', 'customers.create', 'customers.edit'])) class="active" @endif>
                                    <a href="{{ route('customers.index') }}">
                                        <span>{{ __('root.menu.customer') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('bookings.index')
                                <li @if (in_array($current_route_name, ['bookings.index', 'bookings.create', 'bookings.edit', 'bookings.show'])) class="active" @endif>
                                    <a href="{{ route('bookings.index') }}">
                                        <span>{{ __('root.menu.booking') }}</span>
                                    </a>
                                </li>
                            @endpermission
                        </ul>
                    </li>
                @endpermission
                @php
                    $general_sttings_url = [
                        'countries.index',
                        'countries.create',
                        'countries.edit',
                        'teams.index',
                        'teams.create',
                        'teams.edit',
                        'testimonials.index',
                        'testimonials.create',
                        'testimonials.edit',
                        'brands.index',
                        'brands.create',
                        'brands.edit',
                        'news.index',
                        'news.create',
                        'news.edit',
                    ];
                @endphp
                @permission($general_sttings_url)
                    <li @if (in_array($current_route_name, $general_sttings_url)) class="active" @endif>
                        <a class="menu-toggle " href="javascript:void(0);">
                            <i class="material-icons">layers</i>
                            <span>{{ __('root.menu.general_settings') }} </span>
                        </a>
                        <ul class="ml-menu">
                            @permission('countries.index')
                                <li @if (in_array($current_route_name, ['countries.index', 'countries.create', 'countries.edit'])) class="active" @endif>
                                    <a href="{{ route('countries.index') }}">
                                        <span>{{ __('root.menu.country') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('testimonials.index')
                                <li @if (in_array($current_route_name, ['testimonials.index', 'testimonials.create', 'testimonials.edit'])) class="active" @endif>
                                    <a href="{{ route('testimonials.index') }}">
                                        <span>{{ __('root.menu.testimonial') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('brands.index')
                                <li @if (in_array($current_route_name, ['brands.index', 'brands.create', 'brands.edit'])) class="active" @endif>
                                    <a href="{{ route('brands.index') }}">
                                        <span>{{ __('root.menu.brand') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('news.index')
                                <li @if (in_array($current_route_name, ['news.index', 'news.create', 'news.edit'])) class="active" @endif>
                                    <a href="{{ route('news.index') }}">
                                        <span>{{ __('root.menu.news') }}</span>
                                    </a>
                                </li>
                            @endpermission
                        </ul>
                    </li>
                @endpermission
                @php
                    $website_settings = [
                        'menus.index',
                        'themes.index',
                        'generals.index',
                        'pages.index',
                        'pages.create',
                        'pages.edit',
                        'pages.destroy',
                    ];
                @endphp

                @permission($website_settings)
                    <li @if (in_array($current_route_name, $website_settings)) class="active" @endif>
                        <a class="menu-toggle " href="javascript:void(0);">
                            <i class='fas fa-globe'></i>
                            <span>{{ __('root.menu.web_site_setting_label') }} </span>
                        </a>
                        <ul class="ml-menu">
                            @permission('pages.index')
                                <li @if (in_array($current_route_name, ['pages.index', 'pages.create', 'pages.edit', 'pages.destroy'])) class="active" @endif>
                                    <a href="{{ route('pages.index') }}">
                                        <span>{{ __('root.menu.page') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('menus.index')
                                <li @if (in_array($current_route_name, ['menus.index'])) class="active" @endif>
                                    <a href="{{ route('menus.index') }}">
                                        <span>{{ __('root.menu.menu') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('themes.index')
                                <li @if (in_array($current_route_name, ['themes.index'])) class="active" @endif>
                                    <a href="{{ route('themes.index') }}">
                                        <span>{{ __('root.menu.theme') }}</span>
                                    </a>
                                </li>
                            @endpermission
                            @permission('generals.index')
                                <li @if (in_array($current_route_name, ['generals.index'])) class="active" @endif>
                                    <a href="{{ route('generals.index') }}">
                                        <span>{{ __('root.menu.general') }}</span>
                                    </a>
                                </li>
                            @endpermission
                        </ul>
                    </li>
                @endpermission

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                {{ __('Developed by ') }}<a target="_blank"
                    href="https://codecanyon.net/user/mamun2074/portfolio">{{ __('E-Account Team') }}</a>
            </div>
            <div class="version">
                <b>{{ __('Version: ') }}</b> {{ __('4.0') }}
            </div>
        </div>
        <!-- #Footer -->
    </aside>
</section>
