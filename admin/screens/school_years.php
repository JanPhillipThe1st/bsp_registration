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
        background-color: rgb(61, 199, 56);
        color: white;
    }
</style>
<div class="container-fluid">
    <table class="table m-auto w-50 table-bordered table-rounded">
        <thead class="bg-success text-white">
            <tr>
                <th>#</th>
                <th>School year</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table_data">
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"> <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSchoolYearModal">New School Year</button></td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="editSchoolYearModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Edit School Year</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                        <input type="hidden" name="edit_school_year_id" id="edit_school_year_id">
                      <label for="school_year_from">From</label>
                      <input type="number" name="edit_school_year_from" id="edit_school_year_from" class="form-control" placeholder="" aria-describedby="helpId">
                      <label for="edit_school_year_to">To</label>
                      <input type="number" name="edit_school_year_to" id="edit_school_year_to" class="form-control" placeholder="" aria-describedby="helpId">
                      <label for="edit_school_year_term">Term</label>
                      <select name="edit_school_year_term" id="edit_school_year_term" class="form-control">
                        <option value="1">1st semester</option>    
                        <option value="2">2nd semester</option>    
                        <option value="summer">Summer</option>    
                    </select>   
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_update_school_year">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteSchoolYearModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title text-secondary">Delete School Year</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <input type="hidden" id="delete_school_year_id">
                    <h3 class="h3 text-danger">Are you sure you want to delete this school year?</h3>
                    <h5 class="h5 text-danger">All the data associated data will be lost.</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="btn_delete_school_year">Delete</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addSchoolYearModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Add new school year</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                      <label for="school_year_from">From</label>
                      <input type="number" name="school_year_from" id="school_year_from" class="form-control" placeholder="" aria-describedby="helpId">
                      <label for="school_year_to">To</label>
                      <input type="number" name="school_year_to" id="school_year_to" class="form-control" placeholder="" aria-describedby="helpId">
                      <label for="school_year_term">Term</label>
                      <select name="school_year_term" id="school_year_term" class="form-control">
                        <option value="1">1st semester</option>    
                        <option value="2">2nd semester</option>    
                        <option value="summer">Summer</option>    
                    </select>   
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_save_school_year">Save</button>
            </div>
        </div>
    </div>
</div>




<script src="../assets/js/jquery-3.6.1.min.js"></script>
<script  src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script>
     $(document).ready(()=>{
        //first define an array of school years
        //Call to ajax.php 
        getSchoolYears() ;
        function getSchoolYears() {
            $.post("../ajax.php",{action:"get_school_years"},(data,status)=>{
                var table_data = $("#table_data");
            table_data.empty();
            school_year_map =JSON.parse(data);  
            school_year_map.forEach((school_year,sy_index)=>{
                table_data.append(
                    $("<tr></tr>")
                    .append(
                        $("<td>"+(parseInt(sy_index)+1)+"</td>")
                    )
                    .append(
                        $(`<td>${school_year.school_year_start} - ${school_year.school_year_end}</td>`)
                    )
                    .append(
                        $(`<td>${school_year.semester=="1"?"1st semester":school_year.semester==2?"2nd semester":"summer"}</td>`)
                    )
                    .append(
                        $("<td class='td'></td>")
                        .append($("<button class='btn btn-warning mx-3'>"+
                        "<i class='bx bxs-edit'></i>"
                        +"</button>").click(()=>{
                            $("#edit_school_year_from").val(`${school_year.school_year_start}`);
                            $("#edit_school_year_to").val(`${school_year.school_year_end}`);
                            $("#edit_school_year_term").val(`${school_year.semester}`);
                            $("#edit_school_year_id").val(`${school_year.ID}`);
                            $("#editSchoolYearModal").modal("toggle");
                        })
                        )
                        .append($("<button class='btn btn-danger mx-3'>"+
                        "<i class='bx bxs-trash'></i>"
                        +"</button>").click(()=>{
                            $("#delete_school_year_id").val(`${school_year.ID}`);
                            $("#deleteSchoolYearModal").modal("toggle");
                        })
                        )
                    )
                );
            });
        });
        }
        $("#btn_delete_school_year").on("click",(event_data)=>{
            let delete_school_year_id = $("#delete_school_year_id").val();
            //Show school year deletion loading
            $("#btn_delete_school_year").html(`<div class="spinner-border text-white" role="status"></div>`);
            //Create delete request
            $.post("../ajax.php",{action:"delete_school_year",school_year_id:delete_school_year_id},(data,status)=>{
                   if(data.includes("200")){
                        alert("School year successfully deleted!");
                    }
                    else if(data.includes("500")){
                        alert("Internal Server error");
                    }
                            $("#deleteSchoolYearModal").modal("toggle");
                    
                getSchoolYears();
                $("#btn_delete_school_year").html(`Delete`);
            }).fail((err)=>{
                console.log(err);
                alert("data deletion fail!");
            });
        });
        
        $("#btn_update_school_year").on("click",(event_data)=>{
            let edit_school_year_from = $("#edit_school_year_from").val();
            let edit_school_year_to = $("#edit_school_year_to").val();
            let edit_school_year_term = $("#edit_school_year_term").val();
            let school_year_id = $("#edit_school_year_id").val();
            //Show school year deletion loading
            $("#btn_update_school_year").html(`<div class="spinner-border text-white" role="status"></div>`);
            $.post("../ajax.php",{action:"update_school_year",school_year_start:edit_school_year_from,
                school_year_end:edit_school_year_to,semester:edit_school_year_term,school_year_id:school_year_id},
                (data,status)=>{
                    if(data.includes("200")){
                        alert("School year successfully updated!");
                    }
                    else if(data.includes("500")){
                        alert("Internal Server error");
                    }
                            $("#editSchoolYearModal").modal("toggle");
                            getSchoolYears() ;
                    $("#btn_update_school_year").html(`Save`);
                }
            );
        });
        $("#btn_save_school_year").on("click",(event_data)=>{
            var school_year_from = $("#school_year_from").val();
            var school_year_to = $("#school_year_to").val();
            var semester = $("#school_year_term").val();
            if (window.confirm("Are you sure you want to add this record?")) {
                $.post("../ajax.php",{action:"add_school_year",school_year_from:school_year_from,school_year_to:school_year_to,semester:semester},(data)=>{
                    $("#addSchoolYearModal").modal("hide");
                    alert("School year successfully saved!");
                    getSchoolYears();
                });
            }
        });
    });
</script>