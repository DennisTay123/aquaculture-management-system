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
                            <a href="{{ route('page.index', 'vendors') }}">
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

            <!-- Show Account Management only to Admin or Manager -->
            @if(auth()->user() && (auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager'))
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
                                <a href="{{ route('page.index', 'users') }}">
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
            @endif

        </ul>
    </div>
</div>