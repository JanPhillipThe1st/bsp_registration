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
            <h3>Welcome, <?= $_SESSION["full_name"]?>!</h3>
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
            <button class="btn btn-btn-success side-button border border-success rounded " id="district">
                <h4>
                    District
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
            <button class="btn btn-btn-success side-button border border-success rounded" id="btn_user_account">
                <h4>
                    User Account
                </h4>
            </button>
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
                case 'users': 
                        content.load("screens/user_accounts.php");
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
        $("#district").click(()=>{
            content.load("screens/district.php");
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
        $("#btn_contact_us").click(()=>{
            content.load("screens/contact_us.php");
        });
        $("#btn_account_settings").click(()=>{
            content.load("screens/account_settings.php");
        });
        $("#btn_logout").click(()=>{
            if (window.confirm("Are you sure you want to log out?")) {
                $.post("../ajax.php",{action:"log_out"},(data)=>{
                    window.location = "../index.php";
                });
            }
        });
    });
</script>
</html>