<?php
function getBranches($id = null){
    include "include/dbconfig.php";
    
    $sql = "SELECT * FROM `branches`";
    $res = mysqli_query($conn, $sql);
    $option = '';
    while($row = mysqli_fetch_assoc($res)){
        if($id && $row['id'] == $id){
            $option .= '<option value="'.$row['id'].'" selected>'.$row['name'].'</option>';
        }else{
            $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';  
        }
       
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
function getInstitutesById($id){
    include "include/dbconfig.php";
   
    $sql = "SELECT * FROM `institutes` 
            INNER JOIN  `users` 
            ON `institutes`.id = `users`.org_id
            WHERE `institutes`.`id`='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    return  isset($row) ? $row : null;
}

function printValue($value){
    echo isset($value) ? $value : "" ;
}

?>