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
            <div class="row no-m-t no-m-b">
                @if(!empty($retailers))
                    @foreach($retailers as $retailer)
                    <div class="col s12 m12 l4">
                        <div class="card" style="overflow: hidden;">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{url('/')}}/assets/images/restaurant.jpg" alt="">

                            </div>

                            <div class="card-content">
                                <span class="card-title activator">Retailer Name: {{$retailer->user_name}}</span>
                                <span class="card-title activator">Retailer license No: {{$retailer->license_no}}</span>
                                <span class="card-title activator">Retailer phone: {{$retailer->mobile_no}}</span>
                                <span class="card-title activator" style="padding-bottom: 10px"><i class="material-icons right">more_vert</i></span>
                                {{--<div class="action">--}}
                                {{--<button type="button" class="btn" onclick="editProduct()"><span class="glyphicon glyphicon-edit"></span></button>--}}
                                {{--<button type="button" class="btn"  onclick="deleteProduct()"><span class="glyphicon glyphicon-trash"></span></button>--}}
                                {{--</div>--}}
                            </div>
                            <div class="card-reveal" style="display: none; transform: translateY(0px);">
                                <p> <span class="card-title">Retalier Info<i class="material-icons right">close</i></span></p>
                                <p>   <span>
                                    Retailer license No: {{$retailer->license_no}}
                                </span></p>
                                <p>   <span>
                                    Retailer Name: {{$retailer->user_name}}
                                </span></p>
                                <p>  <span>
                                    Retailer phone: {{$retailer->mobile_no}}
                                </span></p>
                               {{-- <div class="switch m-b-md right" style="vertical-align: bottom" onchange="#">

                                    <label>
                                        Block
                                        @if($retailer->is_verified == 0)
                                            <input type="checkbox">
                                            <span class="lever"></span>
                                        @else
                                            <input type="checkbox" checked>
                                            <span class="lever"></span>
                                        @endif
                                        Verify
                                    </label>
                                </div>--}}

                            </div>
                        </div>
                    </div>
                @endforeach
                    @endif

            </div>
        </div>



    </main>



</div>
<div class="left-sidebar-hover"></div>


@include('msg_dialog')

</body>
</html>

@stop