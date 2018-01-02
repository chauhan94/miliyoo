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
    <main class="mn-inner inner-active-sidebar display responsive-table datatable-example" id="example">
        <div class="middle-content">
            {{--place any content here--}}
            <div class="row no-m-t no-m-b">
                @if(!empty($users))
                    @foreach($users as $user)
                    <div class="col s12 m12 l4">
                        <div class="card" style="overflow: hidden;">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{url('/')}}/assets/images/card-image2.jpg" alt="">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator">User name: {{$user->full_name}}</span>
                                <span class="card-title activator">Mobile: {{$user->mobile}}</span>
                                {{--<span class="card-title activator">@if({{$user->is_restaurent == 1}}) Restaurent: @else General User @endif</span>--}}
                                <span class="card-title activator" style="padding-bottom: 10px"><i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal" style="display: none; transform: translateY(0px);">
                                <p> <span class="card-title">User name<i class="material-icons right">close</i></span></p>
                             <p>   <span>
                                    User Email: {{$user->email}}
                                </span></p>
                                <p>   <span>
                                    User Mobile: {{$user->mobile}}
                                </span></p>
                                <p>  <span>
                                    User Address: {{$user->address}}
                                </span></p>
                                <div class="switch m-b-md right" style="vertical-align: bottom" onchange="userBlock({{$user->id}},{{$user->status}})">

                                            <label>
                                                Unblock
                                                @if($user->status == 0)
                                                <input type="checkbox" checked>
                                                <span class="lever"></span>
                                                @else
                                                    <input type="checkbox">
                                                    <span class="lever"></span>
                                                @endif
                                                Block
                                            </label>
                                        </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                    @endif


            </div>
            <p style="float: right">
            {!! $users->links() !!}
            </p>
        </div>




    </main>

</div>
<div class="left-sidebar-hover"></div>


@include('msg_dialog')

</body>
</html>