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
            <h3 class="m-auto text-center">LIST OF DISTRICTS</h3>
            <br>
                <h6 class="m-auto text-center">S.Y.  2022-2023</h6>
        </div>
        <div class="col-4"></div>
    </div>
    <br>
    <div class="row my-3">
        <div class="col-2">
        </div>
        <div class="col-2">
            <h4 class="text-end">Search by:</h4>
        </div>
        <div class="col-4">
        <select class="form-control" name="select_district" id="select_district">
                <option value="1">District 1</option>
                <option value="2">District 2</option>
            </select>
        </div>
        <div class="col-4">
            <button class="btn btn-success" id="btn_manage_districts">Manage Districts</button>
        </div>
    </div>
    <table class="table m-auto w-75 table-bordered table-rounded" id="schools_table">
        <thead class="bg-success text-white">
            <tr>
                <th>#</th>
                <th>School name</th>
            </tr>
        </thead>
        <tbody id="table_data">
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"> <button class="btn btn-success" id="print_schools">Print</button></td>
            </tr>
        </tfoot>
    </table>
   
    <table id="schools_table_printing" class=" w-100 table-bordered table-rounded d-none">
    <thead class="bg-dark text-white">
            <tr style="border:1px solid black;">
                <th style='border:1px solid black'>#</th>
                <th style='border:1px solid black'>School name</th>
            </tr>
        </thead>
        <tbody id="table_data_printing">
        </tbody>
    </table>
</div>

<div class="modal fade " id="schoolDetailsModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success m-auto">SCHOOL DETAILS</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row ">
                                <p class="text-end">
                                    Date of registration:
                                    <strong id="school_date_registered">09-06-2024</strong>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>School ID:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="school_id" disabled></div>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>School Name:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="school_name" disabled></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>District ID:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="school_district_id" disabled></div>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>School Tel. No.:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="school_contact" disabled></div>
                                    </div>
                                </div>
                            </div>  
                            <div class="row mt-3">
                                        <div class="col-3 align-middle"> <h5>School Address:</h5></div>
                                        <div class="col-9"><input type="text" class="form-control"  id="school_address" disabled></div>                                        
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-8"></div>
                        <div class="col-4"> <button class="btn btn-success" id="btn_view_students">View Students</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="addDistrictModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success m-auto">District Details</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>District Number:</h5></div>
                                        <div class="col-7"><input type="number" class="form-control"  id="add_district_id"></div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-10"></div>
                        <div class="col-2"> <button class="btn btn-success w-100" id="btn_save_district">Save District</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/jquery-3.6.1.min.js"></script>
<script src="../assets/js/printThis/printThis.js"></script>
<script>
     $(document).ready(()=>{
        let existingDistrictNumbers = [1,2,3];
        $.post("../ajax.php",{action:"get_districts"},(districtJSON)=>{
                $("#select_district").empty();
                existingDistrictNumbers = [];
                JSON.parse(districtJSON).forEach((district)=>{
                    $("#select_district").append(`<option value="${district.district_number}">District ${district.district_number}</option>`);
                    existingDistrictNumbers.push(district.district_number);
            });
        });
        $("#print_schools").click(()=>{
            alert("Printing...");
            // $("#schools_table").remove("tfoot").printThis();
            $("#schools_table_printing").printThis({
                importCSS: false,
                header:
            "<h3 class='m-auto text-center'>LIST OF DISTRICT "+$("#select_district").val()+" SCHOOLS</h3>"+
                "<h6 class='m-auto text-center'>S.Y.  2022-2023</h6>"
            });
        });
        $("#btn_manage_districts").click(()=>{
            $("#add_district_id").val(parseInt(existingDistrictNumbers[existingDistrictNumbers.length-1])+1);
            $("#addDistrictModal").modal("toggle");
            $("#btn_save_district").click(()=>{
                if(confirm("Are you sure you want to save this district number?")){
                    let add_district_id = parseInt($("#add_district_id").val());

                    //First check if district already exists...
                        if (existingDistrictNumbers.includes(add_district_id)) {   
                            alert("District "+add_district_id+" already exists!");
                            $("#add_district_id").val(add_district_id+1);
                            return;
                        }
                        else{   
                            $.post("../ajax.php",{action:"add_district",district_number:add_district_id},(a)=>{
                                alert("District "+a+" saved successfully!");
                                $("#addDistrictModal").modal("toggle");
                                location.reload();
                            });
                        }
                }
                else{
                    $("#addDistrictModal").modal("toggle");

                }
            });
        });
        $.post("../ajax.php",{action:"get_schools"},(data)=>{
            var school_map = JSON.parse(data);
            var table_data = $("#table_data");
            var table_data_printing = $("#table_data_printing");
            table_data.empty();
            school_map.forEach((school,sn_index)=>{
                table_data.append(
                    $("<tr></tr>")
                    .append(
                        $("<td>"+(parseInt(sn_index)+1)+"</td>")
                    )
                    .append(
                        $("<td>"+school["school_name"]+"</td>")
                    ).click(()=>{
                        $.post("../ajax.php",{action:"get_school_by_id",ID:school.ID},(school_coordinator_response)=>{
                            var school =JSON.parse(school_coordinator_response);
                            console.table(school);
                            $("#school_id").val(school.ID);
                            $("#school_name").val(school.school_name);
                            $("#school_district_id").val(school.district);
                            $("#school_contact").val(school.school_contact);
                            $("#school_date_registered").val(school.date_registered);
                            $("#school_address").val(school.school_address);
                          $("#schoolDetailsModal").modal("toggle");
                          $("#btn_view_students").click((e)=>{
                              $("#schoolDetailsModal").modal("toggle");
                            var content = $("#content");
                            content.load("screens/students.php?schoolID="+school.ID);
                          });
                        });
                        })
                );
                table_data_printing.append(
                    $("<tr></tr>")
                    .append(
                        $("<td style='border:1px solid black'>"+(parseInt(sn_index)+1)+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+school["school_name"]+"</td>")
                    )
 
                );
            });
            
        });
        $("#select_district").on("change",(e)=>{
            $.post("../ajax.php",{action:"get_schools_by_district",districtID:e.target.value},(data)=>{
            var school_map = JSON.parse(data);
            var table_data = $("#table_data");
            table_data.empty();
            school_map.forEach((school,sn_index)=>{
                table_data.append(
                    $("<tr></tr>")
                    .append(
                        $("<td>"+(parseInt(sn_index)+1)+"</td>")
                    )
                    .append(
                        $("<td>"+school["school_name"]+"</td>")
                    )
                );
            });
        });
        });
    });
</script>