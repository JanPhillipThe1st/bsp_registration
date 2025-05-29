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
        <select class="form-control" name="select_account_filter" id="select_account_filter">
                <option value="display_all_filter">ALL</option>
            </select>
        </div>
        <div class="col-4"></div>
    </div>
    <table class="table m-auto w-75 table-bordered table-rounded">
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
        //first define an array of users
        var user_accounts_map = [
            {dor:"08/10/2022",user_id:"234-098",user_type:"Admin",user_account:"CRUZ, JANE O.",address:"NAPOLAN, PAGADIAN CITY, ZDS",email:"jane@gmail.com",phone:"09472018394"},
            {dor:"08/10/2022",user_id:"100",user_type:"IT Coordinator",user_account:"LUMAAD, JOEL SARAJENA",address:"BOMVA, PAGADIAN CITY, ZDS",email:"joel@gmail.com",phone:"09867492019"},
            {dor:"08/10/2022",user_id:"456",user_type:"School Coordinator",user_account:"NANO, EFREN M.",address:"SAN JOSE, PAGADIAN CITY, ZDS",email:"fren@gmail.com",phone:"09867492019"},
        ];
        var table_data = $("#table_data");
        table_data.empty();
        user_accounts_map.forEach((user_account,account_index)=>{
            table_data.append(
                $("<tr></tr>")
                .append(
                    $("<td>"+(parseInt(account_index)+1)+"</td>")
                )
                .append(
                    $("<td>"+user_account.dor+"</td>")
                )
                .append(
                    $("<td>"+user_account.user_id+"</td>")
                )
                .append(
                    $("<td>"+user_account.user_type+"</td>")
                )
                .append(
                    $("<td>"+user_account.user_account+"</td>")
                )
                .append(
                    $("<td>"+user_account.address+"</td>")
                )
                .append(
                    $("<td>"+user_account.email+"</td>")
                )
                .append(
                    $("<td>"+user_account.phone+"</td>")
                )
                .click(()=>{
                    alert(user_account.user_account+" selected.");
                })
            );
        });
    });
</script>