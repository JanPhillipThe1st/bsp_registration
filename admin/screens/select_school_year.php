<?php
session_start();
if (!isset($_SESSION["username"])) {
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
        
        <div class="col-8">
        </div>
    </div>
 
</div>
</body>
<script src="../assets/js/jquery-3.6.1.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(()=>{
        var content = $("#content");
        content.load("screens/school_years.php");
        $("#btn_school_years").click(()=>{
            content.load("screens/school_years.php");
        });
        $("#district").click(()=>{
            content.load("screens/district.php");
        });
        $("#btn_user_account").click(()=>{
            content.load("screens/user_accounts.php");
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