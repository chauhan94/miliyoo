{{--@include('../common/head')--}}
{{--<body>--}}
{{--@include('../common/pre_loader')--}}
{{--<div class="mn-content fixed-sidebar">--}}
    {{--@include('../common/header')--}}
    {{--@include('../common/search')--}}
    {{--@include('../common/chat')--}}
{{--@include('../common/head')--}}
    {{--@include('../common/sidebar-retailer')--}}
@extends('layouts.apps')

@section('content')

    {{--sidebar info end--}}
    <main class="mn-inner inner-active-sidebar">
        {{--<select id="category_sel" name="category_sel" style="width: 100%;height: 34px;" >--}}
            {{--<option value="" >-- Please Select Category --</option>--}}
            {{--@foreach($categories as $cate)--}}
                {{--<option value="{{$cate['id']}}">{{$cate['name']}}</option>--}}

            {{--@endforeach--}}

        {{--</select>--}}
        <div class="middle-content">
            {{--place any content here--}}
            <div class="row no-m-t no-m-b animated fadeInDown" style="-webkit-animation-duration: 4s; ">
                @if(!empty($products))
                    @foreach($products as $product)
                    <div class="col s12 m12 l4">
                        <div class="card" style="overflow: hidden;">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator img-responsive" src="{{asset('assets/images/product_image/'.$product->image)}}" style="width:402px;height:268px;" alt="">

                            </div>

                            <div class="card-content">
                                <span class="card-title activator">Product Name: {{$product->name}}</span>
                                <span class="card-title activator">Product License No: {{$product->license_no}}</span>
                                <span class="card-title activator">Product Price: {{$product->price}}</span>
                                <span class="card-title activator" style="padding-bottom: 10px"><i class="material-icons right">more_vert</i></span>
                                <div class="action">
                                <button type="button" class="hvr-bounce-in" onclick="editProduct({{$product->id}})"><span class="material-icons dp48">edit</span></button>
                                <button type="button" class="hvr-bounce-in"  onclick="deleteProduct({{$product->id}})"><span class="material-icons dp48">delete</span></button>
                            </div>
                            </div>
                            <div class="card-reveal" style="display: none; transform: translateY(0px);">
                                <p> <span class="card-title">Product Name {{$product->name}}<i class="material-icons right">close</i></span></p>
                                <p>   <span>
                                    Product Name: {{$product->name}}
                                </span></p>
                                <p>   <span>
                                    Product License No: {{$product->license_no}}
                                </span></p>
                                <p>  <span>
                                    Product Price: {{$product->price}}
                                </span></p>
                                <div class="switch m-b-md right" style="vertical-align: bottom" onchange="ChangeProductStatus({{$product->id}},{{$product->status}})">
                                    <label>
                                        Enable
                                        @if($product->status == 1)
                                            <input type="checkbox" >
                                            <span class="lever"></span>
                                        @else
                                            <input type="checkbox" checked>
                                            <span class="lever"></span>
                                        @endif
                                        Disable
                                    </label>


                                </div>
                                <br><br><br>
                                <div class="switch m-b-md right" style="vertical-align: bottom" onchange="ChangeProductAdvertisingStatus({{$product->id}},{{$product->is_retailer_advertising}})">

                                    <label>
                                        No Advertise
                                        @if($product->is_retailer_advertising == 0)
                                            <input type="checkbox" >
                                            <span class="lever"></span>
                                        @else
                                            <input type="checkbox" checked>
                                            <span class="lever"></span>
                                        @endif
                                        Advertise
                                    </label>

                                </div>




                            </div>
                        </div>
                    </div>
                @endforeach
                    @endif

            </div>
        </div>


        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;" onclick="AddProduct()">
            <a class="btn-floating btn-large">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </main>


</div>

<div class="left-sidebar-hover">

</div>


@include('modals.add_product')
@include('modals.edit_product')
@include('msg_dialog')

</body>
</html>

@stop
