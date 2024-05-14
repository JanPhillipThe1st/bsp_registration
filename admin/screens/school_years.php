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
    </table>
</div>
<script src="../assets/jquery-3.6.1.min.js"></script>
<script>
     $(document).ready(()=>{
        //first define an array of school years
        var school_year_map = ["2023-2024","2022-2023","2021-2022","2020-2021","2019-2020"];
        var table_data = $("#table_data");
        table_data.empty();
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
                        alert("You clicked school year: " + school_year);
                    })
                )
                )
            );
        });
    });
</script>