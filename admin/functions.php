<?php
function getBranches(){
    include "include/dbconfig.php";
    
    $sql = "SELECT * FROM `branches`";
    $res = mysqli_query($conn, $sql);
    $option = '';
    while($row = mysqli_fetch_assoc($res)){
        $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    
    return  $option;

}
function getEmployeeById($id){
    include "include/dbconfig.php";
   
    $sql = "SELECT * FROM `employees` WHERE `id`='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    return  $row;

}
function getBranchesById($id){
    include "include/dbconfig.php";
   
    $sql = "SELECT * FROM `branches` WHERE `id`='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    return  $row;

}

function printValue($value){
    echo isset($value) ? $value : "" ;
}

?>