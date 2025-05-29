<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: ../../index.php");
}
?>
<link rel="stylesheet" href="../assets/vendor/boxicons/css/boxicons.css">
<link rel="stylesheet" href="../assets/vendor/boxicons/css/animations.css">
<style>
    tr{
        transition: 300ms;
    }
    tr:hover{
        transition: 300ms;
        cursor: pointer;
        background-color: rgb(61, 199, 56);
        color: white;
    }
</style>
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-4"></div>
        <div class="col-4">
            <h3 class="m-auto text-center">LIST OF USER ACCOUNTS</h3>
            <br>
                <h6 class="m-auto text-center">S.Y. <?= $_SESSION["school_year_string"]?></h6>
        </div>
        <div class="col-4"></div>
    </div>
    <br>
 
    <table class="table m-auto w-75 table-bordered table-rounded" id="students_table">
        <thead class="bg-success text-white">
            <tr>
                <th>#</th>
                <th>Date of Registration</th>
                <th>User ID</th>
                <th>User Type</th>
                <th>User Account</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table_data">
        </tbody>
        <tfoot class="bg-success text-white">
            <tr>
                <th>#</th>
                <th>Date of Registration</th>
                <th>User ID</th>
                <th>User Type</th>
                <th>User Account</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-1">
                    <button class="btn btn-success">Print</button>
                </div>
                <div class="col-2">
                    <button class="btn rounded border border-success" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>   
                </div>
            </div>
        </div>
        <div class="col-8"></div>
    </div>
</div>

