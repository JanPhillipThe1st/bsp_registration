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
        <div class="row ">
                <div class="col-1">
                </div>
                <div class="col-10 mx-3 ">
                    <div class="row w-50 m-auto py-2 text-center ">
                        <h1>HISTORY</h1>
                    </div>
                    <div class="row  m-auto template-card py-5  text-center text-success" >
                        <h3  >
                        The Boy  Scout  of the Philippines was legally establish in 1936 in Manila trough the work of  three Men :  Josephus Emile Hamilton  Stevenot (1888-1943) ,  Tomas  Confesor  y  Valenzuela (1891-1951) , and  Manuel Luis  Quezon  y  Molina  (1878-1944) , and the organization  started activities in 1938.  
                        <br/>
                        <br/>
                        In Zamboanga  del  Sur ,   Lt. Kiser observe the same  aimless  behavior  of  boys  and decide to push their   plan  of  forming  Boy  Scout  Troops. And so, the first   Filipino  troop  consisting  of 26  Boys  was  formed  on November  15,  1914.
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