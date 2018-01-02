function showDlg(header, body, confirm, callback,order)
{
    order = typeof order !== 'undefined' ? true : false;

    var s = $('#dlg_title').html(header);
    $('#dlg_contents').html(body);
    if(!confirm){
        $('#dlg_btn_dismiss').hide();
        $('#dlg_btn_confirm').text("OK")
    }else{

        $('#dlg_btn_dismiss').show();
        $('#dlg_btn_confirm').text("Confirm")

    }
    $('#dlg_btn_dismiss').unbind();
    $('#dlg_btn_dismiss').click(function(){
        $("#dlg_messages").openModal('close');
        if(callback != null)
            callback(false);
    });
    $('#dlg_btn_close').unbind();
    $('#dlg_btn_close').click(function(){
        $("#dlg_messages").openModal('close');
        if(callback != null)
            callback(false);
    });
    $('#dlg_btn_confirm').unbind();
    $('#dlg_btn_confirm').click(function(){
        $("#dlg_messages").openModal('close');
        if(callback != null)
            callback(true);
    });
    $("#dlg_messages").openModal();
}


function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}


//manish js....
function login()
{
    var formData = new FormData($('#signin')[0]);
    // console.log(formData);

    $.ajax({
        url: "/loginadmin",
        type: "POST",
        dataType: 'json',
        data: formData,
           headers: {'X-CSRF-TOKEN': document.getElementsByName('_token').value},

        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
//                hideLoading();
            if (data.status == true) {

                window.location.href = '/admin/retailers';
            } else{

                for(var i = 0; i < data.message.length ;i++)
                {
                    Materialize.toast(data.message[i], 3000, 'green rounded');

                    $("#login_admin").removeClass('shake_effect');
                    setTimeout(function()
                    {
                        $("#login_admin").addClass('shake_effect')
                    },1);
                 // $('#toast-container').append( Materialize.toast(data.message[i], 3000, 'green rounded'));
//            sleep(1000);
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
//                hideLoading();


            if (jqXHR.status == 500) {
                // alert('Internal error: ' + jqXHR.responseText);
                console.log(jqXHR.responseText);
            } else {

                console.log(jqXHR.responseText);
            }
        }
    });
}



function RetailerLogin() {
    var values = new FormData($('#retailsignin')[0]);
    // console.log(formData);

    $.ajax({
        url: "/retailer/retailerlogin",
        type: "POST",
        dataType: 'json',
        data: values,
//            headers: {'X-CSRF-TOKEN': document.getElementsByName('_token').value},

        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
//                hideLoading();
            if (data.status == true) {

                window.location.href = '/retailer/retailers';

            } else {

                for (var i = 0; i < data.message.length; i++) {
                    Materialize.toast(data.message[i], 3000, 'green rounded');

                    $("#login_error").removeClass('shake_effect');
                    setTimeout(function()
                    {
                        $("#login_error").addClass('shake_effect')
                    },1);

                    // $('#toast-container').append( Materialize.toast(data.message[i], 3000, 'green rounded'));
//            sleep(1000);
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
//                hideLoading();


            if (jqXHR.status == 500) {
                // alert('Internal error: ' + jqXHR.responseText);
                console.log(jqXHR.responseText);
            } else {

                console.log(jqXHR.responseText);
            }
        }
    });

}




    function RetailerSignup(){

        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var license_no = $('#license_no').val();
        var phone = $('#phone').val();
        var address = $('#address').val();

        if(name == '' || email == '' || password == '' || license_no == '' || phone == '' || address == ''){

            showDlg('Success', 'Please fill all entries');
            return;
        }

        $.ajax({
            url: "/retailer/retailerSignup",
            type: "POST",
            dataType: 'json',
            data: {name:name,email:email,password:password,license_no:license_no,phone:phone,address:address},
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            success: function (data) {
                console.log(data);
//                hideLoading();
                if (data.status == true) {

                    window.location.href = '/retailer/login';

                } else{

                    for(var i = 0; i < data.message.length ;i++)
                    {

                        showDlg('Error!',data.message,false,function (dt) {
                            window.location.reload();
                        });
                        // Materialize.toast(data.message[i], 3000, 'green rounded');
                        // $('#toast-container').append( Materialize.toast(data.message[i], 3000, 'green rounded'));
//            sleep(1000);
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
//                hideLoading();


                if (jqXHR.status == 500) {
                    // alert('Internal error: ' + jqXHR.responseText);
                    console.log(jqXHR.responseText);
                } else {

                    console.log(jqXHR.responseText);
                }
            }
        });
    }


function Sendmail(){
    var email=$('#email').val();
    if(!validateEmail(email)){
        showDlg("Alert!!!",'Please enter a valid email address.');
        return false;
    }
    $.ajax({
        url: "/admin/sendResetMail",
        type: "POST",
        dataType: 'json',
        data: {

            email:email

        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        // processData: false,
        // contentType: false,
        success: function (data) {
            if (data.status == true) {

                swal({title: "Success", text: "A password reset link is sent to your email.", type: "success"},
                    function(){
                        window.location.href='/login';
                    }
                );




                // showDlg('Alert!','A password reset link is sent to your email.',false,function (dt) {
                //     if(dt){
                //
                //         window.location.href='/login';
                //     }
                //
                // });
            }else {

                swal('Alert!', data.message);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {



            if (jqXHR.status == 500) {
                // alert('Internal error: ' + jqXHR.responseText);
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.responseText);
                alert("Connection timeout");
            }
        }
    });
}

function updateAdminPassword(){

    var password=$('#password').val();
    var email=$('#udt').val();
    var token=$('#utk').val();
    var repassword=$('#confirm-password').val();
    if(password==''){
        showDlg('Alert','Please input password.Password cannot be empty.');
        return;

    }
    if(password!=repassword){
        showDlg('Alert!','Password not match.');
        return;
    }
    if(!validateEmail(email)){
        showDlg("Alert!!!",'Please enter a valid email address.');
        return false;
    }
    $.ajax({
        url: "/admin/updateAdminPassword",
        type: "POST",
        dataType: 'json',
        data: {

            password:password,
            email:email,
            token:token

        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        // processData: false,
        // contentType: false,
        success: function (data) {
            if (data.status == true) {


                swal({title: "Success", text: "Password Updated Successfully.", type: "success"},
                    function(){
                        window.location.href='/admin/login';
                    }
                );




                // showDlg('Alert!','Password Updated Successfully.',false,function (dt) {
                //     if(dt){
                //
                //         window.location.href='/admin/login';
                //     }
                //
                // });
            }else {

                swal('Alert!', data.message);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {


            if (jqXHR.status == 500) {
                // alert('Internal error: ' + jqXHR.responseText);
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.responseText);
                alert("Connection timeout");
            }
        }
    });

}


function userBlock(user_id,status){
    $.ajax({
        url: "/admin/adminBlocksUser",
        type: "GET",
        data: {

            id:user_id,
            status:status,
        },
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',

        success: function (data) {
            console.log(data);
            // $('#edit_subcategory').modal('hide');
            if(data.status==true){

                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.href='/admin/login';
                    }
                );



                // showDlg('Success!',data.message,false,function (dt) {
                //     window.location.reload();
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    // $('#edit_subcategory').modal('show');
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log((jqXHR.responseText));
                // alert(JSON.stringify(jqXHR));
            }
        }
    });

}

function RetailerVerify($retailer,status){

    $.ajax({
        url: "/admin/RetailerVerify",
        type: "GET",
        data: {

            id:$retailer,
            status:status,
        },
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',

        success: function (data) {
            console.log(data);
            // $('#edit_subcategory').modal('hide');
            if(data.status==true){

                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.reload();
                    }
                );



                // showDlg('Success!',data.message,false,function (dt) {
                //     window.location.reload();
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    // $('#edit_subcategory').modal('show');
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log((jqXHR.responseText));
                // alert(JSON.stringify(jqXHR));
            }
        }
    });


}

function AddCategory(){
    $('#add_category').openModal();
}

function AddCategoryDb(){

    var category_name = $('#category_name').val();





    $.ajax({
        url: "/retailer/add_category",
        type: "POST",
        data: {
            'category':category_name

        },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        // processData: false,
        // contentType: false,
        success: function (data) {

            if (data.status == true) {

                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.reload();
                    }
                );





                // showDlg('Success', 'Category added successfuly', false, function (dt) {
                //     if (dt) {
                //         alert("hello");
                //
                //     }
                // });
            }
            // var json_obj = JSON.parse(data);
            if (data.status == false) {
                // $("#add_assessor").modal('hide');
                //  alert('hii');
                // window.location.reload();
                showDlg('Error', data.message, false, function (dt) {

                    //  window.location.reload();


                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {
                // alert('Internal error: ' + jqXHR.responseText);
                console.log(jqXHR.responseText);
            } else {
                alert('Unexpected error.');
            }
        }
    });
}

function EditCategory(id,name){
    $('#category_edit_name').val(name);//inset value to the form
    $('#edit_btn').attr('onclick','EditCategoryDb('+id+')');
    $('#edit_category').openModal();
}

function EditCategoryDb(id){


    var category_name=$('#category_edit_name').val();

    if(category_name==''){
        showDlg('Alert','Cannot add a blank Category.');
        return;
    }
    $.ajax({
        url: "/retailer/edit_category",
        type: "POST",
        data: {
            id:id,
            category:category_name
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',

        success: function (data) {
            if(data.status==true){

                swal({title: "Success", text: "category updated", type: "success"},
                    function(){
                        location.reload();
                    }
                );



                // showDlg('Success', data.message, false, function (dt) {
                //
                //
                //         alert("hello");
                //
                //         window.location.reload();
                //
                //
                //
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    $('#edit_category').modal('show');
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log(JSON.stringify(jqXHR));
                alert(JSON.stringify(jqXHR));
            }
        }
    });
}

function ChangeCategoryStatus(category_id,status){
    $.ajax({
        url: "/retailer/ChangeCategoryStatus",
        type: "GET",
        data: {

            id:category_id,
            status:status,
        },
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',

        success: function (data) {
            console.log(data);
            // $('#edit_subcategory').modal('hide');
            if(data.status==true){

                swal({title: "Success", text: "category Status updated", type: "success"},
                    function(){
                        location.reload();
                    }
                );




                // showDlg('Success!',data.message,false,function (dt) {
                //     if(dt){
                //
                //         window.location.href='/retailer/categories';
                //     }
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    // $('#edit_subcategory').modal('show');
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log((jqXHR.responseText));
                // alert(JSON.stringify(jqXHR));
            }
        }
    });
}

function readURLImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#regi_image')
                .attr('src', e.target.result)
                .width(140)
                .height(140);
        };

        reader.readAsDataURL(input.files[0]);
    }
}



function readURLImage2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#edit_regi_image')
            $('#edit_regi_image')
                .attr('src', e.target.result)
                .width(140)
                .height(140);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


function AddDriver(){
    $('#add_driver').openModal();
}

function AddDriverByretailer(){
    $('#add_driver_retailer').openModal();
}


function AddDriverDb(){

    var driver_name = $('#driver_name').val();
    var driver_email = $('#driver_email').val();
    var driver_password = $('#driver_password').val();





    $.ajax({
        url: "/admin/add_driver",
        type: "POST",
        data: {
            'name':driver_name,
            'email':driver_email,
            'password':driver_password

        },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        // processData: false,
        // contentType: false,
        success: function (data) {

            if (data.status == true) {

                swal({title: "Success", text: "Driver added successfully", type: "success"},
                    function(){
                        window.location.reload();
                    }
                );
                // showDlg('Success', 'Driver added successfuly', false, function (dt) {
                //     if (dt) {
                //        window.location.reload();
                //
                //     }
                // });
            }
            // var json_obj = JSON.parse(data);
            if (data.status == false) {
                // $("#add_assessor").modal('hide');
                //  alert('hii');
                // window.location.reload();
                showDlg('Error', data.message, false, function (dt) {

                     window.location.reload();


                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {
                // alert('Internal error: ' + jqXHR.responseText);
                console.log(jqXHR.responseText);
            } else {
                alert('Unexpected error.');
            }
        }
    });

}

function AddDriverByretailerDb(){

    var driver_name = $('#driver_name_r').val();
    var driver_email = $('#driver_email_r').val();
    var driver_password = $('#driver_password_r').val();





    $.ajax({
        url: "/retailer/add_driver_by_reatiler",
        type: "POST",
        data: {
            'name':driver_name,
            'email':driver_email,
            'password':driver_password

        },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        // processData: false,
        // contentType: false,
        success: function (data) {

            if (data.status == true) {

                swal({title: "Success", text: "Driver added successfully", type: "success"},
                    function(){
                        window.location.reload();
                    }
                );




                // showDlg('Success', 'Driver added successfuly', false, function (dt) {
                //     if (dt) {
                //        window.location.reload();
                //
                //     }
                // });
            }
            // var json_obj = JSON.parse(data);
            if (data.status == false) {
                // $("#add_assessor").modal('hide');
                //  alert('hii');
                // window.location.reload();
                showDlg('Error', data.message, false, function (dt) {

                    //  window.location.reload();


                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {
                // alert('Internal error: ' + jqXHR.responseText);
                console.log(jqXHR.responseText);
            } else {
                alert('Unexpected error.');
            }
        }
    });
}

function  RemoveDriver(driver_id) {

    $.ajax({
        url: "/admin/remove_driver",
        type: "POST",
        data: {
            'driver_id':driver_id

        },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        // processData: false,
        // contentType: false,
        success: function (data) {

            if (data.status == true) {

                swal({title: "Success", text: "Driver deleted successfully", type: "success"},
                    function(){
                        window.location.reload();
                    }
                );





                // showDlg('Success', 'Driver deleted successfuly', false, function (dt) {
                //     if (dt) {
                //         window.location.reload();
                //
                //     }
                // });
            }
            // var json_obj = JSON.parse(data);
            if (data.status == false) {
                // $("#add_assessor").modal('hide');
                //  alert('hii');
                // window.location.reload();
                showDlg('Error', data.message, false, function (dt) {

                     window.location.reload();


                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {
                // alert('Internal error: ' + jqXHR.responseText);
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.responseText);
            }
        }
    });

}


function RemoveDriverByRetailer(driver_id){


    $.ajax({
        url: "/retailer/remove_driver_by_retailer",
        type: "POST",
        data: {
            'driver_id':driver_id

        },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        // processData: false,
        // contentType: false,
        success: function (data) {
            console.log(data);

            if (data.status == true) {


                swal({title: "Success", text: "Driver added successfully", type: "success"},
                    function(){
                        window.location.reload();
                    }
                );



                // showDlg('Success', 'Driver deleted successfuly', false, function (dt) {
                //     if (dt) {
                //         window.location.reload();
                //
                //     }
                // });
            }
            // var json_obj = JSON.parse(data);
            if (data.status == false) {
                // $("#add_assessor").modal('hide');
                //  alert('hii');
                // window.location.reload();
                showDlg('Error', data.message, false, function (dt) {

                    window.location.reload();


                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {
                // alert('Internal error: ' + jqXHR.responseText);
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.responseText);
            }
        }
    });

}

function editProduct(product_id){


    var id=product_id;


    $.ajax({

        url: "/retailer/edit_product",
        type: "POST",
        data: {'id':id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json', cache: false,


        success: function (data) {
// console.log(data);

            if (data.status == true) {




               var  result=data.result;

              var   name=result[0]['name'];
                var product_id =result[0]['id'];
              var  price=result[0]['price'];
               var license_no=result[0]['license_no'];
               var category_id=result[0]['category_id'];
              var  address=result[0]['address'];
               var quantity=result[0]['quantity'];
              var  details=result[0]['details'];
              var  image_url=result[0]['image'];

                $('#edit_product').openModal('show');


                $('#product_id').val(product_id);
                $('#edit_product_name').val(name);
                $('#edit_product_license').val(license_no);
                $('#edit_product_price').val(price);
                $('#edit_product_address').val(address);
                $('#edit_product_qunatity').val(quantity);
                $('#edit_product_details').val(details);

                //this is the way to selected materialise select box
                $('#edit_category_select').find('option[value='+ category_id +']').prop('selected', true);
                $("#edit_category_select").material_select();

                $('#edit_regi_image').attr("src",image_url);
                $('#update_btn').attr('onclick','update_product_db('+id+')');



            }

            if (data.status == false) {



                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.reload();
                    }
                );



                // showDlg('Error', data.message, false, function (dt) {
                //
                //     if (dt) {
                //
                //         window.location.reload();
                //
                //     }
                //
                // });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {

                console.log(jqXHR.responseText);
            } else {
                alert('Unexpected error.');
            }
        }
    });

}

function update_product_db(id){




    var values = new FormData(document.forms.namedItem('edit_product'));




    if(  (values.get('e_name')=="") || (values.get('e_price')=="") || (values.get('e_details')=="") || (values.get('e_license')=="") || (values.get('e_address')=="") || (values.get('e_quantity')=="") ||  (values.get('e_category_sel')=="") ){

        showDlg('Success', 'Please fill all entries');
        return;

    }




    $.ajax({

        url: "/retailer/update_product",
        type: "POST",
        data:values,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        cache: false,
        processData: false,
        contentType:false,

        success: function (data) {

            if (data.status == true) {

                swal({title: "Success", text: "Product updated successfully", type: "success"},
                    function(){
                        window.location.reload();
                    }
                );





                // showDlg('Success', 'Product updated successfuly', false, function (dt) {
                //     if (dt) {
                //         window.location.reload();
                //
                //     }
                // });
            }

            if (data.status == false) {

                showDlg('success', data.message, false, function (dt) {

                    window.location.reload();

                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {

                console.log(jqXHR.responseText);
            } else {
                alert('Unexpected error.');
            }
        }
    });

}

function deleteProduct(product_id){
    var id=product_id;


    $.ajax({

        url: "/retailer/delete_product",
        type: "POST",
        data:{'id':id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        cache: false,


        success: function (data) {
            console.log(data);

            if (data.status == true) {

                swal({title: "Success", text: "Product deleted successfully", type: "success"},
                    function(){
                        window.location.reload();
                    }
                );




                // showDlg('Success', 'Product Deleted successfuly', false, function (dt) {
                //     if (dt) {
                //         window.location.reload();
                //
                //     }
                // });
            }

            if (data.status == false) {

                showDlg('success', data.message, false, function (dt) {
                    if(dt){
                        window.location.reload();
                    }

                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {

                console.log(jqXHR.responseText);
            } else {
                alert('Unexpected error.');
            }
        }
    });
}

function AddProduct(){
    $('#add_product').openModal();
}

function AddProductDb(){

    var values = new FormData(document.forms.namedItem('add_product'));
    var img=$("#image").val();


    var img=$("#image").val();
    // alert(img);
    // var license=$("#product_license").val();
    // var price=$("#product_price").val();
    // var address=$("#product_address").val();
    // var details=$("#product_details").val();
    // var category_sel=$("#category_sel").val();
    // var quantity=$("#product_qunatity").val();
    // alert(category_sel);

    if((img=="") ||  (values.get('name')=="") || (values.get('license')=="") || (values.get('price')=="") || (values.get('address')=="")  || (values.get('quantity')=="")  || (values.get('details')=="") || (values.get('category_sel')=="")){

        showDlg('Success', 'Please fill all entries');
        return;

    }

    $.ajax({
        url: "/retailer/insert_products_by_retailers",
        type: "POST",
        data: values,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json', cache : false,
        processData: false,
        contentType:false,

        success: function (data) {
            // console.log();

            if (data.status == true) {

                swal({title: "Success", text: "Product added successfully", type: "success"},
                    function(){
                        window.location.reload();
                    }
                );




                // showDlg('Success', 'Item added successfuly', false, function (dt) {
                //
                //     if(dt){
                //         window.location.reload();
                //     }
                //
                //
                // });
            }

            if (data.status == false) {

                showDlg('success', data.message, false, function (dt) {

                    if(dt){
                        window.location.reload();
                    }




                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {

                console.log(jqXHR.responseText);
            } else {
                alert('Unexpected error.');
            }
        }
    });

}

function ChangeProductStatus(id,status){

    $.ajax({
        url: "/retailer/ChangeProductStatus",
        type: "GET",
        data: {

            id:id,
            status:status,
        },
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',

        success: function (data) {
            console.log(data);
            // $('#edit_subcategory').modal('hide');
            if(data.status==true){

                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.reload();
                    }
                );




                // showDlg('Success!',data.message,false,function (dt) {
                //     if(dt){
                //
                //         window.location.reload();
                //     }
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    if(dt){

                        window.location.reload();
                    }
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log((jqXHR.responseText));
                // alert(JSON.stringify(jqXHR));
            }
        }
    });

}

function ChangeProductAdvertisingStatus(id,is_retailer_advertising){

       $.ajax({
        url: "/retailer/ChangeProductAdvertisingStatus",
        type: "GET",
        data: {

            id:id,
            status:is_retailer_advertising,
        },
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',

        success: function (data) {
            console.log(data);
            // $('#edit_subcategory').modal('hide');
            if(data.status==true){


                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.reload();
                    }
                );

                // showDlg('Success!',data.message,false,function (dt) {
                //     if(dt){
                //
                //         window.location.reload();
                //     }
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    if(dt){

                        window.location.reload();
                    }
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log((jqXHR.responseText));
                // alert(JSON.stringify(jqXHR));
            }
        }
    });

}

function addCharges(){
    $('#add_charges').openModal();

}

function AddChargesDb(){
    var fee_charges = $('#fee_charge').val();
   var delivery_charges = $('#delivery_charges').val();

   if(fee_charge == '' && delivery_charges){

       showDlg('Success', 'Please fill all entries');
       return;
   }


    $.ajax({
        url: "/admin/AddCharges",
        type: "GET",
        data: {

            fee_charges:fee_charges,
            delivery_charges:delivery_charges,
        },
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',

        success: function (data) {
            console.log(data);
            // $('#edit_subcategory').modal('hide');
            if(data.status==true){


                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.reload();
                    }
                );

                // showDlg('Success!',data.message,false,function (dt) {
                //     if(dt){
                //
                //         window.location.reload();
                //     }
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    if(dt){

                        window.location.reload();
                    }
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log((jqXHR.responseText));
                // alert(JSON.stringify(jqXHR));
            }
        }
    });

}

function editCharges(id,delivery_charges,fee_charges){

    $('#edit_fee_charges').val(fee_charges);//inset value to the form
    $('#edit_delivery_charges').val(delivery_charges);//inset value to the form
    $('#edit_btn').attr('onclick','EditChargesDb('+id+')');
    $('#edit_charges').openModal();

}

function EditChargesDb(id){



    var fee_charges=$('#edit_fee_charges').val();
    var delivery_charges=$('#edit_delivery_charges').val();
    console.log(id);
    console.log(fee_charges);
    console.log(fee_charges);


    if(fee_charges=='' && delivery_charges==''){
        showDlg('Alert','Cannot add a blank field.');
        return;
    }
    $.ajax({
        url: "/admin/edit_charges",
        type: "POST",
        data: {
            id:id,
            fee_charges:fee_charges,
            delivery_charges:delivery_charges
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',

        success: function (data) {
            if(data.status==true){

                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.reload();
                    }
                );




                // showDlg('Success!',data.message,false,function (dt) {
                //     if(dt){
                //
                //         window.location.reload();
                //     }
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    if(dt){

                        window.location.reload();
                    }
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log(JSON.stringify(jqXHR));
                alert(JSON.stringify(jqXHR));
            }
        }
    });

}



function AssignDriverByRetailer(order_id){


   var driver_id = $("#driver_sel").val();
   alert(driver_id);


    $.ajax({
        url: "/retailer/assign_driver_by_retailer",
        type: "POST",
        data: {
            driver_id:driver_id,
            order_id:order_id
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',

        success: function (data) {
            if(data.status==true){

                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.href = '/retailer/pending_orders';
                    }
                );

                // showDlg('Success!',data.message,false,function (dt) {
                //     if(dt){
                //
                //        loadOrders(1);
                //     }
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    if(dt){

                        window.location.reload();
                    }
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log(JSON.stringify(jqXHR));
                alert(JSON.stringify(jqXHR));
            }
        }
    });

}


function changeOrderStatus(order_id) {

    var status = $("#order_status").val();

    // alert(status);
    if(status==4){
        // alert('hi');
        // return;
        CompleteOrder(order_id);
        return;
    }

    if(status==5){
        // alert('hi');
        CancelOrder(order_id);
        return;
    }




    $.ajax({

        url:"/retailer/change_order_status",
        type:"POST",
        data:{order_id:order_id,status:status},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        success: function (data) {
            if(data.status==true){

                swal("Good job!", "Order status has been successfully updated!", "success");

                // swal({title: "Success", text: "Order status has been updated", type: "success"},
                //     function(){
                //         location.reload();
                //     }
                // );


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    if(dt){

                        window.location.reload();
                    }
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log(JSON.stringify(jqXHR));
                alert(JSON.stringify(jqXHR));
            }
        }


    });

}

function CompleteOrder(order_id){


    $.ajax({

        url:"/retailer/complete_orders",
        type:"POST",
        data:{order_id:order_id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        success: function (data) {
            if(data.status==true){


                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.reload();
                    }
                );

                // showDlg('Success!',data.message,false,function (dt) {
                //     if(dt){
                //
                //        window.location.reload();
                //     }
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    if(dt){

                        window.location.reload();
                    }
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log(JSON.stringify(jqXHR));
                alert(JSON.stringify(jqXHR));
            }
        }


    });


}


function CancelOrder(order_id){


    $.ajax({

        url:"/retailer/cancel_orders",
        type:"POST",
        data:{order_id:order_id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        success: function (data) {
            if(data.status==true){


                swal({title: "Success", text: data.message, type: "success"},
                    function(){
                        window.location.reload();
                    }
                );


                // showDlg('Success!',data.message,false,function (dt) {
                //     if(dt){
                //
                //         window.location.reload();
                //     }
                // });


            }else{

                showDlg('Error!',data.message,false,function (dt) {
                    if(dt){

                        window.location.reload();
                    }
                });

            }




        },
        error: function (jqXHR, textStatus, errorThrown) {
            {
                console.log(JSON.stringify(jqXHR));
                alert(JSON.stringify(jqXHR));
            }
        }


    });

}

function PendingOrderdetails(){



}

function getdate(type){


    var date=$("#Orderdate").val();
    loadOrders(type,date);
}



