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
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/vendor/chart.js/chart.js">
    <link rel="stylesheet" href="../style.css">
  <link rel="icon" type="image/x-icon" href="../../assets/img/BSPLogo.png">
</head>
<style>
    *{
        font-family: Poppins;
    }
</style>
<body>
 
    <div class="container-fluid border rounded border-success m-auto w-100 my-5 p-3 shadow" style="overflow:hidden !important;background-color:#fafafa !important;">
        <h2 class="text-center">ORGANIZATIONAL CHART 2022-2023</h2>
        <div class="row ">
                <div class="col-3">
                </div>
                <div class="col-3 mx-3 template-card">
                    <div class="row w-50 m-auto">
                        <img src="../assets/img/oic.jpg" height="180px" width="100px" alt="BSP OIC photo" >
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5>MANNY C. ELLUNADO</h5>
                        <p><i>Council Scout  Executive/ OIC</i></p>
                    </div>
                </div>
                <div class="col-3 mx-3 template-card">
                    <div class="row w-50 m-auto">
                        <img src="../assets/img/it_officer_photo.jpg" height="180px" width="100px" alt="IT Officer photo" >
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5>ALEXE V. BELOY</h5>
                        <p><i>Council Scout  Executive/ OIC</i></p>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
        <div class="row mt-4">
                <div class="col-1">
                </div>
                <div class="col-3 mx-2 template-card">
                    <div class="row w-50 m-auto">
                        <img src="../assets/img/staff_manager.jpg" height="180px" width="100px" alt="Staff Manager photo" >
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5>INN B. ELLUNADO</h5>
                        <p><i>Staff Manager</i></p>
                    </div>
                </div>
                <div class="col-3 mx-2 template-card">
                    <div class="row w-50 m-auto">
                        <img src="../assets/img/support_staff.jpg" height="180px" width="100px" alt="Support Staff 1" >
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5>SANIBOY D. CAIPILAN</h5>
                        <p><i>Support Staff</i></p>
                    </div>
                </div>
                <div class="col-3 mx-2 template-card">
                    <div class="row w-50 m-auto">
                        <img src="../assets/img/support_staff_2.jpg" height="180px" width="100px" alt="Support Staff 2" >
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5>RUEL N. PENAZO</h5>
                        <p><i>Support Staff</i></p>
                    </div>
                </div>
                <div class="col-1">
                </div>
            </div>
        </div>

        
    </div>

</body>
<script src="../../assets/js/jquery-3.6.1.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(()=>{
     
    });
</script>
</html>