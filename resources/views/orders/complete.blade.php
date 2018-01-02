{{--@include('../common/head')--}}
{{--<body>--}}
{{--@include('../common/pre_loader')--}}
{{--<div class="mn-content fixed-sidebar">--}}
{{--@include('../common/header')--}}
{{--@include('../common/search')--}}
{{--@include('../common/chat')--}}



{{--@include('../common/sidebar-retailer')--}}

@extends('layouts.apps')

@section('content')
    {{--<div class="input-field col m6 s12">--}}

    {{--</div>--}}
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Complete Orders</div>
                @if($type == 2)
                    <div class="col l3 right-align " style="margin-left:20%">
                        <label for="Orderdate">Date</label>
                        <input id="Orderdate" name="Orderdate" type="date" class="datepicker" onchange="getdate(2)" style="background-color: #ffffff" value="{{date("jS F, Y", strtotime("11.12.10"))}}">
                    </div>
                @endif
            </div>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th>OrderId</th>
                                <th>Customer Name & address</th>
                                <th>date</th>
                                <th>Driver</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($CurrentOrders as $orders)
                                <tr>
                                    <td>#{{$orders->id}}</td>
                                    <td>
                                        {{$orders['customer']->full_name}}
                                        Contact: {{$orders['customer']->mobile}}

                                    </td>
                                    <td>{{$orders->order_date}}</td>
                                    <td>
                                        {{$orders->driver}}
                                    </td>
                                    <td>
                                            @if($orders->status == 1)
                                                Order Completed
                                            @endif
                                            @if($orders->status == 0)
                                                Order Cancelled
                                            @endif


                                    </td>
                                    <td><i class="material-icons dp48">visibility</i></td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


    </div>


    <div class="left-sidebar-hover">

    </div>



    @include('msg_dialog')
    </body>

    </html>

@stop

