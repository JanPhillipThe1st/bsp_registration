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
            <h3 class="m-auto text-center">LIST OF ACTIVE STUDENTS</h3>
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
                <th>Student ID</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Section</th>
                <th>Rank</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table_data">
        </tbody>
        <tfoot class="bg-success text-white">
            <tr>
                <th>#</th>
                <th>Date of Registration</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Section</th>
                <th>Rank</th>
                <th>Email</th>
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
                    <button class="btn rounded border border-success" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>   
                </div>
            </div>
        </div>
        <div class="col-8"></div>
    </div>
</div>

<div class="modal fade " id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success">STUDENT INFORMATION FORM</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <input type="hidden" name="editStudentID" id="editStudentID">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Photo column -->
                        <div class="col-2">
                            <div class="row my-4">
                                <img src="../assets/img/BSPLogo.png" class="bg-secondary" alt="Student Photo Thumbnail" id="edit_student_photo_preview" >
                                <form action="screens/upload_student_photo.php" method="post" enctype="multipart/form-data" >    
                                    <div class="form-group">
                                        <label for="edit_student_photo">Select Photo</label>
                                        <input type="hidden" name="edit_student_photo_name" id="edit_student_photo_name">
                                        <input type="file" class="form-control-file" name="edit_student_photo" id="edit_student_photo" placeholder="Select Photo" aria-describedby="fileHelpId">
                                        <button type="submit" name="submit" class="form-control">Upload</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="row">
                                <h4>Student ID:</h4>
                            </div>
                            <div class="row p-1 rounded border border-secondary text-center">
                                <h5 id="student_id">000-0001</h5>
                            </div>
                        </div>
                        <!-- Spacing -->
                        <div class="col-1"></div>
                        <!-- Information Column -->
                        <div class="col-9">
                            <div class="row ">
                                <p class="text-end">
                                    Date of registration:
                                    <strong id="edit_student_date_of_registration">09-06-2024</strong>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="row">
                                        <h5>Full Name:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="First name" id="edit_student_first_name">
                                    </div>
                                    <div class="row">
                                        <h5>Address:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Street / Barangay" id="edit_student_barangay">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Middle name" id="edit_student_middle_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Municipality / City" id="edit_student_city">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Last name" id="edit_student_last_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Province" id="edit_student_province" >
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                <div class="row">
                                    <h5>Contact:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="email" class="form-control" placeholder="Email" id="edit_student_email">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="number" class="form-control" placeholder="Phone" id="edit_student_phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">
                                <div class="row pt-5">
                                        <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Guardian:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Guardian's Phone #:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Permanent Address:</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row pt-5">
                                        <h5>In case of emergency:</h5>
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian name here..." id="edit_student_emergency_guardian">
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian phone here..." id="edit_student_emergency_guardian_phone">
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian address here..." id="edit_student_emergency_guardian_address">
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                    <div class="row pt-5  w-100">
                                        <h5>Grade:</h5>
                                    </div>
                                    <div class="row  w-100">
                                        <select class="form-control" id="edit_student_grade">
                                            <option value="1">Grade 1</option>
                                            <option value="2">Grade 2</option>
                                            <option value="3">Grade 3</option>
                                            <option value="4">Grade 4</option>
                                            <option value="5">Grade 5</option>
                                            <option value="6">Grade 6</option>
                                        </select>
                                    </div>
                                    <div class="row  w-100"  >
                                        <h5>Section:</h5>
                                    </div>
                                    <div class="row w-100">
                                        <input type="text" class="form-control" placeholder="Enter section here..." id="edit_student_section">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_edit_student" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success">STUDENT INFORMATION FORM</h5>
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
                                <img src="../assets/img/BSPLogo.png" class="bg-secondary" alt="Student Photo Thumbnail" id="add_student_photo_preview" >
                                <form action="screens/upload_student_photo.php" method="post" enctype="multipart/form-data" >    
                                    <div class="form-group">
                                        <label for="add_student_photo">Select Photo</label>
                                        <input type="hidden" name="add_student_photo_name" id="add_student_photo_name">
                                        <input type="file" class="form-control-file" name="add_student_photo" id="add_student_photo" placeholder="Select Photo" aria-describedby="fileHelpId">
                                        <button type="submit" name="submit" class="form-control">Upload</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="row">
                                <h4>Student ID:</h4>
                            </div>
                            <div class="row p-1 rounded border border-secondary text-center">
                                <h5 id="student_id">000-0001</h5>
                            </div>
                        </div>
                        <!-- Spacing -->
                        <div class="col-1"></div>
                        <!-- Information Column -->
                        <div class="col-9">
                            <div class="row ">
                                <p class="text-end">
                                    Date of registration:
                                    <strong id="add_student_date_of_registration">09-06-2024</strong>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="row">
                                        <h5>Full Name:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="First name" id="add_student_first_name">
                                    </div>
                                    <div class="row">
                                        <h5>Address:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Street / Barangay" id="add_student_barangay">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Middle name" id="add_student_middle_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Municipality / City" id="add_student_city">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Last name" id="add_student_last_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Province" id="add_student_province" >
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                <div class="row">
                                    <h5>Contact:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="email" class="form-control" placeholder="Email" id="add_student_email">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="number" class="form-control" placeholder="Phone" id="add_student_phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">
                                <div class="row pt-5">
                                        <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Guardian:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Guardian's Phone #:</p>
                                    </div>
                                    <div class="row py-3 text-end">
                                        <p>Permanent Address:</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row pt-5">
                                        <h5>In case of emergency:</h5>
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian name here..." id="add_student_emergency_guardian">
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian phone here..." id="add_student_emergency_guardian_phone">
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian address here..." id="add_student_emergency_guardian_address">
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                    <div class="row pt-5  w-100">
                                        <h5>Grade:</h5>
                                    </div>
                                    <div class="row  w-100">
                                        <select class="form-control" id="add_student_grade">
                                            <option value="1">Grade 1</option>
                                            <option value="2">Grade 2</option>
                                            <option value="3">Grade 3</option>
                                            <option value="4">Grade 4</option>
                                            <option value="5">Grade 5</option>
                                            <option value="6">Grade 6</option>
                                        </select>
                                    </div>
                                    <div class="row  w-100"  >
                                        <h5>Section:</h5>
                                    </div>
                                    <div class="row w-100">
                                        <input type="text" class="form-control" placeholder="Enter section here..." id="add_student_section">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_add_student" class="btn btn-primary">Submit</button>
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
                <h3 id="modalMessage">Your image has been successfully uploaded!</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<script src="../assets/jquery-3.6.1.min.js"></script>
