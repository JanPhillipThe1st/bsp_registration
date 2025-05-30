<?php
// Dynamically determine base URL and page URL for Open Graph tags
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'); // e.g., /bsp_registration or empty if at root
$og_image_url = $protocol . $host . $base_path . "/assets/img/BSPLogo.png";
$og_url = $protocol . $host . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Official registration and monitoring system for the Zamboanga del Sur Boy Scout of the Philippines.">
    <meta name="keywords" content="BSP, Boy Scout, Philippines, Zamboanga del Sur, registration, monitoring, scouting, youth">
    <meta name="author" content="BSP Zamboanga del Sur">

    <!-- Open Graph Meta Tags for Link Preview -->
    <meta property="og:title" content="BSP Registration System" />
    <meta property="og:description" content="Official registration and monitoring system for the Zamboanga del Sur Boy Scout of the Philippines." />
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image_url); ?>" />
    <meta property="og:url" content="<?php echo htmlspecialchars($og_url); ?>" />
    <meta property="og:type" content="website" />
    <!-- End Open Graph Meta Tags -->

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
    <h3>Login</h3>
    <h5>Enter your username and password below</h5>
    <label for="username">Username</label>
    <input type="text" class="form-control text-black" name="username" id="username"  placeholder="Enter your username here...">
    <label for="password">Password</label>
    <div class="row">
        <div class="col-11">
            <input type="password" class="form-control text-black"  name="password" id="password"  placeholder="Enter your password here...">
        </div>  
        <div class="col-1">
            <button class="btn btn-warning" id="togglePassword">
                <i class="bi bi-eye-slash" ></i>
            </button>
        </div>  
    </div>
    <button id="btn_login">Log in</button>
    <a href="password_reset.php">Forgot Password</a>
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
            const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            this.classList.toggle('bi-eye');
        });
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
                            case "school_coordinator":
                            $("#loginStatusMessage").text(" You have successfully logged in as School Coordinator!");
                            $("#loginStatus").modal("toggle");
                            $("#loginSuccess").click(()=>{
                            window.location = "school_coordinator/index.php";});
                            break; 
                            case "troop_leader":
                            $("#loginStatusMessage").text(" You have successfully logged in as Troop Leader!");
                            $("#loginStatus").modal("toggle");
                            $("#loginSuccess").click(()=>{
                            window.location = "troop_leader/index.php";});
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