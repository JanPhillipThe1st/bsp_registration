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
            <h3 class="m-auto text-center">LIST OF SCHOOL</h3>
            <br>
                <h6 class="m-auto text-center">S.Y.  2022-2023</h6>
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
                <option value="districtID">District</option>
                <option value="school_name">School Name</option>
                <option value="schoolID">School ID</option>
                <option value="school_address">Address</option>
            </select>       
        </div>
       <div class="col-3">
            <input type="text" class="form-control" id="search_text" placeholder="Enter keyword here"/>
        </div>
          <div class="col-3">
            <button class="btn btn-primary" id="search_schools">Search</button>
        </div>
    </div>
    <table class="table m-auto w-100 table-bordered table-rounded" id="schools_table">
        <thead class="bg-success text-white">
            <tr>
                <th >No.</th>
                <th >Date Registered</th>
                <th >School's I.D</th>
                <th >School's Name</th>
                <th >District</th>
                <th >School Address</th>
                <th >School's Contact No.</th>
                <th >School Coordinator</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody id="table_data">
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8"> 
                    <button class="btn btn-success btn-block" id="print_schools">Print</button>
                    <button class="btn btn-success btn-block" id="add_school">Add School</button>
                </td>
            </tr>
        </tfoot>
    </table>
   
    <table id="schools_table_printing" class="d-flex table-bordered table-rounded d-none">
    <thead class="bg-dark text-white">
            <tr style="border:1px solid black;">
                <th style='border:1px solid black'>No.</th>
                <th style='border:1px solid black'>Date Registered</th>
                <th style='border:1px solid black'>School's I.D</th>
                <th style='border:1px solid black'>School's name</th>
                <th style='border:1px solid black'>District</th>
                <th style='border:1px solid black'>School Address</th>
                <th style='border:1px solid black'>School's Contact No.</th>
                <th style='border:1px solid black'>School Coordinator</th>
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
                                    Date Registered:
                                    <strong id="school_date_registered"></strong>
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
                    <div class="row my-3">
                        <hr>
                        <h4 class="text-center text-black">School Coordinator Information</h4>
                        <div class="col-3 justify-items-center">
                            <h5 class="text-center">Coordinator Photo</h5>
                            <div class="row  m-auto">

                                <img src="../assets/img/BSPLogo.png" class="bg-secondary" alt="User Photo Thumbnail" id="school_coordinator_photo">
                            </div>
                            <h5 class="text-center">IT COORDINATOR ID</h5>
                            <h3 class="form-control text-center">120987</h3>
                        </div>
                        <div class="col-9">
                            <div class="row my-5">
                                <div class="col-2">
                                    <div class="row my-2">
                                        <h5 class="text-end">Full Name:</h5>
                                    </div>
                                    <div class="row my-2">
                                        <h5 class="text-end">Address:</h5>
                                    </div>
                                    <div class="row my-2">
                                        <h5 class="text-end">Contact:</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <h5 class="form-control" id="school_coordinator_full_name"></h5>
                                    </div>
                                    <div class="row">
                                        <h5 class="form-control" id="school_coordinator_address"></h5>
                                    </div>
                                    <div class="row">
                                        <h5 class="form-control" id="school_coordinator_contact"></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="editSchoolModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success m-auto">EDIT SCHOOL DETAILS</h5>
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
                                    Date Registered:
                                    <strong id="edit_school_date_registered"></strong>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>School ID:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="edit_school_id"></div>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>School Name:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="edit_school_name"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>District ID:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="edit_school_district_id"></div>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>School Tel. No.:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="edit_school_contact"></div>
                                    </div>
                                </div>
                            </div>  
                            <div class="row mt-3">
                                        <div class="col-3 align-middle"> <h5>School Address:</h5></div>
                                        <div class="col-9"><input type="text" class="form-control"  id="edit_school_address"></div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="addSchoolModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success m-auto">ADD SCHOOL</h5>
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
                                    Date Registered:
                                    <strong id="add_school_date_registered"></strong>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>School ID:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="add_school_id" ></div>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>School Name:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="add_school_name"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>District ID:</h5></div>
                                        <select class="col-6 form-control" name="add_school_district_id" id="add_school_district_id"></select>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-4 align-middle"> <h5>School Tel. No.:</h5></div>
                                        <div class="col-7"><input type="text" class="form-control"  id="add_school_contact"></div>
                                    </div>
                                </div>
                            </div>  
                            <div class="row mt-3">
                                        <div class="col-3 align-middle"> <h5>School Address:</h5></div>
                                        <div class="col-9"><input type="text" class="form-control"  id="add_school_address"></div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-bs-dismiss="modal" aria-label="Close" type="button" class="btn btn-secondary" >Close</button>
                <button id="confirm_add_school_button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<script src="../assets/jquery-3.6.1.min.js"></script>
