<?php  
require 'conn.php';

function validate($inputData)
{
    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}
function GetData($table)
{
    global $conn;
    $sql = "SELECT * FROM $table"; 
        return mysqli_query($conn, $sql);  
}

function checkId($paramType){

    if(isset($_GET[$paramType]))
    {
        if($_GET[$paramType] != null){
            return $_GET[$paramType];
        }else{
            return 'Id Not Found';
        }
    }else{
        return 'No Id Given';
    }
}



















?>