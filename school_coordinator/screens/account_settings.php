<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: ../../index.php");
}
?>
<link rel="stylesheet" href="../assets/vendor/boxicons/css/boxicons.css">
<link rel="stylesheet" href="../assets/vendor/boxicons/css/animations.css">
<style>
    tr{
        transition: 300ms;
    }
    tr:hover{
        transition: 300ms;
        cursor: pointer;
        background-color: rgb(61, 199, 56);
        color: white;
    }
</style>
<div class="container-fluid">

    <div class="content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-q">MY ACCOUNT</h5>
                           
                    </div>
                <div class="container-fluid">
                    <div class="row">
                        <!-- Photo column -->
                        <div class="col-2">
                             <img src="../assets/img/BSPLogo.png" class="img-fluid img-thumbnail mb-2" alt="User Photo Thumbnail" id="edit_user_photo_preview" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    <div class="form-group">
                                        <label for="edit_user_photo_file_input" class="form-label">Select Photo</label>
                                        <input type="hidden" name="edit_user_photo_name" id="edit_user_photo_name">
                                        <input type="file" class="form-control form-control-sm " name="edit_user_photo" id="edit_user_photo_file_input" placeholder="Select Photo">
                                    </div>                        
                        </div>
                        <!-- Spacing -->
                        <div class="col-1"></div>
                        <!-- Information Column -->
                        <div class="col-9">
                            <div class="row ">
                                <p class="text-end">
                                    Date Registered:
                                    <strong id="user_date_of_registration">09-06-2024</strong>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="row">
                                        <h5>Full Name:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="First name" id="user_first_name" disabled>
                                    </div>
                                    <div class="row">
                                        <h5>Address:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Street / Barangay" id="user_barangay" disabled>
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Middle name" id="user_middle_name" disabled>
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Municipality / City" id="user_city" disabled>
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Last name" id="user_last_name" disabled>
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Province" id="user_province" disabled>
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                <div class="row">
                                    <h5>Contact:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="email" class="form-control" placeholder="Email" id="user_email" disabled>
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="number" class="form-control" placeholder="Phone" id="user_phone" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-5">
                                <div class="row pt-5">
                                        <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Username:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Password:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Access level:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Select School:</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row pt-5">
                                        <h5>Account information</h5>
                                    </div>
                                    <div class="row py-3">
                                        <input type="text" class="form-control" placeholder="Enter username here..." id="user_username" disabled>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-10">
                                            <input type="password" class="form-control" placeholder="Enter password..." id="user_password" disabled>
                                        </div>
                                        <div class="col-2">   
                                            <button class="btn btn-secondary" id="togglePassword">
                                                <i class="bi bi-eye-slash" ></i>
                                            </button>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="row py-3">
                                        <select class="form-control" placeholder="Confirm password..." id="user_access_type" disabled>
                                            <option value="troop_leader">Troop Leader</option>
                                            <option value="it_coordinator">IT Coordinator</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="school_coordinator">School Coordinator</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="row py-3">
                                        <select class="form-control" placeholder="School" id="user_school">
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                </div>
            </div>

        <div class="modal-footer">
            <button class="btn btn-primary" id="btn_edit_account">Edit</button>
        </div>

</div>




<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message From System:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 id="modalMessage">Your image has been successfully uploaded!</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/DataTables/datatables.min.js"></script>
<script>
     $(document).ready(()=>{
        let isEditing = false;
        let passwordShown = true;
        var userPhoto = "";
        var user = {};
        //Capture photo data
        $("#edit_user_photo_file_input").change(async ()=>{ 
            var fileInput = $("#edit_user_photo_file_input")[0];
                var file = fileInput.files[0];
                const reader = new FileReader();
                reader.readAsDataURL(file); 
                reader.onload =async function(e) {
                    userPhoto = e.target.result;
                    $("#edit_user_photo_preview").attr("src",e.target.result);
                };
        });
       
        

       //Get user data
       $.post("../ajax.php",{action:"get_current_user"},(user_data_response,request_status)=>{
        user = JSON.parse(user_data_response);
        $("#user_first_name").val(user.account_first_name);
        $("#user_middle_name").val(user.account_middle_name);
        $("#user_last_name").val(user.account_last_name);
        $("#user_barangay").val(user.account_barangay);
        $("#user_city").val(user.account_city);
        userPhoto = user.account_photo;
        $("#edit_user_photo_preview").attr("src",userPhoto);
        $("#user_date_of_registration").text(user.date_registered);
        $("#user_province").val(user.account_province);
        $("#user_email").val(user.account_email);
        $("#user_phone").val(user.account_phone);
        $("#user_username").val(user.username);
        $("#user_password").val(user.password);
        $("#user_confirm_password").val(user.password);
        $("#user_access_type").val(user.access_type);
        $("#user_school").val(user.schoolID);
        $("#edit_user_photo_file_input").hide();
        $("#togglePassword").hide();
       });
       $("#togglePassword").click(()=>{
            if(passwordShown){
                $("#user_password").attr("type","text");
                $("#togglePassword").html(`<i class="bi bi-eye text-white" ></i>`);
                passwordShown = false;
            }
            else{
                $("#user_password").attr("type","password");
                $("#togglePassword").html(`<i class="bi bi-eye-slash text-white" ></i>`);
                passwordShown = true;
            }
        });
       $("#btn_edit_account").click(()=>{
        if(!isEditing){
            $("#user_barangay").removeAttr("disabled");
            $("#user_city").removeAttr("disabled");
            $("#user_province").removeAttr("disabled");
            $("#user_phone").removeAttr("disabled");
            $("#user_username").removeAttr("disabled");
            $("#user_password").removeAttr("disabled");
            $("#edit_user_photo_file_input").show();
            $("#togglePassword").show();
            $("#btn_edit_account").text("Save");
            isEditing = true;
        }else{
            if(window.confirm("Are you sure you want to save this record?")){
                $.post("../ajax.php",{action:"update_user",   
                                            user_first_name:$("#user_first_name").val(),
                                            user_middle_name:$("#user_middle_name").val(),
                                            user_last_name:$("#user_last_name").val(),
                                            user_photo_name:userPhoto,
                                            user_barangay:$("#user_barangay").val(),
                                            user_city:$("#user_city").val(),
                                            user_province:$("#user_province").val(),
                                            user_email:$("#user_email").val(),
                                            user_phone:$("#user_phone").val(),
                                            user_username:$("#user_username").val(),
                                            user_password:$("#user_password").val(),
                                            user_confirm_password:$("#user_password").val(),
                                            user_school:$("#user_school").val(),
                                            user_access_type:"school_coordinator",
                                            user_phone:$("#user_phone").val(),                                
                                            userID:user.userID},()=>{
                    alert("Your profile has been successfully updated!");
                    window.location.reload();
                    $("#user_barangay").attr("disabled","true");
                    $("#user_city").attr("disabled","true");
                    $("#user_province").attr("disabled","true");
                    $("#user_phone").attr("disabled","true");
                    $("#user_username").attr("disabled","true");
                    $("#user_password").attr("disabled","true");
                    $("#edit_user_photo_file_input").hide();
                    $("#btn_edit_account").text("Edit");
                    $("#togglePassword").hide();
                    isEditing = false;
                });
            }
            

        }

       });
    });
</script>