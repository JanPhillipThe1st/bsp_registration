<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: ../../index.php");
}
?>
<link rel="stylesheet" href="../assets/vendor/boxicons/css/boxicons.css">
<link rel="stylesheet" href="../assets/vendor/boxicons/css/animations.css">
<link rel="stylesheet" href="../assets/js/DataTables/datatables.css">
<link rel="stylesheet" href="../assets/js/DataTables/Buttons-2.4.1/css/buttons.dataTables.css">
<style>
    tr{
        transition: 300ms;
    }
    tr:hover{
        transition: 300ms;
        cursor: pointer;
        background-color:rgb(211, 159, 81) !important;
        color: white;
    }
</style>
<div class="container-fluid">
    <input type="hidden" id="current_sy" value=<?=$_SESSION["school_year"]?>>
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
  <div class="row my-3">
        <div class="col-3 d-flex align-items-center justify-content-center">
            <h5 class="text-end">Search by:</h5>
        </div>
        <div class="col-3">
            <select class="form-control" name="search_filter" id="search_filter">
                <option value="all">All</option>
                <option value="student_grade">Grade</option>
                <option value="student_section">Section</option>
                <option value="student_rank">Rank</option>
            </select>       
        </div>
       <div class="col-3" id="searchCriteria">
            <input type="text" class="form-control" id="search_text" placeholder="Enter keyword here"/>
        </div>
          <div class="col-3">
            <button class="btn btn-primary" id="search_button">Search</button>
        </div>
    </div>
    <table class="table m-auto  table-bordered table-rounded" id="students_table">
        <thead class="bg-success text-white">
            <tr>
                <th>No.</th>
                <th>Date Registered</th>
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
       
    </table>

    <table id="students_table_printing" class=" w-100 table-bordered table-rounded d-none">
    <thead class="bg-dark text-white">
            <tr style="border:1px solid black;">
                <th style='border:1px solid black'>No.</th>
                <th style='border:1px solid black'>Date Registered</th>
                <th style='border:1px solid black'>Student ID</th>
                <th style='border:1px solid black'>Name</th>
                <th style='border:1px solid black'>Grade</th>
                <th style='border:1px solid black'>Section</th>
                <th style='border:1px solid black'>Rank</th>
                <th style='border:1px solid black'>Email</th>
            </tr>
        </thead>
        <tbody id="table_data_printing">
        </tbody>
    </table>


    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-1">
                    <button class="btn btn-success" id="print_table">Print</button>
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
                                    <div class="form-group">
                                        <label for="edit_student_photo">Select Photo</label>
                                        <input type="hidden" name="edit_student_photo_name" id="edit_student_photo_name">
                                    </div>
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
                                    Date Registered:
                                    <strong id="edit_student_date_of_registration">09-06-2024</strong>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="row">
                                        <h5>Full Name:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="First name" disabled id="edit_student_first_name">
                                    </div>
                                    <div class="row">
                                        <h5>Address:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Street / Barangay" disabled id="edit_student_barangay">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Middle name" disabled id="edit_student_middle_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Municipality / City" disabled id="edit_student_city">
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="row">
                                <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Last name" disabled id="edit_student_last_name">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Province" disabled id="edit_student_province" >
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                <div class="row">
                                    <h5>Contact:</h5>
                                    </div>
                                    <div class="row">
                                        <input type="email" class="form-control" placeholder="Email" disabled id="edit_student_email">
                                    </div>
                                    <div class="row">
                                    <h5 class="text-white">--</h5>
                                    </div>
                                    <div class="row">
                                        <input type="number" class="form-control" placeholder="Phone" disabled id="edit_student_phone">
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
                                        <input type="email" class="form-control" placeholder="Enter guardian name here..." disabled id="edit_student_emergency_guardian">
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian phone here..." disabled id="edit_student_emergency_guardian_phone">
                                    </div>
                                    <div class="row py-3">
                                        <input type="email" class="form-control" placeholder="Enter guardian address here..." disabled id="edit_student_emergency_guardian_address">
                                    </div>
                                </div>
                                <div class="col-2 mx-2">
                                    <div class="row pt-5  w-100">
                                        <h5>Grade:</h5>
                                    </div>
                                    <div class="row  w-100">
                                        <select class="form-control" id="edit_student_grade" disabled>
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
                                        <input type="text" class="form-control" placeholder="Enter section here..." id="edit_student_section" disabled>
                                    </div>
                                    <div class="row  w-100"  >
                                        <h5>Rank:</h5>
                                    </div>
                                    <div class="row w-100">
                                        <input type="text" class="form-control" placeholder="Enter rank here..." id="edit_student_rank" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_manage_rank" class="btn btn-primary">Manage Rank</button>
                <!-- <button type="button" class="btn btn-secondary" id="btn_cancel_edit"data-bs-dismiss="modal">Cancel</button> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="manageRankModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:50vw; right:12.75vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success">UPDATE STUDENT RANK</h5>
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
                                <img src="../assets/img/BSPLogo.png" class="bg-secondary" alt="Student Photo Thumbnail" id="student_photo_preview_rank" >
                                    <div class="form-group">
                                    </div>
                            </div>
                            
                            <div class="row">
                                <h4>Student ID:</h4>
                            </div>
                            <div class="row p-1 rounded border border-secondary text-center">
                                <h5 id="student_id_rank">000-0001</h5>
                            </div>
                        </div>
                        <!-- Spacing -->
                        <div class="col-1"></div>
                        <!-- Information Column -->
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <h4 class="h4" id="add_student_first_name_rank"></h4>
                                    </div>
                                    <div class="row">
                                        <label for="student_rank" class="form-label">Select Rank</label>
                                        <select class="form-control" name="student_rank" id="student_rank">
                                            <option value="Growing Usa">Growing Usa</option>
                                            <option value="Leaping Usa">Leaping Usa</option>
                                            <option value="Tender Foot">Tender Foot</option>
                                            <option value="2nd Class">2nd Class</option>
                                            <option value="Explorer">Explorer</option>
                                            <option value="Path Finder">Path Finder</option>
                                            <option value="Outdoorsman">Outdoorsman</option>
                                            <option value="Venturer">Venturer</option>
                                            <option value="Eagle">Eagle</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_update_rank" class="btn btn-primary">Submit</button>
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
<script src="../assets/js/DataTables/datatables.js"></script>
<script src="../assets/js/DataTables/Buttons-2.4.1/js/dataTables.buttons.js"></script>
<script src="../assets/js/DataTables/Buttons-2.4.1/js/buttons.dataTables.js"></script>
<script src="../assets/js/DataTables/Buttons-2.4.1/js/buttons.print.js"></script>
<script src="../assets/js/printThis/printThis.js"></script>
<script>
     $(document).ready(()=>{
        //Get query string parameters to display the message
        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);
        const message = urlParams.get('message');
        const filename = urlParams.get('filename');
        var refresh_count = 0;
        console.log(message);

        if (filename != undefined){
            $("#add_student_photo_name").val(filename);
            $("#add_student_photo_preview").attr("src","../img/students/"+filename);
        }
        console.log(filename);
        getStudentsTable(false).then(()=>{
        });
        //Check if current SY
        var isCurrentSY = false;
        $.post("../ajax.php",{action:"get_SY_status",school_year:$("#current_sy").val()},(SYresponse)=>{
            isCurrentSY = SYresponse.includes("true");
            if (!isCurrentSY) {
                $(".action-button").hide();
            }
            else{
                $(".action-button").show();

            }
        });
        async function getStudentsTable(isFiltered){
            var table_data = $("#table_data");
            var table_data_report = $("#table_data_printing");
            table_data.empty();
         var search_filter = $("#search_filter").val();
            var search_text = $("#search_text").val();
            var table_data = $("#table_data");
            var table_data_report = $("#table_data_printing");
            table_data.empty();
            let reqBody = isFiltered? {action:"filter_students",search_filter:search_filter,search_text:search_text}:{action:"get_students"};
        $.post("../ajax.php",reqBody,(response,status)=>{
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
                        // .append(
                        //     $("<button class='btn btn-warning action-button mx-2 text-white'><i class='bx bxs-edit'></i> Edit</button>").click(()=>{
                        //         //Populate the input fields
                        //         $("#edit_student_first_name").val(student.student_first_name);
                        //         $("#edit_student_middle_name").val(student.student_middle_name);
                        //         $("#edit_student_last_name").val(student.student_last_name);
                        //         $("#edit_student_grade").val(student.student_grade);
                        //         $("#edit_student_section").val(student.student_section);
                        //         $("#edit_student_photo_name").val(student.student_photo);
                        //         $("#edit_student_photo_preview").attr("src","../img/students/"+student.student_photo);
                        //         $("#edit_student_barangay").val(student.student_barangay);
                        //         $("#edit_student_city").val(student.student_city);
                        //         $("#edit_student_province").val(student.student_province);
                        //         $("#edit_student_email").val(student.student_email);
                        //         $("#edit_student_phone").val(student.student_phone);
                        //         $("#edit_student_rank").val(student.student_rank);
                        //         $("#edit_student_emergency_guardian").val(student.student_emergency_guardian);
                        //         $("#edit_student_emergency_guardian_phone").val(student.student_emergency_phone);
                        //         $("#edit_student_emergency_guardian_address").val(student.student_emergency_address);
                                
                        //         $("#edit_student_rank").removeAttr("disabled");
                        //         $("#confirm_edit_student").show();
                        //         $("#btn_cancel_edit").show();
                        //         $("#editStudentID").val(studentObject.studentID);
                        //         $("#editStudentModal").modal("toggle");
                        //     })
                        // )
                        .append(
                            $("<button class='btn btn-primary mx-2 text-white'><i class='bx bxs-report'></i> View</button>").click(()=>{
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
                                $("#edit_student_rank").val(student.student_rank);
                                $("#edit_student_emergency_guardian").val(student.student_emergency_guardian);
                                $("#edit_student_emergency_guardian_phone").val(student.student_emergency_phone);
                                $("#edit_student_emergency_guardian_address").val(student.student_emergency_address);

                                $("#student_photo_preview_rank").attr("src",`../img/students/${student.student_photo}`);
                                $("#student_id_rank").text(student.studentID);
                                $("#add_student_first_name_rank").text(`${student.student_first_name} ${student.student_middle_name} ${student.student_last_name}`);
                                
                                $("#edit_student_rank").attr("disabled","true");
                                $("#editStudentID").val(studentObject.studentID);
                                    // $("#confirm_edit_student").hide();
                                    // $("#addStudentModal").hide();
                                $("#editStudentModal").modal("toggle");
                            })
                        )
                    )
                );
                table_data_report.append(
                    $("<tr style='border:1px solid black'></tr>")
                    .append(
                        $("<td style='border:1px solid black'>"+(parseInt(student_index)+1)+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+studentObject.date_registered+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+studentObject.studentID+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+studentObject.student_first_name +" "+ studentObject.student_middle_name + " " +  studentObject.student_last_name+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+studentObject.student_grade+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+studentObject.student_section+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+studentObject.student_rank+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+studentObject.student_email+"</td>")
                    )
                );
            });
            refresh_count += 1;
            if(refresh_count < 2){
                new DataTable('#students_table',{dom:'ltrip'});
            }
                    });
            
        }

        $("#confirm_update_rank").click(()=>{
            if (window.confirm("Are you sure you want to update this student's rank?")) {
             var student_id_rank = $("#student_id_rank").text();
             var student_rank = $("#student_rank").val();
             $.post("../ajax.php",{action:"update_student_rank",studentID:student_id_rank,student_rank:student_rank},(student_id_rank_response)=>{
                if(student_id_rank_response.includes("200")){
                    alert("Student rank successfully updated!");
                    $("#manageRankModal").modal("hide");
                    getStudentsTable(false);
                }
                else{
                    alert("Student rank update failed!");
                    $("#manageRankModal").modal("hide");
                }
             });

            }
        });
        $("#search_button").click(()=>{
            var table_data = $("#table_data");
            var table_data_report = $("#table_data_printing");
            table_data.empty();
            getStudentsTable(true);
        });
        $("#btn_manage_rank").click(()=>{
            $("#editStudentModal").modal("hide");
            $("#manageRankModal").modal("show");
        });

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
      $("#print_table").click(()=>{
        //Immutable type 
        let students_table = $("#students_table_printing").clone();
        students_table.show();
        students_table.printThis({
                importCSS: false,
                header:
            "<h3 class='m-auto text-center'>LIST OF STUDENTS</h3>"+
                "<h6 class='m-auto text-center'>S.Y.  2024-2025</h6>"
            });
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