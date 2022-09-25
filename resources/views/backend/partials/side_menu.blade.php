<div class="page-logo">
    <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative"
        data-toggle="modal" data-target="#modal-shortcut">
        {{-- <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo"> --}}
        <span class="page-logo-text mr-1">Inventory Management System</span>
        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
    </a>
</div>
<!-- BEGIN PRIMARY NAVIGATION -->
<nav id="js-primary-nav" class="primary-nav" role="navigation">
    <div class="nav-filter">
        <div class="position-relative">
            <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
            <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off"
                data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                <i class="fal fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <ul id="js-nav-menu" class="nav-menu">
        <li>
            <a href="{{route('dashboard')}}" title="Application Intel" data-filter-tags="application intel">
                <i class="fas fa-home"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
            </a>
         
        </li>
        <li>
            <a href="" title="Application Intel" data-filter-tags="application intel">
                <i class="fas fa-home"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Item Category</span>
            </a>
         
        </li>
        <li>
            <a href="#" title="Theme Settings" data-filter-tags="theme settings">
                <i class="fal fa-cog"></i>
                <span class="nav-link-text" data-i18n="nav.theme_settings">Theme Settings</span>
            </a>
            <ul>
                <li>
                    <a href="settings_how_it_works.html" title="How it works"
                        data-filter-tags="theme settings how it works">
                        <span class="nav-link-text" data-i18n="nav.theme_settings_how_it_works">How it works</span>
                    </a>
                </li>
                <li>
                    <a href="settings_layout_options.html" title="Layout Options"
                        data-filter-tags="theme settings layout options">
                        <span class="nav-link-text" data-i18n="nav.theme_settings_layout_options">Layout Options</span>
                    </a>
                </li>
                <li>
                    <a href="settings_skin_options.html" title="Skin Options"
                        data-filter-tags="theme settings skin options">
                        <span class="nav-link-text" data-i18n="nav.theme_settings_skin_options">Skin Options</span>
                    </a>
                </li>
                <li>
                    <a href="settings_saving_db.html" title="Saving to Database"
                        data-filter-tags="theme settings saving to database">
                        <span class="nav-link-text" data-i18n="nav.theme_settings_saving_to_database">Saving to
                            Database</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" title="Package Info" data-filter-tags="package info">
                <i class="fal fa-tag"></i>
                <span class="nav-link-text" data-i18n="nav.package_info">Package Info</span>
            </a>
            <ul>
                <li>
                    <a href="info_app_docs.html" title="Documentation" data-filter-tags="package info documentation">
                        <span class="nav-link-text" data-i18n="nav.package_info_documentation">Documentation</span>
                    </a>
                </li>
                <li>
                    <a href="info_app_licensing.html" title="Product Licensing"
                        data-filter-tags="package info product licensing">
                        <span class="nav-link-text" data-i18n="nav.package_info_product_licensing">Product
                            Licensing</span>
                    </a>
                </li>
                <li>
                    <a href="info_app_flavors.html" title="Different Flavors"
                        data-filter-tags="package info different flavors">
                        <span class="nav-link-text" data-i18n="nav.package_info_different_flavors">Different
                            Flavors</span>
                    </a>
                </li>
            </ul>
        </li>


</nav>
<!-- END PRIMARY NAVIGATION -->
