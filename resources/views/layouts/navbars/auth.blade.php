<div class="sidebar" data-color="black" data-active-color="info">
    <div class="logo">
        <a class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a class="simple-text logo-normal">
            {{ __('Aquaculture') }}
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">

            <!-- <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li> -->

            <li
                class="{{ $elementActive == 'dashboard' || $elementActive == 'monitor' || $elementActive == 'aquaculture' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#Dashboard">
                    <i class="nc-icon nc-bank"></i>
                    <p>
                        {{ __('Dashboard') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="dashboard">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'dashboard') }}">
                                <span class="sidebar-mini-icon">{{ __('O') }}</span>
                                <span class="sidebar-normal">{{ __(' Overview ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'monitor' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'monitor') }}">
                                <span class="sidebar-mini-icon">{{ __('M') }}</span>
                                <span class="sidebar-normal">{{ __('Monitor') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'waterQuality' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'water-quality') }}">
                                <span class="sidebar-mini-icon">{{ __('W') }}</span>
                                <span class="sidebar-normal">{{ __('Water Quality') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                        {{ __('Laravel examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->

            <!-- <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li> -->
            <!-- <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li> -->

            <!-- <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'upgrade') }}" class="bg-danger">
                    <i class="nc-icon nc-spaceship text-white"></i>
                    <p class="text-white">{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> -->

            <li class="{{ $elementActive == 'inventory' || $elementActive == 'vendor' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#item">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>
                        {{ __('Item') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="item">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'inventory' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'inventory') }}">
                                <span class="sidebar-mini-icon">{{ __('I') }}</span>
                                <span class="sidebar-normal">{{ __(' Inventory') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'vendor' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'vendor') }}">
                                <span class="sidebar-mini-icon">{{ __('V') }}</span>
                                <span class="sidebar-normal">{{ __(' Vendor') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'activity' || $elementActive == 'list' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#logRecord">
                    <i class="nc-icon nc-paper"></i>
                    <p>
                        {{ __('Log Record') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="logRecord">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'activity' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'activity') }}">
                                <span class="sidebar-mini-icon">{{ __('A') }}</span>
                                <span class="sidebar-normal">{{ __(' Activity') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'gallery' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'gallery') }}">
                                <span class="sidebar-mini-icon">{{ __('G') }}</span>
                                <span class="sidebar-normal">{{ __(' Gallery') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'user' || $elementActive == 'register' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#accountManagement">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                        {{ __('Account Management') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="accountManagement">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('L') }}</span>
                                <span class="sidebar-normal">{{ __(' User List ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'register' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'register/initiate') }}">
                                <span class="sidebar-mini-icon">{{ __('R') }}</span>
                                <span class="sidebar-normal">{{ __(' Register User') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>