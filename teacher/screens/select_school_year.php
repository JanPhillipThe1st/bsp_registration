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
    <nav class="p-2">
        <div class="row">
            <div class="col-1">
            <img src="../../assets/img/BSPLogo.png" class="m-auto" alt="" srcset="" height="100px">
            </div>
            <div class="col-10">
                <div class="row">
                    <h4 class="text-center text-white my-2">ZAMBOANGA DEL SUR BOY SCOUT OF THE PHILIPPINES<br/>REGISTRATION & MONITORING SYSTEM</h4>
                    <h6 class="text-center my-2" style="color: yellow; font-weight:300;"><i>"A good turn will educate the scout out of the groove of selfishness"</i></h6>
                </div>
            </div>
            <div class="col-1">
            <img src="../../assets/img/ZDS_Logo.png" class="m-auto" alt="" srcset="" height="100px">
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
<div class="container-fluid">
    <div class="container-fluid border rounded border-success m-auto w-50 my-5 p-3 shadow">
        <h2 class="">Select school year</h2>
        <div class="form-group">
          <label for="select_school_year">School year:</label>
          <select name="select_school_year" id="select_school_year" class="form-control">
          </select>

        <div class="row my-2">
          <div class="col-8"></div>
          <div class="col-4">
              <button class="btn btn-success w-100" id="btn_select_school_year">Select</button>
          </div>
        </div>
          </div>
    </div>
</div>  


<!-- Modal -->
<div class="modal fade" id="selected_school_year_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" >Item Selected</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h4>You have selected:</h4>
                    <h3 id="selected_school_year_modal_text"></h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirm_school_year">Proceed</button>
            </div>
        </div>
    </div>
</div>


</body>
<script src="../../assets/js/jquery-3.6.1.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(()=>{
        $.post("../../ajax.php",{action:"get_school_years"},(response, status)=>{
            var data = JSON.parse(response);
            $("#select_school_year").empty();
            data.forEach((school_year,school_year_index)=>{
                $("#select_school_year").append(
                    $("<option value="+school_year.ID+">"+school_year.school_year_start+" - "+ school_year.school_year_end +" ("+school_year.semester + (parseInt(school_year.semester)==1 ?"st":parseInt(school_year.semester)==2?"nd":parseInt(school_year.semester)==3?"rd":"th").toString()+" semester)</option>")
                );
            });
            $("#btn_select_school_year").on("click",(e)=>{
                $("#selected_school_year_modal_text").text($("#select_school_year option:selected").text());
                $("#selected_school_year_modal").modal("toggle");
                $("#confirm_school_year").on("click",()=>{
                    $.post("../../ajax.php",{action:"confirm_school_year",school_year_id: $("#select_school_year").val(),school_year_string:$("#select_school_year option:selected").text()},(proceed_response,proceed_status)=>{
                       window.location = "../index.php";
                    });
                });
            });
        });
        $("#btn_logout").click(()=>{
            if (window.confirm("Are you sure ypu want to log out?")) {
                $.post("../../ajax.php",{action:"log_out"},(data)=>{
                    window.location = "../../index.php";
                });
            }
        });
    });
</script>
</html>