<div class="page-logo">
    <a href="{{route('dashboard')}}" class="page-logo-link align-items-center position-relative">
        <span class="page-logo-text" style="margin-left: -5px;">Inventory Management System</span>
        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
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
            <a href="#" title="Theme Settings" data-filter-tags="theme settings">
                <i class="fal fa-cog"></i>
                <span class="nav-link-text" data-i18n="nav.theme_settings">Parameter Settings</span>
            </a>
            <ul>
                <li>
                    <a href="{{route('branch.index')}}" title="Branch" class="{{ Route::currentRouteNamed('branch.index') ? 'list-group-item active' : '' }}">
                        <i class="fa fa-university"></i>
                        <span class="nav-link-text" data-i18n="nav.theme_settings_how_it_works">Branch</span>
                    </a>
                </li>
                <li>
                    <a href="#" title="User">
                        <i class="fa fa-users"></i>
                        <span class="nav-link-text" data-i18n="nav.theme_settings_layout_options">User</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('item-category.index')}}" title="Item Category" class="{{ Route::currentRouteNamed('item-category.index') ? 'list-group-item active' : '' }}">
                        <i class="fa fa-folder-open"></i>
                        <span class="nav-link-text" data-i18n="nav.theme_settings_skin_options">Item Category</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('product-category.index')}}" title="Product Category" class="{{ Route::currentRouteNamed('product-category.index') ? 'list-group-item active' : '' }}">
                        <i class="fa fa-archive"></i>
                        <span class="nav-link-text" data-i18n="nav.theme_settings_skin_options">Product Category</span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Role">
                        <i class="fa fa-user"></i>
                        <span class="nav-link-text" data-i18n="nav.theme_settings_saving_to_database">Role</span>
                    </a>
                </li>
            </ul>
        </li>
       <li>
            <a href="#" title="Package Info" data-filter-tags="package info">
                <i class="fal fa-tag"></i>
                <span class="nav-link-text" data-i18n="nav.package_info">Inventory Settings</span>
            </a>
            <ul>
                <li>
                    <a href="{{route('product-entry.index')}}" title="Inventory Entry" class="{{ Route::currentRouteNamed('product-entry.index') ? 'list-group-item active' : '' }}">
                        <i class="fa fa-plus"></i>
                        <span class="nav-link-text" data-i18n="nav.package_info_documentation">Inventory Entry</span>
                    </a>
                </li>
                <li>
                    <a href="#requisition" title="Inventory Requisition">
                      <i class="fa fa-check-square"></i>
                        <span class="nav-link-text" data-i18n="nav.package_info_product_licensing">Inventory
                            Requisition</span>
                    </a>
                </li>
               
            </ul>
        </li>
         <li class="{{ Route::currentRouteNamed('#items')||Route::currentRouteNamed('#products')||Route::currentRouteNamed('#valuation')||Route::currentRouteNamed('#mis') ? 'active' : '' }}">
            <a href="#" title="Report">
                <i class="fa fa-list-ul"></i>
                <span class="nav-link-text" data-i18n="nav.package_info">Report</span>
            </a>
            <ul>
                <li>
                    <a href="#items" title="Items"  class="{{ Route::currentRouteNamed('#items') ? 'list-group-item active' : '' }}">
                        <i class="fa fa-cube" aria-hidden="true"></i>
                        <span class="nav-link-text" data-i18n="nav.package_info_documentation">Items</span>
                    </a>
                </li>
                <li>
                    <a href="#products" title="Products" class="{{ Route::currentRouteNamed('#products') ? 'list-group-item active' : '' }}">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                        <span class="nav-link-text" data-i18n="nav.package_info_product_licensing">Products</span>
                    </a>
                </li>
                <li>
                    <a href="#valuation" title="Product
                            Valuation" class="{{ Route::currentRouteNamed('#valuation') ? 'list-group-item active' : '' }}">
                        <i class="fa fa-percent" aria-hidden="true"></i>
                        <span class="nav-link-text" data-i18n="nav.package_info_different_flavors">Product
                            Valuation</span>
                    </a>
                </li>

                 <li>
                    <a href="#mis" title="MIS" class="{{ Route::currentRouteNamed('#mis') ? 'list-group-item active' : '' }}">
                        <i class="fa fa-indent" aria-hidden="true"></i>
                        <span class="nav-link-text" data-i18n="nav.package_info_different_flavors">MIS</span>
                    </a>
                </li>
            </ul>
        </li>  


</nav>
<!-- END PRIMARY NAVIGATION -->
