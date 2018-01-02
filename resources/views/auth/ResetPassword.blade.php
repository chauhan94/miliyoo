@include('../common/head')

<body class="signin-page">
@include('../common/pre_loader')
{{--<span id="toast-container" style=" --}}
{{--right: auto !important;--}}
{{--left:40% !important;align-items:   "></span>--}}
<div class="mn-content valign-wrapper">
    <div>

    </div>
    <input type="hidden" id="udt" value="<?= $_GET['email']?>">
    <input type="hidden" id="utk" value="<?= $_GET['token']?>">
    <main class="mn-inner container" >
        <div class="valign">


            <div class="row">

                <div class="col s12 m6 l4 offset-l4 offset-m3 animated fadeInDown "  style="-webkit-animation-duration: 3s;margin-top:-180px; ">
                    <img class="activator img-responsive"  src="{{url('/')}}/assets/images/logo.png" alt="">
                    <div class="card white darken-1">
                        <div class="card-content ">
                            <span class="card-title">Admin Reset Password</span>
                            <div class="row">
                                <form class="col s12" method="post" action="{{ route('loginadmin') }}" id="signin">
                                    {{ csrf_field() }}
                                    <div class="input-field col s12">
                                        <input name="password" id="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input name="password" id="confirm-password" type="password" class="validate">
                                        <label for="password">Confirm Password</label>
                                    </div>
                                    <div class="col s12 right-align m-t-sm">
                                        {{--<a href="/admin/signup" class="waves-effect waves-gray  btn-flat">Sign Up</a>--}}
                                        <button type="button" class="waves-effect waves-light  btn button-color hvr-wobble-bottom" onclick="updateAdminPassword()">update</button>

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
@include('msg_dialog')
</body>
</html>