<script src="../assets/js/DataTables/datatables.min.js"></script>
<script>
     $(document).ready(()=>{
        //Get query string parameters to display the message
        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);
        const message = urlParams.get('message');
        const filename = urlParams.get('filename');

        console.log(message);

        if (filename != undefined){
            $("#add_student_photo_name").val(filename);
            $("#add_student_photo_preview").attr("src","../img/students/"+filename);
        }
        console.log(filename);
        getStudentsTable();
        function getStudentsTable(){
            var table_data = $("#table_data");
            table_data.empty();
        $.post("../ajax.php",{action:"get_students"},(response,status)=>{
            var students_table = JSON.parse(response);
            students_table.forEach((student,student_index)=>{
                var studentObject = {
                    studentID:student.studentID,
                    schoolID:student.schoolID,
                    student_first_name:student.student_first_name,
                    student_middle_name:student.student_middle_name,
                    student_last_name:student.student_last_name,
                    student_grade:student.student_grade,
                    student_section:student.student_section,
                    student_rank:student.student_rank,
                    student_photo:student.student_photo,
                    student_barangay:student.student_barangay,
                    student_city:student.student_city,
                    student_province:student.student_province,
                    student_email:student.student_email,
                    student_phone:student.student_phone,
                    student_emergency_guardian:student.student_emergency_guardian,
                    student_emergency_phone:student.student_emergency_phone,
                    student_emergency_address:student.student_emergency_address,
                    date_registered:student.date_registered,};
                table_data.append(
                    $("<tr></tr>")
                    .append(
                        $("<td>"+(parseInt(student_index)+1)+"</td>")
                    )
                    .append(
                        $("<td>"+studentObject.date_registered+"</td>")
                    )
                    .append(
                        $("<td>"+studentObject.studentID+"</td>")
                    )
                    .append(
                        $("<td>"+studentObject.student_first_name +" "+ studentObject.student_middle_name + " " +  studentObject.student_last_name+"</td>")
                    )
                    .append(
                        $("<td>"+studentObject.student_grade+"</td>")
                    )
                    .append(
                        $("<td>"+studentObject.student_section+"</td>")
                    )
                    .append(
                        $("<td>"+studentObject.student_rank+"</td>")
                    )
                    .append(
                        $("<td>"+studentObject.student_email+"</td>")
                    )
                    .append(
                        $("<td></td>")
                        .append(
                            $("<button class='btn btn-warning mx-2 text-white'><i class='bx bxs-edit'></i> Edit</button>").click(()=>{
                                //Populate the input fields
                                $("#edit_student_first_name").val(student.student_first_name);
                                $("#edit_student_middle_name").val(student.student_middle_name);
                                $("#edit_student_last_name").val(student.student_last_name);
                                $("#edit_student_grade").val(student.student_grade);
                                $("#edit_student_section").val(student.student_section);
                                $("#edit_student_photo_name").val(student.student_photo);
                                $("#edit_student_photo_preview").attr("src","../img/students/"+student.student_photo);
                                $("#edit_student_barangay").val(student.student_barangay);
                                $("#edit_student_city").val(student.student_city);
                                $("#edit_student_province").val(student.student_province);
                                $("#edit_student_email").val(student.student_email);
                                $("#edit_student_phone").val(student.student_phone);
                                $("#edit_student_emergency_guardian").val(student.student_emergency_guardian);
                                $("#edit_student_emergency_guardian_phone").val(student.student_emergency_phone);
                                $("#edit_student_emergency_guardian_address").val(student.student_emergency_address);
                                
                                $("#editStudentID").val(studentObject.studentID);
                                $("#editStudentModal").modal("toggle");
                            })
                        )
                        .append(
                            $("<button class='btn btn-danger mx-2 text-white'><i class='bx bxs-trash'></i> Delete</button>").click(()=>{
                                if (window.confirm("Are you sure you want to delete "+student.student_first_name +" "+student.student_last_name+"'s records?")) {
                                    $.post("../ajax.php",{action:"delete_student",studentID:studentObject.studentID},(delete_response,delete_status)=>{
                                        window.location = "index.php?page=students&message=Student Data Deleted Successfully!";
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
                    });
            
        }

      $("#confirm_add_student").on("click",(event_info)=>{
        if (window.confirm("Are you sure you want to add this student?")) {
            $.post("../ajax.php",{action:"add_student",
                    student_first_name:$("#add_student_first_name").val(),
                    student_middle_name:$("#add_student_middle_name").val(),
                    student_last_name:$("#add_student_last_name").val(),
                    student_grade:$("#add_student_grade").val(),
                    student_photo:$("#add_student_photo_name").val(),
                    student_section:$("#add_student_section").val(),
                    student_barangay:$("#add_student_barangay").val(),
                    student_city:$("#add_student_city").val(),
                    student_province:$("#add_student_province").val(),
                    student_email:$("#add_student_email").val(),
                    student_phone:$("#add_student_phone").val(),
                    student_emergency_guardian:$("#add_student_emergency_guardian").val(),
                    student_emergency_phone:$("#add_student_emergency_guardian_phone").val(),
                    student_emergency_address:$("#add_student_emergency_guardian_address").val(),
            },(data)=>{
                window.location ="index.php?message=Student added successfully!";
            });
        }
      });
      $("#confirm_edit_student").on("click",(event_info)=>{
        if (window.confirm("Are you sure you want to update this student's information?")) {
            $.post("../ajax.php",{action:"update_student",
                    studentID:$("#edit_student_first_name").val(),
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