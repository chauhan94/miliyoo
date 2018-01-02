@include('../common/head')
<body>
@include('../common/pre_loader')
<div class="mn-content fixed-sidebar">
    @include('../common/header')
    @include('../common/search')
    @include('../common/chat')

    sidebar info


    @include('../common/sidebar-admin')




    <main class="mn-inner inner-active-sidebar">

        <div class="middle-content">

            <div class="row no-m-t no-m-b">
                @foreach($charges as $charge)
                <div class="card horizontal" style="width:37%" onclick="editCharges({{$charge->id}},{{$charge->delivery_charges}},{{$charge->order_fee}})">

                    <div class="card-image">
                        <img src="{{url('/')}}/assets/images/card-image6.jpg" style="height:100%">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content" style="padding:0px;">
                            <div class="row">
                                <form class="col s12">

                                        <div class="card-content">
                                            <span class="card-title activator">Delivery charges: {{$charge->delivery_charges}} </span>
                                        </div>
                                    <div class="card-content">
                                        <span class="card-title activator">Per order fee: {{$charge->order_fee}}</span>
                                    </div>




                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;" onclick="addCharges()">
            <a class="btn-floating btn-large">
                <i class="large material-icons">add</i>
            </a>
        </div>

    </main>

</div>
<div class="left-sidebar-hover"></div>

@include('modals.edit_charges');
@include('modals.add_charges')

@include('msg_dialog')

</body>
</html>

