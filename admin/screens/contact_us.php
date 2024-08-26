<input?php
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
        <div class="row">
        <h2 class="text-center">Contact Us</h2>
        <div class="row d-flex align-items-center m-auto">
            <div class="col-3 mx-1 contact-us-card">
                <div class="row">
                    <button class="btn rounded contact_us_button py-1 m-auto my-4 w-75">
                       VISIT US
                    </button>
                </div>
                <div class="row">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24" style="fill: rgba(85, 189, 85, 1);transform: ;msFilter:;"><path d="M5 22h14a2 2 0 0 0 2-2v-9a1 1 0 0 0-.29-.71l-8-8a1 1 0 0 0-1.41 0l-8 8A1 1 0 0 0 3 11v9a2 2 0 0 0 2 2zm5-2v-5h4v5zm-5-8.59 7-7 7 7V20h-3v-5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v5H5z"></path></svg>
                </div>
                <div class="row">
                    <textarea class="my-4 text-center" id="edit_address" readonly>Sto. Niño, Pagadian City, Zamboanga del Sur</textarea>
                </div>
            </div>
            <div class="col-3 mx-1 contact-us-card">
                <div class="row">
                    <button class="btn rounded contact_us_button py-1 m-auto my-4 w-75">
                        CALL US
                    </button>
                    <div class="row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24" style="fill: rgba(85, 189, 85, 1);transform: ;msFilter:;"><path d="M17.707 12.293a.999.999 0 0 0-1.414 0l-1.594 1.594c-.739-.22-2.118-.72-2.992-1.594s-1.374-2.253-1.594-2.992l1.594-1.594a.999.999 0 0 0 0-1.414l-4-4a.999.999 0 0 0-1.414 0L3.581 5.005c-.38.38-.594.902-.586 1.435.023 1.424.4 6.37 4.298 10.268s8.844 4.274 10.269 4.298h.028c.528 0 1.027-.208 1.405-.586l2.712-2.712a.999.999 0 0 0 0-1.414l-4-4.001zm-.127 6.712c-1.248-.021-5.518-.356-8.873-3.712-3.366-3.366-3.692-7.651-3.712-8.874L7 4.414 9.586 7 8.293 8.293a1 1 0 0 0-.272.912c.024.115.611 2.842 2.271 4.502s4.387 2.247 4.502 2.271a.991.991 0 0 0 .912-.271L17 14.414 19.586 17l-2.006 2.005z"></path></svg>                    </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 align-items-center justify-content-center">
                                    <img src="../assets/img/TM_Mobile_logo.svg.png" height="50px" alt="TM Logo" >
                                </div>
                                <div class="col-8">
                                <input class="my-4 text-center" id="edit_contact_globe" value="0953-765-9982" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 d-flex align-items-center justify-content-center">
                                    <img src="../assets/img/smart_logo.png" height="50px" alt="Smart Logo" >
                                </div>
                                <div class="col-8">
                                    <input class="my-4 text-center" id="edit_contact_smart" value="0909-123-9382" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mx-1 contact-us-card">
                    <div class="row">
                    <button class="btn rounded contact_us_button py-1 m-auto my-4 w-75">
                        EMAIL US
                    </button>
                    <div class="row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24" style="fill: rgba(85, 189, 85, 1);transform: ;msFilter:;"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>                    </div>
                    <div class="row">
                    <input class="my-4 text-center" value="pagadianbsp@gmail.com" id="edit_contact_email" readonly/>
                    </div>
                    <div class="row w-50 m-auto">
                    <img src="../assets/img/fb_logo.png" height="100px" width="75px" alt="Facebook Logo" >
                    </div>
                    <div class="row my-3">
                    <a href="https://www.facebook.com/pages/Bsp%20Zamboanga%20Del%20-Pagadian%20City%20Council/440760053179061/">Bsp Zamboanga Del -Pagadian City Council</a>
                    </div>
                </div>
            </div>
            </div>
            <div class="row my-3">
                <div class="col-4"></div>
                <div class="col-4">
                    <button class="btn rounded  w-100 rounded-element" id="btn_edit_page_details">
                        Edit
                    </button>
                </div>
                <div class="col-4"></div>
            </div>
        </div>

        
    </div>

</body>
<script src="../../assets/js/jquery-3.6.1.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(()=>{
        $.post("../ajax.php",{action:"get_page_information"},(page_information)=>{
          let page_information_json =  JSON.parse(page_information);
            $("#edit_address").val(page_information_json.address);
            $("#edit_contact_globe").val(page_information_json.contact_globe);
            $("#edit_contact_smart").val(page_information_json.contact_smart);
            $("#edit_contact_email").val(page_information_json.contact_email);
        });


        let isEditingPageDetails =false;
     $("#btn_edit_page_details").click(()=>{
        isEditingPageDetails =true;
        $("#edit_address").removeAttr("readonly");
        $("#edit_contact_globe").removeAttr("readonly");
        $("#edit_contact_smart").removeAttr("readonly");
        $("#edit_contact_email").removeAttr("readonly");
        if (isEditingPageDetails == true) {
            $("#btn_edit_page_details").text("Save Edit");
            $("#btn_edit_page_details").click(()=>{
                if (window.confirm("Are you sure you want to change the page information?")) {
                    $.post("../ajax.php",{action:"edit_page_information",
                        address:$("#edit_address").val(),
                        contact_globe: $("#edit_contact_globe").val(),
                        contact_smart: $("#edit_contact_smart").val(),
                        contact_email: $("#edit_contact_email").val()
                    },(data,status)=>{
                        window.location.reload();
                    });
                    
                }
            });
        }
        else{
            $("#btn_edit_page_details").text("Edit");
        }
     });
    });
</script>
</html>