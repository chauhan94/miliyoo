@include('../common/head')
<body>
@include('../common/pre_loader')
<div class="mn-content fixed-sidebar">
    @include('../common/header')
    @include('../common/search')
    @include('../common/chat')

sidebar info


    @include('../common/sidebar-admin')


sidebar info end

    <main class="mn-inner inner-active-sidebar">

        <div class="middle-content">

            <div class="row no-m-t no-m-b">
                <div class="card horizontal">
                    <div class="card-image">
                        <img src="{{url('/')}}/assets/images/card-image6.jpg" style="height:100%">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content" style="padding:0px;">
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">mode_edit</i>
                                            <input id="icon_prefix" type="text" class="validate">
                                            <label for="icon_prefix">Fee charge</label>

                                        </div>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">mode_edit</i>
                                            <input id="icon_prefix" type="text" class="validate">
                                            <label for="icon_prefix">Delivery charge</label>

                                        </div>
                                        <div class="input-field col s12">
                                            <a class="waves-effect waves-light btn m-b-xs hvr-wobble-bottom" onclick="updateFee()">UPDATE</a>

                                        </div>


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
<div class="left-sidebar-hover"></div>


@include('modals.edit_fee')

@include('msg_dialog')

</body>
</html>

