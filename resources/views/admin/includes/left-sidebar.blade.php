<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href="{{ route('admin-home') }}"><i class="icon ion-android-star-outline"></i>Dashboard Page</a></div>
<div class="sl-sideleft">
    <div class="sl-sideleft-menu">
        <a href="{{route('admin-home')}}" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        @if(Auth::user()->category == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                    <span class="menu-item-label">Category</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{route('manage-category')}}" class="nav-link">Manage Category</a></li>
                <li class="nav-item"><a href="{{ route('sub-category') }}" class="nav-link">Sub Category</a></li>
                <li class="nav-item"><a href="{{route('manage-brand')}}" class="nav-link">Brands</a></li>
                <li class="nav-item"><a href="{{route('add-seo')}}" class="nav-link">SEO</a></li>

            </ul>
        @else

        @endif

        @if(Auth::user()->coupon==1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Coupons</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('manage-coupon') }}" class="nav-link">Manage Coupons</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->product == 1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Products</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('add-product') }}" class="nav-link">Add Product</a></li>
            <li class="nav-item"><a href="{{ route('manage-product') }}" class="nav-link">Manage Product</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->order == 1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Orders</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('new-order') }}" class="nav-link">New Order</a></li>
            <li class="nav-item"><a href="{{ route('accept-order-history') }}" class="nav-link">Accept Order History</a></li>
            <li class="nav-item"><a href="{{ route('cancel-order-history') }}" class="nav-link">Cancel Order</a></li>
            <li class="nav-item"><a href="{{ route('progress-order-history') }}" class="nav-link">Process Delivery</a></li>
            <li class="nav-item"><a href="{{ route('delivered-order-history') }}" class="nav-link">Delivery Success</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->blog==1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Blog</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('add-blog-category') }}" class="nav-link">Blog Category</a></li>
            <li class="nav-item"><a href="{{ route('add-blog-post') }}" class="nav-link">Add Post</a></li>
            <li class="nav-item"><a href="{{ route('manage-blog-post') }}" class="nav-link">Manage Post</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->other==1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Others</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('manage-newsletter') }}" class="nav-link">Manage NewsLetter</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->report==1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Reports</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('today-order') }}" class="nav-link">Today Order</a></li>
            <li class="nav-item"><a href="{{ route('today-delivery') }}" class="nav-link">Today Delivery</a></li>
            <li class="nav-item"><a href="{{ route('this-month-delivery') }}" class="nav-link">Month Order</a></li>
            <li class="nav-item"><a href="{{ route('search-report') }}" class="nav-link">Search Report</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->role==1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">User Role</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin-create-user') }}" class="nav-link">Create User</a></li>
            <li class="nav-item"><a href="{{ route('admin-all-user') }}" class="nav-link">All User</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->return == 1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Return Order</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('return-request') }}" class="nav-link">Return Request</a></li>
            <li class="nav-item"><a href="{{ route('all-return') }}" class="nav-link">All Request</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->stock == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Product Stock</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('product-stock') }}" class="nav-link">Stock</a></li>
            </ul>
        @else

        @endif

        @if(Auth::user()->contact == 1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Contact Message</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('all-message') }}" class="nav-link">All Message</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->comment == 1)
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Product Comments</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="" class="nav-link">New Comment</a></li>
            <li class="nav-item"><a href="" class="nav-link">All Comment</a></li>
        </ul>
        @else

        @endif

        @if(Auth::user()->setting==1)
        <a href="" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Site Setting</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin-site-setting') }}" class="nav-link">Site Setting</a></li>
        </ul>
        @else

        @endif


    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
