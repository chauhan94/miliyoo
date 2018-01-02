@include('../common/head')
<body>
@include('../common/pre_loader')
<div class="mn-content fixed-sidebar">

    @include('../common/header')
    @include('../common/search')
    @include('../common/chat')


<aside id="slide-out" class="side-nav white fixed">
    <div class="side-nav-wrapper">
        <div class="sidebar-profile">
            <div class="sidebar-profile-image">
                <img src="{{url('/')}}/assets/images/profile-image.png" class="circle" alt="">
            </div>
            <div class="sidebar-profile-info">
                <a href="javascript:void(0);" class="account-settings-link">
                    <p>David Doe</p>
                    <span>david@gmail.com<i class="material-icons right">arrow_drop_down</i></span>
                </a>
            </div>
        </div>
        <div class="sidebar-account-settings">
            <ul>
                <li class="no-padding">
                    <a href="/retailer/logout" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                </li>
            </ul>
        </div>
        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/retailers')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/retailer/retailers"><i class="material-icons">account_circle</i>Retailers</a></li>
            <li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/categories')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/retailer/categories"><i class="material-icons">account_circle</i>Categories</a></li>
            <li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/drivers')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/retailer/drivers"><i class="material-icons">account_circle</i>Drivers</a></li>
            <li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/products')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/retailer/products"><i class="material-icons">account_circle</i>Products</a></li>


            <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                <li class="no-padding">
                    <a class="collapsible-header waves-effect waves-grey" style="padding: 14px 0px 0px 24px!important;"><i class="material-icons">apps</i>Orders<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="javascript:loadOrders(1)">Pending Orders</a></li>
                            <li><a href="javascript:loadOrders(2)">Completed Orders</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </ul>

        <div class="footer text-color" >
            <p class="copyright">Miliyoo ©</p>
            <a href="#!" class="text-color">Privacy</a> &amp; <a href="#!">Policy</a>
        </div>
    </div>
</aside>
<div id="content" class="">

