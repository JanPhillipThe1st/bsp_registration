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
 
    <div class="container-fluid m-auto w-100 my-5 p-3 shadow" style="overflow:hidden !important;background-color:#fafafa !important;">
        <h2 class="text-center">ORGANIZATIONAL CHART 2022-2023</h2>
        <div class="row ">
                <div class="col-3">
                </div>
                <div class="col-3 mx-3 template-card">
                    <div class="row w-50 m-auto">
                        <img src="../assets/img/oic.jpg" id="oic_photo" height="180px" width="100px" alt="BSP OIC photo" >
                        <input type="file" class="btn btn-transparent btn_change_photo" id="change_council_scout1_photo" title="Change photo">
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5 class="title" id="oic_name">MANNY C. ELLUNADO</h5>
                        <p><i>Council Scout  Executive/ OIC</i></p>
                        <input type="text" class="title-input" id="council_scout1">
                    </div>
                </div>
                <div class="col-3 mx-3 template-card">
                    <div class="row w-50 m-auto">
                        <img src="../assets/img/it_officer_photo.jpg" height="180px" width="100px" alt="IT Officer photo" >
                        <button class="btn btn-transparent btn_change_photo" id="change_it_officer_photo">Change photo</button>
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5 class="title" id="it_officer_name">ALEXE V. BELOY</h5>
                        <p><i>IT/Liason Officer </i></p>
                        <input type="text" class="title-input" id="it_officer">
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
                        <button class="btn btn-transparent btn_change_photo" id="change_staff_manager_photo">Change photo</button>
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5 class="title" id="staff_manager_name">INN B. ELLUNADO</h5>
                        <input type="text" class="title-input" id="staff_manager">
                        <p><i>Staff Manager</i></p>
                    </div>
                </div>
                <div class="col-3 mx-2 template-card">
                    <div class="row w-50 m-auto">
                        <img src="../assets/img/support_staff.jpg" height="180px" width="100px" alt="Support Staff 1" >
                        <button class="btn btn-transparent btn_change_photo" id="change_support_staff1_photo">Change photo</button>
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5 class="title" id="support_staff_1_name">SANIBOY D. CAIPILAN</h5>
                        <input type="text" class="title-input" id="support_staff1">
                        <p><i>Support Staff</i></p>
                    </div>
                </div>
                <div class="col-3 mx-2 template-card">
                    <div class="row w-50 m-auto">
                        <img src="../assets/img/support_staff_2.jpg" height="180px" width="100px" alt="Support Staff 2" >
                        <button class="btn btn-transparent btn_change_photo" id="change_support_staff2_photo">Change photo</button>
                    </div>
                    <div class="row  m-auto tag-text">
                        <h5 class="title" id="support_staff_2_name">RUEL N. PENAZO</h5>
                        <input type="text" class="title-input" id="support_staff2">
                        <p><i>Support Staff</i></p>
                    </div>
                </div>
                <div class="col-1">
                </div>
            </div>
            <div class="row mx-auto my-3">
                <div class="col-4 d-flex"><button class="btn-primary btn mx-auto px-4 editing_button" id="btn_save">Save</button></div>
                <div class="col-4 d-flex"><button class="btn-primary btn mx-auto px-4" id="btn_edit">Edit</button></div>
                <div class="col-4 d-flex"><button class="btn-primary btn mx-auto px-4 editing_button" id="btn_cancel">Cancel</button></div>
            </div>
        </div>

        
    </div>

</body>
<script src="../../assets/js/jquery-3.6.1.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(()=>{
        let bsp_officers_setting,settingID;
        //hide the editing buttons first
        $(".editing_button").hide();
        //hide the title inputs as well
        $(".title-input").hide();
        //... You're not gonna believe this...
        $(".btn_change_photo").hide();
        //styling the title input class manually because it's more efficient and cleaner
        $(".title-input").addClass("form-control");
        $(".title-input").addClass("p-1");
        $.post("../ajax.php",{action:"get_officers"},(response)=>{
            let data = JSON.parse(response);
            settingID = JSON.parse(data.find((setting)=> setting.setting_value.includes("bsp_officers")).ID);
            bsp_officers_setting = JSON.parse(data.find((setting)=> setting.setting_value.includes("bsp_officers")).setting_value).bsp_officers;
            //Just set the fields first!
            $("#oic_name").text(bsp_officers_setting.oic);
            $("#it_officer_name").text(bsp_officers_setting.it_officer);
            $("#staff_manager_name").text(bsp_officers_setting.staff_manager);
            $("#support_staff_1_name").text(bsp_officers_setting.support_staff_1);
            $("#support_staff_2_name").text(bsp_officers_setting.support_staff_2);

        });
        $("#btn_save").click(()=>{
           bsp_officers_setting.oic = $("#council_scout1").val();
           bsp_officers_setting.it_officer = $("#it_officer").val();
           bsp_officers_setting.staff_manager = $("#staff_manager").val();
           bsp_officers_setting.support_staff_1 = $("#support_staff1").val();
           bsp_officers_setting.support_staff_2 = $("#support_staff2").val();
           if (window.confirm("Are you sure you want to save this data?")) {
               $.post("../ajax.php",{action:"setting",settingID:settingID,data:JSON.stringify({"bsp_officers":bsp_officers_setting})});
           }
           //[{"ID":"2","setting_value":"{\"bsp_officers\":{\n\"oic\":\"MANNY C. ELLUNADO\",\n\"it_officer\":\"ALEXE V. BELOY\",\n\"staff_manager\":\"INN  B. ELLUNADO\",\n\"support_staff1\":\"SANIBOY D. CAIPILAN\",\n\"support_staff2\":\"RUEL  N.  PENAZO\"\n}\n}"}]

        });

          $("#change_council_scout1_photo").change(async ()=>{ 
            var fileInput = $("#change_council_scout1_photo")[0];
                var file = fileInput.files[0];
                const reader = new FileReader();
                reader.readAsDataURL(file); 
                reader.onload =async function(e) {
                    userPhoto = e.target.result;
                    $("#oic_photo").attr("src",e.target.result);
                };
        });

        $("#btn_edit").click(()=>{
            //show the save and cancel buttons
            $(".editing_button").show();
            $(".title-input").show();
            $(".btn_change_photo").show();
            $("#btn_edit").hide();
            $(".title").hide();
        });
    });
</script>
</html>