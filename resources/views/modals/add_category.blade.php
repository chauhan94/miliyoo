
<div id="add_category" class="modal" style="  z-index: 1003; display: none; opacity: 1; transform: scaleX(0.7); top: 250.516304347826px;">

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title ">Add New Category</h4>
        </div>
        <hr/>
        <div class="modal-content">
            <form class="col s12" method="post">

                <div class="row">
                    <div class="input-field col s12">
                        <input  id="category_name" type="text" class="validate" required>
                        <label for="category_name">Category Name</label>
                    </div>
                </div>
            </form>
        </div>
        <hr/>
        <div class="modal-footer">
            <button type="button" id="btn_dismiss" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1">Dismiss</button>
            <button type="button" id="btn_confirm" class="modal-action modal-close waves-effect waves-blue btn-flat " style="color:#00ACC1" onclick="AddCategoryDb()">OK</button>
        </div>
    </div>


</div>