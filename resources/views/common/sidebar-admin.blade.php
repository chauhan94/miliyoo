{{--<aside id="slide-out" class="side-nav white fixed">--}}
    {{--<div class="side-nav-wrapper">--}}
        {{--<div class="sidebar-profile">--}}
            {{--<div class="sidebar-profile-image">--}}
                {{--<img src="{{url('/')}}/assets/images/profile-image.png" class="circle" alt="">--}}
            {{--</div>--}}
            {{--<div class="sidebar-profile-info">--}}
                {{--<a href="javascript:void(0);" class="account-settings-link">--}}
                    {{--<p>David Doe</p>--}}
                    {{--<span>david@gmail.com<i class="material-icons right">arrow_drop_down</i></span>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="sidebar-account-settings">--}}
            {{--<ul>--}}
                {{--<li class="no-padding">--}}
                    {{--<a href="/admin/logout" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
{{--<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">--}}
    {{--<li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/home')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/admin/home"><i class="material-icons">home</i>Restaurents</a></li>--}}
    {{--<li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/home')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/admin/retailers"><i class="material-icons">account_circle</i>Retailers</a></li>--}}
    {{--<li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/users')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/admin/users"><i class="material-icons">account_circle</i>Users</a></li>--}}
    {{--<li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/users')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/admin/drivers"><i class="material-icons">account_circle</i>Drivers</a></li>--}}
    {{--<li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/users')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/admin/products"><i class="material-icons">account_circle</i>Products</a></li>--}}
    {{--<li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/users')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/admin/fees"><i class="material-icons">account_circle</i>Fees</a></li>--}}

    {{--<li class="no-padding">--}}
        {{--<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Orders<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>--}}
        {{--<div class="collapsible-body">--}}
            {{--<ul>--}}
                {{--<li><a href="/admin/completed_orders">Completed Orders</a></li>--}}
                {{--<li><a href="/admin/pending_orders">Pending Orders</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</li>--}}

{{--</ul>--}}

{{--<div class="footer text-color" >--}}
    {{--<p class="copyright">Miliyoo ©</p>--}}
    {{--<a href="#!" class="text-color">Privacy</a> &amp; <a href="#!">Policy</a>--}}
{{--</div>--}}
    {{--</div>--}}
{{--</aside>--}}



<aside id="slide-out" class="side-nav white fixed">
    <div class="side-nav-wrapper">
        <div class="sidebar-profile">
            <div class="sidebar-profile-image">
                <img src="assets/images/profile-image.png" class="circle" alt="">
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
                    <a href="/admin/logout" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                </li>
            </ul>
        </div>

        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/retailers')!==false)?'active': ''}}"><a class="waves-effect waves-grey hvr-wobble-bottom hover-text"  href="/admin/retailers"><i class="material-icons">account_circle</i>Retailers</a></li>
            <li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/users')!==false)?'active': ''}}" ><a class="waves-effect waves-grey hvr-wobble-bottom" href="/admin/users"><i class="material-icons">account_circle</i>Users</a></li>
            <li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/drivers')!==false)?'active': ''}}"><a class="waves-effect waves-grey hvr-wobble-bottom" href="/admin/drivers"><i class="material-icons">account_circle</i>Drivers</a></li>
            {{--<li class="no-padding"><a class="waves-effect waves-grey hvr-wobble-bottom" href="/admin/products"><i class="material-icons">account_circle</i>Products</a></li>--}}
            <li class="no-padding {{ (strpos($_SERVER['REQUEST_URI'],'/charges')!==false)?'active': ''}}"><a class="waves-effect waves-grey active" href="/admin/charges"><i class="material-icons">account_circle</i>Delivery charges & fee</a></li>

        </ul>
        {{--<div class="footer text-color">--}}
            {{--<p class="copyright">Miliyoo ©</p>--}}
            {{--<a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>--}}
        {{--</div>--}}
    </div>
</aside>