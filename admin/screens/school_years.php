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
<div class="modal fade" id="confirmSchoolYearEditing" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">School Year Selection</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Are you sure you want to work on this school year?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                <button type="button" class="btn btn-primary" id="btn_select_school_year">Yes</button>
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


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Add rows here
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<script src="../assets/jquery-3.6.1.min.js"></script>
<script>
     $(document).ready(()=>{
        //first define an array of school years
        var school_year_map = ["2023-2024","2022-2023","2021-2022","2020-2021","2019-2020"];
        //Call to ajax.php 
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
                        $("<td>"+school_year+"</td>")
                    )
                    .append(
                        $("<td></td>").append($("<button class='btn btn-warning'>"+
                        "<i class='bx bxs-edit'></i>"
                        +"</button>").click(()=>{
                            $("#confirmSchoolYearEditing").modal("toggle");
                        })
                    )
                    )
                );
            });
        });
        $("#btn_save_school_year").on("click",(event_data)=>{
            var school_year_from = $("#school_year_from").val();
            var school_year_to = $("#school_year_to").val();
            if (window.confirm("Are you sure you want to add this record?")) {
                $.post("../ajax.php",{action:"add_school_year",school_year_from:school_year_from,school_year_to:school_year_to},(data)=>{
                    $("#addSchoolYearModal").modal("toggle");
                });
            }
        });
    });
</script>