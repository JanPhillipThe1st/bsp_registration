<?php
session_start();
if (isset($_SESSION["username"])) {
            if (!isset($_SESSION["school_year"])) {
                header("location: ./screens/select_school_year.php");
            }else{
            }
    }
    else{
    
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920, initial-scale=1.0">
    <title>BSP Registration System</title>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/chart.js/chart.js">
    <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/x-icon" href="../assets/img/BSPLogo.png">
</head>
<style>
    *{
        font-family: Poppins;
    }
</style>
<body>
    <nav class="p-2">
        <div class="row">
            <div class="col-1">
            <img src="../assets/img/BSPLogo.png" class="m-auto" alt="" srcset="" height="100px">
            </div>
            <div class="col-10">
                <div class="row">
                    <h4 class="text-center text-white my-2">ZAMBOANGA DEL SUR BOY SCOUT OF THE PHILIPPINES<br/>REGISTRATION & MONITORING SYSTEM</h4>
                    <h6 class="text-center my-2" style="color: yellow; font-weight:300;"><i>"A good turn will educate the scout out of the groove of selfishness"</i></h6>
                </div>
            </div>
            <div class="col-1">
            <img src="../assets/img/ZDS_Logo.png" class="m-auto" alt="" srcset="" height="100px">
            </div>

        </div>
    </nav>
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-2">
            <h5>Welcome, <?= $_SESSION["full_name"]?>!</h5>
        </div>
        <div class="col-2">
            <button class="btn text-secondary" id="btn_logout">Log out</button>
        </div>
        
        <div class="col-8 ">
            <div class="center">
                <h4>School year: <?= $_SESSION["school_year_string"]?></h4>
            </div>
        </div>
    </div>
    <div class="row" style="height:75vh !important; display:flex; align-items:center; align-content:center;">
        <div class="col-2 ">
            <div class="row my-3">
            <button class="btn btn-btn-success side-button border border-success rounded" id="btn_student">
                <h4>
                    Student
                </h4>
            </button>
            </div>

            <div class="row my-3">
            <button class="btn btn-btn-success side-button border border-success rounded" id="btn_contact_us">
                <h4>
                    Contact Us
                </h4>
            </button>
            </div>

            <div class="row my-3">
            </div>
            <div class="row my-3 dropdown">
                    <button class="btn btn-btn-success side-button border border-success rounded  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About Us
                        </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="btn_bsp_officers" href="#">BSP OFFICERS</a>
                        <a class="dropdown-item"   id="btn_vision_mission" href="#">VISIONS & MISSION</a>
                        <a class="dropdown-item" id="btn_oath_law" href="#">OATH & LAW</a>
                        <a class="dropdown-item" id="btn_history" href="#">HISTORY</a>
                    </div>
            </div>
            <div class="row my-3">
            </div>  
            <div class="row my-3">
            <button class="btn btn-btn-success side-button border border-success rounded " id="btn_account_settings">
                <h4>
                    Account Settings
                </h4>
            </button>
            </div>
        </div>
        
        <div class="col-10" id="content">
        <img src="../assets/img/BSPLogo.png" class="m-auto" alt="" srcset="" height="400px">
        </div>
    </div>
</div>
</body>

<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message From System:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 id="modalMessage">Your image has been successfully uploaded!</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade " id="accountSettingsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success">MY  ACCOUNT 
                        </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Photo column -->
                        <div class="col-2">
                            <div class="row my-4">
                                <img src="../assets/img/BSPLogo.png" class="bg-secondary" alt="Student Photo Thumbnail" id="user_photo_preview" >
                                <form action="screens/upload_student_photo.php" method="post" enctype="multipart/form-data" >    
                                    <div class="form-group">
                                        <label for="user_photo">Select Photo</label>
                                        <input type="hidden" name="user_photo_name" id="user_photo_name">
                                        <input type="file" class="form-control-file" name="user_photo" id="user_photo" placeholder="Select Photo" aria-describedby="fileHelpId">
                                        <button type="submit" name="submit" class="form-control">Change Photo</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="row">
                                <h4>Student ID:</h4>
                            </div>
                            <div class="row p-1 rounded border border-secondary text-center">
                                <h5 id="student_id">000-0001</h5>
                            </div>
                        </div>
                        <!-- Spacing -->
                        <div class="col-1"></div>
                        <!-- Information Column -->
                        <div class="col-9">
                            <div class="row">
                                <div class="col-3">
                                    <div class="row">
                                        <h5>Full Name:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="First name" id="current_user_first_name">
                                    </div>
                                    <div class="row">
                                        <h5>Address:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Street / Barangay" id="current_user_barangay">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Middle name" id="current_user_middle_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Municipality / City" id="current_user_city">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Last name" id="current_user_last_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Province" id="current_user_province" >
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                <div class="row">
                                    <h5>Contact:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="email" class="form-control" placeholder="Email" id="current_user_email">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="number" class="form-control" placeholder="Phone" id="current_user_phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">
                                <div class="row pt-5">
                                        <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Guardian:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Guardian's Phone #:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Permanent Address:</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row pt-5">
                                        <h5>In case of emergency:</h5>
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian name here..." id="current_user_emergency_guardian">
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian phone here..." id="current_user_emergency_guardian_phone">
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian address here..." id="current_user_emergency_guardian_address">
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                    <div class="row pt-5  w-100">
                                        <h5>Grade:</h5>
                                    </div>
                                    <div class="row  w-100">
                                        <select class="form-control" id="current_user_grade">
                                            <option value="1">Grade 1</option>
                                            <option value="2">Grade 2</option>
                                            <option value="3">Grade 3</option>
                                            <option value="4">Grade 4</option>
                                            <option value="5">Grade 5</option>
                                            <option value="6">Grade 6</option>
                                        </select>
                                    </div>
                                    <div class="row  w-100"  >
                                        <h5>Section:</h5>
                                    </div>
                                    <div class="row w-100">
                                        <input type="text" class="form-control" placeholder="Enter section here..." id="current_user_section">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_current_user" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/jquery-3.6.1.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(()=>{
        var content = $("#content");
        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);
        const page = urlParams.get('page');
        if (page != undefined){
            switch (page) {
                case 'students': 
                        content.load("screens/students.php");
                        const message = urlParams.get('message');
                        const filename = urlParams.get('filename'); 
                            if (message != undefined){
                                $("#modalMessage").text(message);
                                $("#messageModal").modal("toggle");
                            }                       
                    break;
            
                default:
                    break;
            }
        }
        else{
            content.load("screens/students.php");
        }

        $("#btn_contact_us").click(()=>{
            content.load("screens/contact_us.php");
        });

        
        $("#btn_account_settings").click(()=>{
            //Get User Information
            $.post("../ajax.php",{action:"get_current_teacher"},(current_teacher_query_response,current_teacher_query_status)=>{
                var current_user_data = JSON.parse(current_teacher_query_response);

                //Populate data
                $("#user_photo_preview").val(current_user_data.);
                $("#current_user_first_name").val(current_user_data.);
                $("#current_user_barangay").val(current_user_data.);
                $("#current_user_middle_name").val(current_user_data.);
                $("#current_user_city").val(current_user_data.);
                $("#current_user_last_name").val(current_user_data.);
                $("#current_user_province").val(current_user_data.);
                $("#current_user_email").val(current_user_data.);
                $("#current_user_phone").val(current_user_data.);
                $("#current_user_grade").val(current_user_data.);
                $("#current_user_section").val(current_user_data.);


                $("#accountSettingsModal").modal("toggle");
            });
        });
        $("#btn_student").click(()=>{
            content.load("screens/students.php");
        });
        $("#btn_user_account").click(()=>{
            content.load("screens/user_accounts.php");
        });
        $("#btn_bsp_officers").click(()=>{
            content.load("screens/bsp_officers.php");
        });
        $("#btn_vision_mission").click(()=>{
            content.load("screens/vision_mission.php");
        });
        $("#btn_oath_law").click(()=>{
            content.load("screens/oath_law.php");
        });
        $("#btn_history").click(()=>{
            content.load("screens/history.php");
        });
        $("#btn_logout").click(()=>{
            if (window.confirm("Are you sure ypu want to log out?")) {
                $.post("../ajax.php",{action:"log_out"},(data)=>{
                    window.location = "../index.php";
                });
            }
        });
    });
</script>
</html>