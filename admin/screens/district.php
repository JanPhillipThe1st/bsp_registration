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
                <option value="district_1">District 1</option>
                <option value="district_2">District 2</option>
                <option value="district_3">District 3</option>
            </select>
        </div>
        <div class="col-4"></div>
    </div>
    <table class="table m-auto w-75 table-bordered table-rounded">
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
                <td colspan="3"> <button class="btn btn-success">Print</button></td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="../assets/jquery-3.6.1.min.js"></script>
<script>
     $(document).ready(()=>{
        //first define an array of school years
        var school_name_map = ["BALANGASAN ELEMENTARY SCHOOL","CAMP ABELON ELEMENTARY SCHOOL","STA. LUCIA ELEMENTARY SCHOOL",
        "NAPOLAN NATIONAL HIGH SCHOOL","BOMBA NATIONAL HIGH SCHOOL","BALANGASAN ELEMENTARY SCHOOL"];
        var table_data = $("#table_data");
        table_data.empty();
        school_name_map.forEach((school_name,sn_index)=>{
            table_data.append(
                $("<tr></tr>")
                .append(
                    $("<td>"+(parseInt(sn_index)+1)+"</td>")
                )
                .append(
                    $("<td>"+school_name+"</td>")
                ).click(()=>{
                    alert(school_name+" selected.");
                })
            );
        });
    });
</script>