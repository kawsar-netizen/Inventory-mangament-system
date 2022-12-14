                    <!-- BEGIN Page Header -->
                    <header class="page-header" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo">
                            <a href="#"
                                class="page-logo-link press-scale-down d-flex align-items-center position-relative"
                                data-toggle="modal" data-target="#modal-shortcut">
                                <!-- <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo"> -->
                                <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                                <span
                                    class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                            </a>
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->

                         <!-- samer start -->
                        <div class="hidden-md-down dropdown-icon-menu position-relative">

                             <a href="#" class="header-btn btn js-waves-off" data-action="toggle"
                                        data-class="nav-function-minify" title="Hide Navigation" style="padding-top: 5px">
                                        <i class="ni ni-menu"></i>
                             </a>

                        </div>



                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle"
                                data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>

                        <div class="ml-auto d-flex">
                            <!-- activate app search icon (mobile) -->
                            <div class="hidden-sm-up">
                                <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on"
                                    data-focus="search-field" title="Search">
                                    <i class="fal fa-search"></i>
                                </a>
                            </div>

                            <!-- app user menu -->
                            <div>
                                <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com"
                                    class="header-icon d-flex align-items-center justify-content-center ml-2">
                                    <img src="{{ asset('backend/assets/img/demo/avatars/avatar-m.png') }}"
                                        class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                                   
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                        <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                            <span class="mr-2">
                                                <img src="{{ asset('backend/assets/img/demo/avatars/avatar-m.png') }}"
                                                    class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                                            </span>
                                            <div class="info-card-text">
                                                <div class="fs-lg text-truncate text-truncate-lg">
                                                    {{ Auth::user()->name }}</div>
                                                <span
                                                    class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-reset">
                                        <span data-i18n="drpdwn.reset_layout">Reset Layout</span>
                                    </a>
                                    <a href="#" class="dropdown-item" data-toggle="modal"
                                        data-target=".js-modal-settings">
                                        <span data-i18n="drpdwn.settings">Settings</span>
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                        <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                                        <i class="float-right text-muted fw-n">F11</i>
                                    </a>
                                    <a href="#" class="dropdown-item" data-action="app-print">
                                        <span data-i18n="drpdwn.print">Print</span>
                                        <i class="float-right text-muted fw-n">Ctrl + P</i>
                                    </a>

                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->
