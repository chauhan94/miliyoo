@include('../common/head')

<body class="signin-page">
@include('../common/pre_loader')
{{--<span id="toast-container" style=" --}}
  {{--right: auto !important;--}}
  {{--left:40% !important;align-items:   "></span>--}}
<div class="mn-content valign-wrapper">
    <div>

    </div>

    <main class="mn-inner container" >
        <div class="valign">


            <div class="row">

                <div class="col s12 m6 l4 offset-l4 offset-m3 animated fadeInDown "  style="-webkit-animation-duration: 3s;margin-top:-180px; ">
                    <img class="activator img-responsive"  src="{{url('/')}}/assets/images/logo.png" alt="">
                    <div class="card white darken-1" id="login_admin">
                        <div class="card-content ">
                            <h5 class="" style="text-align: center; color:green">Have a Happy {{date("l")}} ! <i class="em em-slightly_smiling_face"></i></h5>
                            <hr/>
                            <span class="card-title" style="text-align: center">Admin Sign In</span>
                            <div class="row">
                                <form class="col s12" method="post" action="{{ route('loginadmin') }}" id="signin">
                                {{ csrf_field() }}
                                    <div class="input-field col s12">
                                        <input name="email" id="email" type="email" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input name="password" id="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col s12 right-align m-t-sm">
                                        <a href="/admin/forgot-password"><span id="forgot" style="cursor: pointer;color: red;margin-bottom: 5px;margin-top:-9px;float: left;">Forgot Password?</span></a><br/>
                                        {{--<a href="/admin/signup" class="waves-effect waves-gray  btn-flat">Sign Up</a>--}}
                                        <button type="button" class="waves-effect waves-light  btn button-color hvr-wobble-bottom" onclick="login()">Sign In</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>

</body>
</html>