<script src="../assets/js/printThis/printThis.js"></script>
<script>
     $(document).ready((e)=>{
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
        getSchools();
        function getSchools(){
         $.post("../ajax.php",{action:"get_schools_it_coordinator"},(data)=>{
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
                        $("<td>"+school.date_registered+"</td>")
                    )
                    .append(
                        $("<td>"+school.ID+"</td>")
                    )
                    .append(
                        $("<td>"+school.school_name+"</td>")
                    )
                    .append(
                        $("<td>"+school.district+"</td>")
                    )
                    .append(
                        $("<td>"+school.address+"</td>")
                    )
                    .append(
                        $("<td>"+school.contact+"</td>")
                    )
                    .append(
                        $("<td></td>")
                    )
                    .append(
                        $(`<td id='td-schools-${school.ID}'></td>`)
                        .append(
                            $("<button class='btn btn-warning mx-2 text-white'><i class='bx bxs-edit'></i> Edit</button>").click(()=>{
                                //Populate the input fields
                                $("#edit_school_date_registered").val(school.date_registered);
                                $("#edit_school_id").val(school.ID);
                                $("#edit_school_name").val(school.school_name);
                                $("#edit_school_district_id").val(school.district);
                                $("#edit_school_contact").val(school.address);
                                $("#edit_school_address").val(school.contact);
                                $("#editSchoolModal").modal("toggle");
                            })
                        )
                        .append(
                            $("<button class='btn btn-danger mx-2 text-white'><i class='bx bxs-trash'></i> Delete</button>").click(()=>{
                                if (window.confirm("Are you sure you want to delete "+school.school_name+"'s records?")) {
                                    // $.post("../ajax.php",{action:"delete_student",studentID:studentObject.studentID},(delete_response,delete_status)=>{
                                    //     window.location = "index.php?page=schools&message=Student Data Deleted Successfully!";
                                    // });
                                }
                            })
                        )
                        .append(
                                $(`<button id='btn-view-school${school.ID}' class='btn btn-primary mx-2 d-none text-white'><i class='bx bxs-report'></i> View</button>`).click(()=>{
                                 $.post("../ajax.php",{action:"get_school_coordinator",ID:school.school_coordinator_id},(school_coordinator_response)=>{
                                var school_coordinator_data =JSON.parse(school_coordinator_response);
                                
                                $("#school_coordinator_photo").attr("src","../img/users/"+school_coordinator_data.account_photo);
                                $("#school_id").val(school.ID);
                                $("#school_name").val(school.school_name);
                                $("#school_district_id").val(school.district);
                                $("#school_contact").val(school.contact);
                                $("#school_date_registered").text(school.date_registered);
                                $("#school_address").val(school.address);
                                $("#school_coordinator_full_name").text(school_coordinator_data.account_first_name +" " + school_coordinator_data.account_middle_name + " "+ school_coordinator_data.account_last_name);
                                $("#school_coordinator_address").text(school_coordinator_data.account_barangay +", " + school_coordinator_data.account_city + ", "+ school_coordinator_data.account_province);
                                $("#school_coordinator_contact").text(school_coordinator_data.account_phone);
                                $("#schoolDetailsModal").modal("toggle");
                                
                            });
                            })
                        )
                    ).hover(()=>{
                        $(`#btn-view-school${school.ID}`).removeClass("d-none");
                    }).on("mouseleave",()=>{
                        $(`#btn-view-school${school.ID}`).addClass("d-none");

                    })                 
                );
                table_data_printing.append(
                    $("<tr></tr>")
                    .append(
                        $("<td style='border:1px solid black'>"+(parseInt(sn_index)+1)+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+school.date_registered+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+school.ID+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+school.school_name+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+school.district+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+school.address+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'>"+school.contact+"</td>")
                    )
                    .append(
                        $("<td style='border:1px solid black'></td>")
                    )
                );
            });
            
        });       
        }
        $("#search_schools").click(()=>{
        let search_text = $("#search_text").val();
        let search_filter = $("#search_filter").val();
            $.post("../ajax.php",{action:"search_schools",search_text:search_text,search_filter:search_filter},(data)=>{
                let schools = JSON.parse(data);
                let table_data = $("#table_data");
                console.table(schools);
            table_data.empty();
            schools.forEach((school,sn_index)=>{ 
                table_data.append(
                    $("<tr></tr>")
                    .append(
                        $("<td>"+(parseInt(sn_index)+1)+"</td>")
                    )
                    .append(
                        $("<td>"+school.date_registered+"</td>")
                    )
                    .append(
                        $("<td>"+school.schoolID+"</td>")
                    )
                    .append(
                        $("<td>"+school.school_name+"</td>")
                    )
                    .append(
                        $("<td>"+school.districtID+"</td>")
                    )
                    .append(
                        $("<td>"+school.school_address+"</td>")
                    )
                    .append(
                        $("<td>"+school.school_contact+"</td>")
                    )
                    .append(
                        $("<td>"+school.school_coordinator_ID+"</td>")
                    ).click(()=>{

                        $.post("../ajax.php",{action:"get_school_coordinator",ID:school.school_coordinator_id},(school_coordinator_response)=>{
                            var school_coordinator_data =JSON.parse(school_coordinator_response);
                            
                            $("#school_coordinator_photo").attr("src","../img/users/"+school_coordinator_data.account_photo);
                            $("#school_id").val(school.ID);
                            $("#school_name").val(school.school_name);
                            $("#school_district_id").val(school.district);
                            $("#school_contact").val(school.contact);
                            $("#school_date_registered").val(school.date_registered);
                            $("#school_address").val(school.address);
                            $("#school_coordinator_full_name").text(school_coordinator_data.account_first_name +" " + school_coordinator_data.account_middle_name + " "+ school_coordinator_data.account_last_name);
                            $("#school_coordinator_address").text(school_coordinator_data.account_barangay +", " + school_coordinator_data.account_city + ", "+ school_coordinator_data.account_province);
                            $("#school_coordinator_contact").text(school_coordinator_data.account_phone);
                            $("#schoolDetailsModal").modal("toggle");
                            
                        });
                    })
                    
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
    $("#add_school").click(()=>{
        $("#addSchoolModal").modal("show");
        //Get all school districts as well
        $.post("../ajax.php",{action:"get_districts"},(data,status)=>{
            let school_districts = JSON.parse(data);
            school_districts.forEach((district)=>{
                $("#add_school_district_id").append(`<option value='${district.districtID}' >${district.district_number}</option>`);
            });
        });
        $("#confirm_add_school_button").click(()=>{
            if(window.confirm("Are you sure you want to add this school?")){
                let add_school_id = $("#add_school_id").val();
                let add_school_name = $("#add_school_name").val();
                let add_school_district_id = $("#add_school_district_id").val();
                let add_school_contact = $("#add_school_contact").val();
                let add_school_address = $("#add_school_address").val();
                $.post("../ajax.php",{action:"add_school",school_id:add_school_id,school_name:add_school_name,
                    school_district_id:add_school_district_id,school_contact:add_school_contact,school_address:add_school_address},(add_school_response)=>{
                        alert("School information successfully saved!");
                        getSchools();
                    });
            }
            else{
                $("#addSchoolModal").modal("hide");
            }   
        });
    });
    });
</script>