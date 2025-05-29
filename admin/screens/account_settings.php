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
                        <h5 class="modal-title text-dark">MY ACCOUNT</h5>
                           
                    </div>
                <div class="container-fluid">
                    <div class="row">
                        <!-- Photo column -->
                        <div class="col-2">
                            <div class="row my-4">
                                <img src="../assets/img/BSPLogo.png" class="bg-white border shadow" alt="User Photo Thumbnail" id="user_photo_preview" >

                            </div>
                            
                        
                        </div>
                        <!-- Spacing -->
                        <div class="col-1"></div>
                        <!-- Information Column -->
                        <div class="col-9">
                            <div class="row ">
                                <p class="text-end">
                                    Date of registration:
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
                                        <p>Confirm Password:</p>
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
                                        <input type="password" class="form-control" placeholder="Enter password..." id="user_password" disabled>
                                    </div>
                                    <div class="row py-3">
                                        <input type="password" class="form-control" placeholder="Confirm password..." id="user_confirm_password" disabled>
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
       //Get user data
       $.post("../ajax.php",{action:"get_current_user"},(user_data_response,request_status)=>{
        var user = JSON.parse(user_data_response);
        $("#user_first_name").val(user.account_first_name);
        $("#user_middle_name").val(user.account_middle_name);
        $("#user_last_name").val(user.account_last_name);
        $("#user_barangay").val(user.account_barangay);
        $("#user_city").val(user.account_city);
        $("#user_photo_preview").attr("src","../img/users/"+user.account_photo);
        $("#user_date_of_registration").text(user.date_registered);
        $("#user_province").val(user.account_province);
        $("#user_email").val(user.account_email);
        $("#user_phone").val(user.account_phone);
        $("#user_username").val(user.username);
        $("#user_password").val(user.password);
        $("#user_confirm_password").val(user.password);
        $("#user_access_type").val(user.access_type);
        $("#user_school").val(user.schoolID);
        
       });
    });
</script>