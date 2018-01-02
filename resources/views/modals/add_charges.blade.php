<div id="add_charges" class="modal" style="  z-index: 1003; display: none; opacity: 1; transform: scaleX(0.7); top: 250.516304347826px;">

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title ">Edit Charges</h4>
        </div>
        <hr/>
        <div class="modal-content">
            <h4 class="modal-title" id="dlg_title"></h4>
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input  id="fee_charge" type="number" class="validate">
                        <label for="Fee Charges">Fee Charges</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="delivery_charges" type="number" class="validate">
                        <label for="Delivery Charges">Delivery Charges</label>
                    </div>
                </div>
            </form>
        </div>
        <hr/>
        <div class="modal-footer">
            <button type="button" id="btn_dismiss" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1">Dismiss</button>
            <button type="button" id="btn_confirm" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1" onclick="AddChargesDb()">Add</button>
        </div>
    </div>


</div>