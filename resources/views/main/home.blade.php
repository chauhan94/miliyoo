@include('../common/head')
<body>
@include('../common/pre_loader')
<div class="mn-content fixed-sidebar">
    @include('../common/header')
    @include('../common/search')
    @include('../common/chat')

{{--sidebar info--}}

       @include('../common/sidebar-admin')


    {{--sidebar info end--}}
    <main class="mn-inner inner-active-sidebar">

        <div class="middle-content">
            {{--place any content here--}}
            <div class="row no-m-t no-m-b">
                @for($i=0;$i<4;$i++)
                    <div class="col s12 m12 l4">
                        <div class="card "  style="overflow: hidden;">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{url('/')}}/assets/images/card-image2.jpg" alt="">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator" style="margin-bottom: -22px">Name:</span>
                            </div>
                            <div class="card-content">
                                <span class="card-title activator" style="margin-bottom: -22px">License:</span>
                            </div>
                            <div class="card-content">
                                <span class="card-title activator" style="margin-bottom: -22px">Mobile:</span>
                            </div>
                            <div class="card-content">
                                <span class="card-title activator" style="margin-bottom: -22px">Address:</span>
                            </div>
                            <div class="card-content">
                                <span class="card-title activator"><i class="material-icons right">more_vert</i></span>

                            </div>

                            <div class="card-reveal" style="display: none; transform: translateY(0px);">
                                <span class="card-title">Card Title<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                <div class="switch m-b-md" style="float:right">
                                    <label>
                                        Off
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                        On
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>
        </div>



    </main>

</div>
<div class="left-sidebar-hover"></div>


<!-- Javascripts -->
{{--<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="assets/plugins/chart.js/chart.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="assets/plugins/curvedlines/curvedLines.js"></script>
<script src="assets/plugins/peity/jquery.peity.min.js"></script>
<script src="assets/js/alpha.min.js"></script>
<script src="assets/js/pages/dashboard.js"></script>--}}

</body>
</html>