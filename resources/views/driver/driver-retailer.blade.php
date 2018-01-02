{{--@include('../common/head')--}}
{{--<body>--}}
{{--@include('../common/pre_loader')--}}
{{--<div class="mn-content fixed-sidebar">--}}
    {{--@include('../common/header')--}}
    {{--@include('../common/search')--}}
    {{--@include('../common/chat')--}}

    {{--sidebar info--}}

    {{--@include('../common/sidebar-retailer')--}}


@extends('layouts.apps')

@section('content')


    {{--sidebar info end--}}
    <main class="mn-inner inner-active-sidebar">

        <div class="middle-content">
            {{--place any content here--}}
            <div class="row no-m-t no-m-b animated fadeInDown" style="-webkit-animation-duration: 4s; ">
                @if(!empty($drivers))
                    @foreach($drivers as $driver)
                        <div class="col s12 m12 l4" style="    width: 24.3333333333%;">
                            <div class="card" style="overflow: hidden;">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="{{url('/')}}/assets/images/restaurant.jpg" alt="">

                                </div>
                                <div class="card-content">
                                    <span class="card-title activator">Driver Name: {{$driver->name}}</span>
                                    <span class="card-title activator"> Driver Email: {{$driver->email}}</span>
                                    <div class="action">
                                        <button type="button" class="hvr-bounce-in" onclick="RemoveDriverByRetailer({{$driver->id}})"><span class="material-icons dp48">delete</span></button>
                                    </div>
                                </div>
                                <div class="card-reveal" style="display: none; transform: translateY(0px);">

                                    <div class="switch m-b-md right" style="vertical-align: bottom">
                                        <label>
                                            Block
                                            <input type="checkbox">
                                            <span class="lever"></span>
                                            Unblock
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>


        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;" onclick="AddDriverByretailer()">
            <a class="btn-floating btn-large">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </main>


</div>
<div class="left-sidebar-hover"></div>

@include('modals.add_driver_retailer')
@include('msg_dialog')


</body>
</html>

@stop