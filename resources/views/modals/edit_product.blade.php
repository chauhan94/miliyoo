<?php //dd($categories);  ?>
<div id="edit_product" class="modal" style="  z-index: 1003; display: none; opacity: 1; transform: scaleX(0.7); top: 250.516304347826px;">

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title ">Edit Product</h4>
        </div>
        <hr/>
        <div class="modal-content">
            <form class="col s12"  name="edit_product" id="addassessor" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 text-center">
                        <label for="edit_image"/>
                        <img  id="edit_regi_image" style="margin-left:40%;border-radius: 50%;margin-top:-30px; max-width: 150px; max-height: 150px !important;"  src="{{URL::to('/')}}/assets/images/add_photo.png">
                        <input  name="edit_image" id="edit_image" type="file" style="display:none;" onchange="readURLImage2(this)"  accept="image/*" required/>

                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input placeholder="placeholder"  id="edit_product_name" name="e_name" type="text" class="validate">
                        <label for="product_name">Name</label>
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="placeholder" id="edit_product_license" name="e_license" type="text" class="validate">
                        <label for="license no.">License No.</label>
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="placeholder" id="edit_product_price" name="e_price" type="number" class="validate">
                        <label for="price">Price</label>
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="placeholder" id="edit_product_address" type="text" name="e_address" class="validate">
                        <label for="price">address</label>
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="placeholder" id="edit_product_qunatity" type="number" name="e_quantity" class="validate">
                        <label for="price">Quantity</label>
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="placeholder" id="edit_product_details" type="text" name="e_details" class="validate">
                        <label for="price">Details</label>
                    </div>
                    <select class="col s12" id="edit_category_select" name="e_category_sel" style="width: 100%;height: 34px;"  >
                        <option value="" >-- Please Select Category --</option>
                        @foreach($categories as $cate)
                            <option  value="<?= $cate->id ?>" ><?= $cate->name ?></option>

                        @endforeach

                    </select>
                </div>
                <input type="hidden" name="product_id"  id="product_id">
            </form>
        </div>
        <hr/>
        <div class="modal-footer">
            <button type="button" id="btn_dismiss" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1">Dismiss</button>
            <button type="button" id="update_btn" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1">OK</button>
        </div>
    </div>


</div>