<div class="modal fade " id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success">USER INFORMATION FORM</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Photo column -->
                        <div class="col-2">
                            <div class="row my-4">
                                <img src="../assets/img/BSPLogo.png" class="bg-secondary" alt="User Photo Thumbnail" id="add_user_photo_preview" >
                                <form action="screens/upload_user_photo.php" method="post" enctype="multipart/form-data" >    
                                    <div class="form-group">
                                        <label for="add_user_photo">Select Photo</label>
                                        <input type="hidden" name="add_user_photo_name" id="add_user_photo_name">
                                        <input type="file" class="form-control-file" name="add_user_photo" id="add_user_photo" placeholder="Select Photo" aria-describedby="fileHelpId">
                                        <button type="submit" name="submit" class="form-control">Upload</button>
                                    </div>
                                </form>
                            </div>
                            
                        
                        </div>
                        <!-- Spacing -->
                        <div class="col-1"></div>
                        <!-- Information Column -->
                        <div class="col-9">
                            <div class="row ">
                                <p class="text-end">
                                    Date of registration:
                                    <strong id="add_user_date_of_registration">09-06-2024</strong>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="row">
                                        <h5>Full Name:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="First name" id="add_user_first_name">
                                    </div>
                                    <div class="row">
                                        <h5>Address:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Street / Barangay" id="add_user_barangay">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Middle name" id="add_user_middle_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Municipality / City" id="add_user_city">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Last name" id="add_user_last_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Province" id="add_user_province" >
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                <div class="row">
                                    <h5>Contact:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="email" class="form-control" placeholder="Email" id="add_user_email">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="number" class="form-control" placeholder="Phone" id="add_user_phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-5">
                                <div class="row pt-5">
                                        <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Username:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Password:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Confirm Password:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Access level:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Select School:</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row pt-5">
                                        <h5>Account information</h5>
                                    </div>
                                    <div class="row py-3">
                                        <input type="text" class="form-control" placeholder="Enter username here..." id="add_user_username">
                                    </div>
                                    <div class="row py-3">
                                        <input type="password" class="form-control" placeholder="Enter password..." id="add_user_password">
                                    </div>
                                    <div class="row py-3">
                                        <input type="password" class="form-control" placeholder="Confirm password..." id="add_user_confirm_password">
                                    </div>
                                    <div class="row py-3">
                                        <select class="form-control" placeholder="Confirm password..." id="add_user_access_type">
                                            <option value="troop_leader">Troop Leader</option>
                                            <option value="it_coordinator">IT Coordinator</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="school_coordinator">School Coordinator</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="row py-3">
                                        <select class="form-control" placeholder="School" id="add_user_school">
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_add_user" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade " id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success">USER INFORMATION FORM</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Photo column -->
                        <div class="col-2">
                            <div class="row my-4">
                                <img src="../assets/img/BSPLogo.png" class="bg-secondary" alt="User Photo Thumbnail" id="edit_user_photo_preview" >
                                <form action="screens/upload_edit_user_photo.php" method="post" enctype="multipart/form-data" >    
                                    <div class="form-group">
                                        <label for="add_user_photo">Select Photo</label>
                                        <input type="hidden" name="edit_user_photo_name" id="edit_user_photo_name">
                                        <input type="file" class="form-control-file" name="edit_user_photo" id="edit_user_photo" placeholder="Select Photo" aria-describedby="fileHelpId">
                                        <button type="submit" name="submit" class="form-control">Upload</button>
                                    </div>
                                </form>
                            </div>
                            
                        
                        </div>
                        <!-- Spacing -->
                        <div class="col-1"></div>
                        <!-- Information Column -->
                        <div class="col-9">
                            <div class="row ">
                                <p class="text-end">
                                    Date of registration:
                                    <strong id="edit_user_date_of_registration">09-06-2024</strong>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="row">
                                        <h5>Full Name:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="First name" id="edit_user_first_name">
                                    </div>
                                    <div class="row">
                                        <h5>Address:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Street / Barangay" id="edit_user_barangay">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Middle name" id="edit_user_middle_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Municipality / City" id="edit_user_city">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Last name" id="edit_user_last_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Province" id="edit_user_province" >
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                <div class="row">
                                    <h5>Contact:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="email" class="form-control" placeholder="Email" id="edit_user_email">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="number" class="form-control" placeholder="Phone" id="edit_user_phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-5">
                                <div class="row pt-5">
                                        <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Username:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Password:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Confirm Password:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Access level:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Select School:</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row pt-5">
                                        <h5>Account information</h5>
                                    </div>
                                    <div class="row py-3">
                                        <input type="text" class="form-control" placeholder="Enter username here..." id="edit_user_username">
                                    </div>
                                    <div class="row py-3">
                                        <input type="password" class="form-control" placeholder="Enter password..." id="edit_user_password">
                                    </div>
                                    <div class="row py-3">
                                        <input type="password" class="form-control" placeholder="Confirm password..." id="edit_user_confirm_password">
                                    </div>
                                    <div class="row py-3">
                                        <select class="form-control" placeholder="Confirm password..." id="edit_user_access_type">
                                            <option value="troop_leader">Troop Leader</option>
                                            <option value="it_coordinator">IT Coordinator</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="school_coordinator">School Coordinator</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="row py-3">
                                        <select class="form-control" placeholder="School" id="edit_user_school">
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_edit_user" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message From System:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 id="modalMessage">Your image has been successfully uploaded!</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/DataTables/datatables.min.js"></script>
<script>
     $(document).ready(()=>{
        //Get query string parameters to display the message
        getStudentsTable();
        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);
        const message = urlParams.get('message');
        const filename = urlParams.get('filename');

        console.log(message);
        console.log(filename+ "<---- Filename");
        
        $("#add_user_date_of_registration").text(new Date().toDateString());

        if (filename != null){
            $("#add_user_photo_preview").attr("src","../img/users/"+filename);
            $("#add_user_photo_name").val(filename.toString());
            $("#edit_user_photo_preview").attr("src","../img/users/"+filename);
            $("#edit_user_photo_name").val(filename.toString());
            $("#messageModal").modal("toggle");
        }
        function getStudentsTable(){
            var table_data = $("#table_data");
            table_data.empty();
        $.post("../ajax.php",{action:"get_users"},(response,status)=>{
            var users_table = JSON.parse(response);
            users_table.forEach((user,user_index)=>{
                table_data.append(
                    $("<tr></tr>")
                    .append(
                        $("<td>"+(parseInt(user_index)+1)+"</td>")
                    )
                    .append(
                        $("<td>"+user.date_registered+"</td>")
                    )
                    .append(
                        $("<td>"+user.userID+"</td>")
                    )
                    .append(
                        $("<td>"+user.access_type+"</td>")
                    )
                    .append(
                        $("<td>"+ user.account_last_name +", "+  user.account_first_name + " " + user.account_middle_name.substring(0,1)  +". </td>")
                    )
                    .append(
                        $("<td>"+user.account_barangay+", "+user.account_city+", "+user.account_province+" </td>")
                    )
                    .append(
                        $("<td>"+user.account_email+"</td>")
                    )
                    .append(
                        $("<td>"+user.account_phone+"</td>")
                    )
                    .append(
                    )
                    .append(
                        $("<td></td>")
                        .append(
                            $("<button class='btn btn-warning mx-2 text-white'><i class='bx bxs-edit'></i> Edit</button>").click(()=>{
                                //Populate the input fields
                                $("#edit_user_first_name").val(user.account_first_name);
                                $("#edit_user_middle_name").val(user.account_middle_name);
                                $("#edit_user_last_name").val(user.account_last_name);
                                $("#edit_user_photo_name").val(user.account_photo);
                                $("#edit_user_barangay").val(user.account_barangay);
                                $("#edit_user_city").val(user.account_city);
                                $("#edit_user_province").val(user.account_province);
                                $("#edit_user_access_type").val(user.access_type);
                                $("#edit_user_email").val(user.account_email);
                                $("#edit_user_phone").val(user.student_phone);
                                $("#edit_user_username").val(user.username);
                                $("#edit_user_password").val(user.password);
                                $("#edit_user_photo_preview").attr("src","../img/users/"+user.account_photo);
                                $("#edit_user_photo_name").val(user.account_photo);
                                $("#edit_user_confirm_password").val(user.password);
                                $("#edit_user_phone").val(user.account_phone);
                                
                                $("#editStudentID").val(user.accountID);
                                $("#editUserModal").modal("toggle");
                                
                                $("#confirm_edit_user").click(()=>{
                                    if(window.confirm("Are you sure you want to update this user's information?")){
                                        $("#editUserModal").modal("toggle");
                                        $.post("../ajax.php",{action:"update_user",   
                                            user_first_name:$("#edit_user_first_name").val(),
                                            user_middle_name:$("#edit_user_middle_name").val(),
                                            user_last_name:$("#edit_user_last_name").val(),
                                            user_photo_name:$("#edit_user_photo_name").val(),
                                            user_barangay:$("#edit_user_barangay").val(),
                                            user_city:$("#edit_user_city").val(),
                                            user_province:$("#edit_user_province").val(),
                                            user_email:$("#edit_user_email").val(),
                                            user_phone:$("#edit_user_phone").val(),
                                            user_username:$("#edit_user_username").val(),
                                            user_password:$("#edit_user_password").val(),
                                            user_confirm_password:$("#edit_user_confirm_password").val(),
                                            user_school:$("#edit_user_school").val(),
                                            user_access_type:$("#edit_user_access_type").val(),
                                            user_phone:$("#edit_user_phone").val(),                                
                                            userID:user.userID},
                                (edit_user_response,edit_user_status)=>{
                                         
                                        });
                                        $("#modalMessage").text("User information successfully updated!");   
                                        $("#messageModal").modal("toggle");   
                                        getStudentsTable();
                                    }
                                });
                            })
                        )
                        .append(
                            $("<button class='btn btn-danger mx-2 text-white'><i class='bx bxs-trash'></i> Delete</button>").click(()=>{
                                if (window.confirm("Are you sure you want to delete "+user.account_first_name +" "+user.account_last_name+"'s records?")) {
                                    $.post("../ajax.php",{action:"delete_user",userID:user.userID},(delete_response,delete_status)=>{
                                        window.location = "index.php?page=students&message=User Data Deleted Successfully!";
                                        getStudentsTable();
                                    });
                                }
                            })
                        )
                    )
                );
            });

            $('#students_table tfoot th').each(function (i) {
                    var title = $('#students_table thead th')
                        .eq($(this).index())
                        .text();
                    $(this).html(
                        '<input type="text" class="form-control w-100" placeholder="' + title + '" data-index="' + i + '" />'
                    );
                });

                var table = $('#students_table').DataTable();
            
                // Filter event handler
                $(table.table().container()).on('keyup', 'tfoot input', function () {
                    table
                        .column($(this).data('index'))
                        .search(this.value)
                        .draw();
                });


                $.post("../ajax.php",{action:"get_schools"},(school_data)=>{
                    var school_map = JSON.parse(school_data);
                    school_map.forEach((school,sn_index)=>{
                        $("#add_user_school").append(
                            $("<option value='"+school["ID"]+"'></option>")
                            .append(
                               school["school_name"]
                            )
        
                        );
                        $("#edit_user_school").append(
                            $("<option value='"+school["ID"]+"'></option>")
                            .append(
                               school["school_name"]
                            )
        
                        );
                    });
                    
                });
                
                    });
            
        }

      $("#confirm_add_user").on("click",(event_info)=>{
        if (window.confirm("Are you sure you want to add this user?")) {
            if($("#add_user_password").val() === 
            $("#add_user_confirm_password").val()){
                    $.post("../ajax.php",{action:"add_user",
                        add_user_first_name:$("#add_user_first_name").val(),
                        add_user_middle_name:$("#add_user_middle_name").val(),
                        add_user_last_name:$("#add_user_last_name").val(),
                        add_user_username:$("#add_user_username").val(),
                        add_user_password:$("#add_user_password").val(),
                        add_user_account_grade:"N/A",
                        add_user_photo:$("#add_user_photo_name").val(),
                        add_user_barangay:$("#add_user_barangay").val(),
                        add_user_city:$("#add_user_city").val(),
                        add_user_province:$("#add_user_province").val(),
                        add_user_email:$("#add_user_email").val(),
                        add_user_phone:$("#add_user_phone").val(),
                        add_user_school:$("#add_user_school").val(),
                        add_user_access_type:$("#add_user_access_type").val(),
                    },(data)=>{
                        window.location ="index.php?message=Student added successfully!";
                    });
            }
            else{
                $("#add_user_password").after("<h6 class='text-danger'>Passwords do not match!</h6>");
                $("#add_user_confirm_password").after("<h6 class='text-danger'>Passwords do not match!</h6>");
                $("#add_user_confirm_password").change(()=>{
                    $("#add_user_confirm_password").next('h6').remove();
                });
                $("#add_user_password").change(()=>{
                    $("#add_user_password").next('h6').remove();
                });
            }
        }
      });
      $("#confirm_edit_student").on("click",(event_info)=>{
        if (window.confirm("Are you sure you want to update this student's information?")) {
            $.post("../ajax.php",{action:"update_student",
                    studentID:$("#editStudentID").val(),
                    student_first_name:$("#edit_student_first_name").val(),
                    student_middle_name:$("#edit_student_middle_name").val(),
                    student_last_name:$("#edit_student_last_name").val(),
                    student_grade:$("#edit_student_grade").val(),
                    student_photo:$("#edit_student_photo_name").val(),
                    student_section:$("#edit_student_section").val(),
                    student_barangay:$("#edit_student_barangay").val(),
                    student_city:$("#edit_student_city").val(),
                    student_province:$("#edit_student_province").val(),
                    student_email:$("#edit_student_email").val(),
                    student_phone:$("#edit_student_phone").val(),
                    student_emergency_guardian:$("#edit_student_emergency_guardian").val(),
                    student_emergency_phone:$("#edit_student_emergency_guardian_phone").val(),
                    student_emergency_address:$("#edit_student_emergency_guardian_address").val(),
            },(data)=>{
                window.location ="index.php?message=Student information updated successfully!";
            });
        }
      });
    });
</script>