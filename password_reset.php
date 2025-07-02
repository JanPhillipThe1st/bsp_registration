<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/img/BSPLogo.png">
    <title>BSP Registration System</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/chart.js/chart.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">

<div class="form-group login_form">
    <div class="row w-100 my-3">
        <div class="col d-flex align-items-center m-auto">
            <img src="./assets/img/BSPLogo.png" class="m-auto" alt="" srcset="" style="max-width: 10vh;">
        </div>
        <div class="col d-flex align-items-center m-auto">
            <h3 class="m-auto text-center" style="font-size:1.5em !important;">Boy Scouts of the Philippines</h3>
        </div>
        <div class="col d-flex align-items-center m-auto">
            <img src="./assets/img/ZDS_Logo.png" class="m-auto" alt="" srcset="" style="max-width: 10vh;" >
        </div>
    </div>
    <hr>
    <h3>Forgot password</h3>
    <h6 class="text-center">Enter and confirm your email address below</h6>
    <label for="email">Email Address</label>
    <input type="email" class="form-control text-black" name="email" id="email"  placeholder="Enter your email here...">
    <label for="confirm_email">Confirm email</label>
    <input type="email" class="form-control text-black" name="confirm_email" id="confirm_email"  placeholder="Confirm your email...">
    <button id="btn_send_password">Send Password</button>
    <p>Powered by <a href="https://postmail.invotes.com" target="_blank">PostMail</a></p>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="loginStatus" tabindex="-1" role="dialog" aria-labelledby="loginStatusId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Password Sender</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid" id="loginStatusMessage">
                    Password sent successfully! Please check your email.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="loginSuccess">OK</button>
            </div>
        </div>
    </div>
</div>

</body>
<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script style="display: none;">
        $(document).ready(()=>{
          

            $("#btn_send_password").click(()=>{
                $("#btn_send_password").html(`<div class="spinner-border text-light" role="status"></div>`);
                if ( $("#email").val().toString().length <1 || $("#confirm_email").val().toString().length <1 ) {
                    alert("Please fill in all fields before proceeding!");
                    $("#btn_send_password").html(`Send Password`);
                }
                else{
                    
                var email =  $("#email").val();
                var confirm_email =  $("#confirm_email").val();
                if(email.toString() == confirm_email.toString()){
                    $.post("ajax.php",{action:"reset_password",recipient_email:confirm_email},(email_sent)=>{
                        $("#loginStatus").modal("show");
                        
                    $("#btn_send_password").html(`Send Password`);
                    });
                }
                else{
                    alert("Email addresses do not match!");
                }
            }
        });
    });
</script>
</html>