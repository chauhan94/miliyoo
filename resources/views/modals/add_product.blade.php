
<div id="add_product" class="modal" style="  z-index: 1003; display: none; opacity: 1; transform: scaleX(0.7); top: 250.516304347826px;">

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title ">Add New Product</h4>
        </div>
        <hr/>
        <div class="modal-content">
            <h4 class="modal-title" id="dlg_title"></h4>
            <form class="col s12"  name="add_product" id="addassessor" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 text-center">
                        <label for="image"/>
                        <img  id="regi_image" style="margin-left:40%;border-radius: 50%;margin-top:-30px; "  src="{{url('/')}}/assets/images/add_photo.png">
                        <input  name="image" id="image" type="file" style="display:none" onchange="readURLImage(this);"  accept="image/*" required/>

                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input  id="product_name" name="name" type="text" class="validate">
                        <label for="product_name">Name</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="product_license" name="license" type="text" class="validate">
                        <label for="license no.">License No.</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="product_price" name="price" type="number" class="validate">
                        <label for="price">Price</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="product_address" type="text" name="address" class="validate">
                        <label for="price">address</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="product_qunatity" type="number" name="quantity" class="validate">
                        <label for="price">Quantity</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="product_details" type="text" name="details" class="validate">
                        <label for="price">Details</label>
                    </div>
                    <select class="col s12" id="category_sel" name="category_sel" style="width: 100%;height: 34px;" >
                        <option value="" >-- Please Select Category --</option>
                        @foreach($categories as $cate)
                            <option value="{{$cate['id']}}">{{$cate['name']}}</option>

                        @endforeach

                    </select>
                </div>
            </form>
        </div>
        <hr/>
        <div class="modal-footer">
            <button type="button" id="dlg_btn_dismiss" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1">Dismiss</button>
            <button type="button" id="dlg_btn_confirm" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1" onclick="AddProductDb()">OK</button>
        </div>
    </div>


</div>