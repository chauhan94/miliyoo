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



    <script>



        @if(sizeof($CurrentOrders)>0)
            alert("hello");
            window.Orderdetails=[];
        var CurrentOrders=JSON.parse('<?=str_replace('\'','\\\'',$CurrentOrders) ?>');


        for(var i=0;i<CurrentOrders.length;i++){

            window.Orderdetails[CurrentOrders[i]['id']]=[];
//        window.Orderdetails[CurrentOrders[i]['id']]['taxes']=CurrentOrders[i]['taxes'];
            window.Orderdetails[CurrentOrders[i]['id']]['price']=CurrentOrders[i]['price'];
            window.Orderdetails[CurrentOrders[i]['id']]['items']=CurrentOrders[i]['items'];
            window.Orderdetails[CurrentOrders[i]['id']]['delivery']=CurrentOrders[i]['delivery_charges'];
            window.Orderdetails[CurrentOrders[i]['id']]['order_from']=CurrentOrders[i]['order_from'];


        }
        @endif

        function showOrderDetails(id) {

            order_from=[];
            var other_amt=0;
            var html="";
            details = window.Orderdetails[id];
            console.log(details);
            //tax string to taxes array
            if(details['taxes']!='' && details['taxes']!=null )
                taxes = details['taxes'].split('|');
            else
                taxes=[];

            //other order source details fetch
            if(details['order_from']!=0){
                order_from=details['order_from'].split('@');
            }else{
                order_from=[];
            }


            items =details['items'];
            console.log(items);
            html += "<table class='table'>";
            var tax_amt = 0;
            for (var j = 0; j < items.length; j++) {


                html += "   <tr>";
                html += "  <td>" + items[j]['name'] + " X " + items[j]['quantity'] + "</td>";
                html += "    <td>Rs. " + parseInt(items[j]['quantity'] * items[j]['price']).toFixed(2) + "</td>";
                html += "   </tr>";
            }
            html += "   <th>Sub-Total</th>";
            html += "     <td>Rs. " + parseInt(details['total_amount']).toFixed(2) + "</td>";
            if(taxes.length>0) {
                for (k = 0; k < taxes.length; k++) {

                    t = taxes[k].split('~');
                    tax_amt += ((details['total_amount'] * t[1]) / 100);


                    html += "   <tr>";
                    html += "  <th>" + t[0] + " @ " + t[1] + "%</th>";
                    html += "    <td>Rs. " + ((details['total_amount'] * t[1]) / 100).toFixed(2) + "</td>";
                    html += " </tr>";

                }
            }



            if(order_from.length>0) {



                other_amt = ((details['total_amount'] * order_from[1]) / 100);


                html += "   <tr>";
                html += "  <th>" + details['order_from'] + "%</th>";
                html += "    <td>-Rs. " + other_amt.toFixed(2) + "</td>";
                html += " </tr>";

            }






            html += "   <tr>";
            html+="   <th>Delivery:</th>";
            html+=" <td>Rs. "+ (parseFloat(details['delivery'])).toFixed(2) +"</td>";
            html += "   </tr>";

            html+="   <th>Total Amount</th>";
            html+=" <td>Rs. "+ (parseFloat(details['total_amount'])+parseFloat(tax_amt)+parseFloat(details['delivery'])-parseFloat(other_amt)).toFixed(2) +"</td>";
            html+=" </table>";
            $('#order_body').html(html);
            $('#order_modal').modal('show');
//        alert(html);

        }

    </script>



    {{--<div class="input-field col m6 s12">--}}

    {{--</div>--}}
     <main class="mn-inner">
        <div class="row">

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
                                    <select id="driver_sel" name="driver_sel" style="width: 100%;height: 34px;" onchange="AssignDriverByRetailer({{$orders->id}})">
                                    <option value="0" @if($orders->driver_id=='0') selected @endif>-- Please Select Driver --</option>
                                    @foreach($drivers as $driver)
                                    <option value="{{$driver->id}}" @if($driver->id==$orders->driver_id) selected @endif>{{$driver->name}}</option>

                                    @endforeach

                                    </select>




                                </td>
                                <td>
                                    {{--@if($orders->status==0)--}}
                                        <select id="order_status" class="form-control" onchange="changeOrderStatus({{$orders->id}})">
                                            <option value="0" @if($orders->status==0) selected @endif>Order Pending</option>
                                            <option value="1" @if($orders->status==1) selected @endif>Order Received</option>
                                            <option value="2" @if($orders->status==2) selected @endif>Preparing</option>
                                            <option value="3" @if($orders->status==3) selected @endif>Out for delivery</option>
                                            <option value="4" >Complete Order</option>
                                            <option value="5"  >Cancel Order</option>
                                        </select>

                                </td>
                                <td><i class="material-icons dp48" onclick="PendingOrderdetails()">visibility</i></td>
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

