<?php

session_start();
if(isset($_SESSION['EmpId']))
{
        $EmpId=$_SESSION['EmpId'];
        $DeptId=$_SESSION['DeptId'];
        $EmpName=$_SESSION['EmpName'];
        $JobTitle=$_SESSION['JobTitle'];
}
else
    {
        include('basic.php');
        switchto("index.php");
    }



?>