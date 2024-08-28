<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/img/BSPLogo.png">
    <title>BSP Registration System</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/chart.js/chart.js">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">

<div class="form-group login_form">
    <div class="row w-100 my-3">
        <div class="col-2 d-flex align-items-center m-auto">
            <img src="./assets/img/BSPLogo.png" class="m-auto" alt="" srcset="" height="100px">
        </div>
        <div class="col-8 d-flex align-items-center m-auto">
            <h3 class="m-auto text-center">Boy Scouts of the Philippines</h3>
        </div>
        <div class="col-2 d-flex align-items-center m-auto">
            <img src="./assets/img/ZDS_Logo.png" class="m-auto" alt="" srcset="" height="100px">
        </div>
    </div>
    <hr>
    <h5>Registration System</h5>
    <h3>Log in</h3>
    <label for="username">Username</label>
    <input type="text" class="form-control bg-dark text-white" name="username" id="username"  placeholder="Enter your username here...">
    <label for="password">Password</label>
    <input type="password" class="form-control bg-dark text-white" name="password" id="password"  placeholder="Enter your password here...">
    <button id="btn_login">Log in</button>
    <a href="password_reset">Forgot Password</a>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="loginStatus" tabindex="-1" role="dialog" aria-labelledby="loginStatusId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid" id="loginStatusMessage">
                    You have successfully logged in!
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="loginSuccess">OK</button>
            </div>
        </div>
    </div>
</div>

</body>
<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script style="display: none;">
        $(document).ready(()=>{
        $("#btn_login").click(()=>{
            var username = $("#username").val();
            var password = $("#password").val();
            $.post("ajax.php",{action:"login",username:username,password:password},(data)=>{
                var login_response =JSON.parse(data);
                if (login_response.username != undefined && login_response.username != undefined) {
                    switch (login_response.access) {
                        case "admin":
                            $("#loginStatusMessage").text(" You have successfully logged in as Admin!");
                            $("#loginStatus").modal("toggle");
                            $("#loginSuccess").click(()=>{
                            window.location = "admin/index.php";});
                            break;
                            case "teacher":
                            $("#loginStatusMessage").text(" You have successfully logged in as Teacher!");
                            $("#loginStatus").modal("toggle");
                            $("#loginSuccess").click(()=>{
                            window.location = "teacher/index.php";});
                            break;
                            case "it_coordinator":
                            $("#loginStatusMessage").text(" You have successfully logged in as IT Coordinator!");
                            $("#loginStatus").modal("toggle");
                            $("#loginSuccess").click(()=>{
                            window.location = "it_coordinator/index.php";});
                            break;
                        default:
                            break;
                    }
                }
                else{
                            $("#loginStatusMessage").text("Login Failed. Incorrect username/password.");
                            $("#loginStatus").modal("toggle");
                            $("#loginSuccess").click(()=>{
                                $("#loginStatus").modal("toggle");});
                }
            });
        });
    });
</script>
</html>