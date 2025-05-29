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
        <h2 class="text-center">OATH & LAW</h2>
        <div class="row ">
                <div class="col-1">
                </div>
                <div class="col-5 mx-3 ">
                    <div class="row w-50 m-auto py-2 text-center ">
                        <h1>OATH</h1>
                    </div>
                    <div class="row  m-auto template-card py-5  text-center text-success" >
                        <h4  >
                        ON MY HONOR I WILL DO MY BEST TO DO<br/>MY DUTY TO GOD AND MY COUNTRY AND TO <br/> OBEY THE SCOUT LAW;
                         TO KEEP MY SELF<br/>PHYSICALLY STRONG, MENTALLY AWAKE,<br/>AND MORALLY STRAIGHT.
                        </h4>
                    </div>
                </div>
                <div class="col-5 mx-3 ">
                    <div class="row w-50 m-auto py-2 text-center">
                    <h1>LAW</h1>
                    </div>
                    <div class="row  m-auto template-card py-5 text-center text-success" >
                        <h3 >
                        MAPAGKAKA-TIWALAAN, MATAPAT,<br/> MATULUNGIN, MAPAGKAIBIGAN, MAGALANG,<br/> MABAIT,  MASUNURIN, MASAYA, MATIPID,<br/> MATAPANG, MALINIS, MAKA-DIYOS.
                        </h3>
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