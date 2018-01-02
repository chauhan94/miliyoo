
<div id="add_driver" class="modal" style="  z-index: 1003; display: none; opacity: 1; transform: scaleX(0.7); top: 250.516304347826px;">

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title ">Add New Driver</h4>
        </div>
        <hr/>
        <div class="modal-content">
            <form class="col s12" method="post">

                <div class="row">
                    <div class="input-field col s12">
                        <input  id="driver_name" type="text" class="validate" required>
                        <label for="driver_name">Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input  id="driver_email" type="text" class="validate" required>
                        <label for="driver_email">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <input  id="driver_password" type="password" class="validate" required>
                        <label for="driver_password">Password</label>
                    </div>
                </div>
            </form>
        </div>
        <hr/>
        <div class="modal-footer">
            <button type="button" id="btn_dismiss" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1">Cancel</button>
            <button type="button" id="btn_confirm" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1" onclick="AddDriverDb()">ADD</button>
        </div>
    </div>


</div>