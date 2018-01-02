<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title -->
    <title>Miliyoo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />

    <!-- Styles -->

    <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/animate.min.css"/>
    <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/hover-min.css"/>
    <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/plugins/materialize/css/materialize.min.css"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{url('/')}}/assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
{{--<link href="{{url('/')}}/assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">--}}


<!-- Theme Styles -->
    <link href="{{url('/')}}/assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/assets/css/custom.css" rel="stylesheet" type="text/css"/>


    <script src="{{url('/')}}/assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    {{--<script src="{{url('/')}}/assets/plugins/datatables/js/jquery.dataTables.min.js"></script>--}}




    <script src="{{url('/')}}/assets/js/alpha.min.js"></script>
    {{--<script src="{{url('/')}}/assets/js/pages/table-data.js"></script>--}}

    <script src="{{url('/')}}/js/miliyoo.js"></script>

</head>
<div class="loader-bg" id="overlay"></div>
<div class="loader">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-yellow">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>
</html>