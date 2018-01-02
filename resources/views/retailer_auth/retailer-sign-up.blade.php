@include('../common/head');
    <body class="signup-page">
    @include('../common/preloader');
        <div class="mn-content valign-wrapper">
            <main class="mn-inner container ">
                <div class="valign">
                      <div class="row">
                          <div class="col s12 m6 l4 offset-l4 offset-m3 animated fadeInDown "  style="-webkit-animation-duration: 3s;margin-top:-180px;">
                              <img class="activator img-responsive"  src="{{url('/')}}/assets/images/logo.png" alt="">
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <h5 class="" style="text-align: center; color:green">Have a Happy {{date("l")}}</h5>
                                      <hr/>
                                      <span class="card-title" style="text-align: center">Retailer Sign Up</span>
                                       <div class="row">
                                           <form class="col s12">
                                               <div class="input-field col s12">
                                                   <input id="name" type="text" class="validate">
                                                   <label for="name">User Name</label>
                                               </div>
                                               <div class="input-field col s6">
                                                   <input id="email" type="email" class="validate" value="">
                                                   <label for="email">Email</label>
                                               </div>
                                               <div class="input-field col s6">
                                                   <input id="password" type="password" class="validate" value="">
                                                   <label for="password">Password</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="license_no" type="text" class="validate">
                                                   <label for="license no.">License no.</label>
                                               </div>
                                               <div class="input-field col s6">
                                                   <input id="phone" type="text" class="validate">
                                                   <label for="Phone">Phone</label>
                                               </div>
                                               <div class="input-field col s6">
                                                   <input id="address" type="text" class="validate">
                                                   <label for="address">Address</label>
                                               </div>

                                               <div class="col s12 right-align m-t-sm">
                                                   <a href="/retailer/login" class="waves-effect waves-gray  btn-flat hvr-wobble-bottom">Sign In</a>

                                                   <button type="button" class="waves-effect waves-light  btn button-color animated hvr-wobble-bottom" onclick="RetailerSignup()">Sign Up</button>

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
        
        <!-- Javascripts -->

    @include('msg_dialog')
    </body>
</html>