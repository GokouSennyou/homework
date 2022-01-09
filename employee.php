
<?php
include("template.php");
include("auth.php");
head("人員基本資料");
horizontal_bar($EmpName);
menu("人員基本資料 $EmpName ");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- jQuery v1.9.1 -->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- DataTables v1.10.16 -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <title>人員基本資料</title>
  </head>
  <body>

 <?php



?>


    <h1>人員基本資料維護</h1>

    <div class="container">

  <?php
  
  function display_form($op,$Empid)
  {

      if ($op==3)
      {
        $Empid="";
        $EmpName="";
        $JobTitle="";
        $DeptId="";
        $City="";
        $Address="";
        $Phone="";
        $ZipCode="";
        $MonthSalary="";
        $AnnualLeave="";
        $op=4;

      }
      else
      {
              include("connectdb.php");
              $sql = "SELECT Empid,EmpName,JobTitle,DeptId,City,Address,Phone,ZipCode,MonthSalary,AnnualLeave FROM employee where Empid='$Empid'";

              $result =$connect->query($sql);

              /* fetch associative array */
              if ($row = $result->fetch_assoc()) {
                  $Empid=$row['Empid'];
                  $EmpName=$row['EmpName'];
                  $JobTitle=$row['JobTitle'];
                  $DeptId=$row['DeptId'];
                  $City=$row['City'];
                  $Address=$row['Address'];
                  $Phone=$row['Phone'];
                  $ZipCode=$row['ZipCode'];
                  $MonthSalary=$row['MonthSalary'];
                  $AnnualLeave=$row['AnnualLeave'];
              }
                $op=2;
      }


      echo "<form action=employee.php method=post>";
      echo "<input type=hidden name=op value=$op>";
      echo "<div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>員工代號</label>
              <input type='text' class='form-control' name=Empid id='Empid' placeholder='請輸入員工代號' value=$Empid>
            </div>
            <div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>姓名</label>
              <input type='text' class='form-control' name=EmpName id='EmpName' placeholder='請輸入姓名' value=$EmpName>
            </div>
            <div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>現任職稱</label>
              <input type='text' class='form-control' name=JobTitle id='JobTitle' placeholder='請輸入現任職稱' value=$JobTitle>
            </div>
            <div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>部門代號</label>
              <input type='text' class='form-control' name=DeptId id='DeptId' placeholder='請輸入部門代號' value=$DeptId>
            </div>
            <div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>縣市</label>
              <input type='text' class='form-control' name=City id='City' placeholder='請輸入縣市' value=$City>
            </div>
            <div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>地址</label>
              <input type='text' class='form-control' name=Address id='Address' placeholder='請輸入地址' value=$Address>
            </div>
            <div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>電話</label>
              <input type='text' class='form-control' name=Phone id='Phone' placeholder='請輸入電話' value=$Phone>
            </div>
            <div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>郵遞區號</label>
              <input type='text' class='form-control' name=ZipCode id='ZipCode' placeholder='請輸入郵遞區號' value=$ZipCode>
            </div>
            <div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>月薪資</label>
              <input type='text' class='form-control' name=MonthSalary id='MonthSalary' placeholder='請輸入月薪資' value=$MonthSalary>
            </div>
            <div class='mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>年假天數</label>
              <input type='text' class='form-control' name=AnnualLeave id='AnnualLeave' placeholder='請輸入年假天數' value=$AnnualLeave>
            </div>"
            ;
      echo " <div class='col-auto'>
              <button type='submit' class='btn btn-primary mb-3'>儲存</button>           
              <button type='reset' class='btn btn-primary mb-3'>reset</button>                            
            </div>";
      echo "</form>";

  }


    if(isset($_REQUEST['op']))
    {
      $op=$_REQUEST['op'];   

      
      switch ($op)
      {
        case 1:  //修改
              $Empid=$_REQUEST['Empid']; 
               display_form($op,$Empid);
              break;      
        case 2:  //修改資料
              $Empid=$_REQUEST['Empid'];
              $EmpName=$_REQUEST['EmpName'];
              $JobTitle=$_REQUEST['JobTitle'];
              $DeptId=$_REQUEST['DeptId'];
              $City=$_REQUEST['City'];
              $Address=$_REQUEST['Address'];
              $Phone=$_REQUEST['Phone'];
              $ZipCode=$_REQUEST['ZipCode'];
              $MonthSalary=$_REQUEST['MonthSalary'];
              $AnnualLeave=$_REQUEST['AnnualLeave'];

                  $sql="update employee 
                          set Empid='$Empid',
                              EmpName='$EmpName',
                              JobTitle='$JobTitle',
                              DeptId='$DeptId',
                              City='$City',
                              Address='$Address',
                              Phone='$Phone',
                              ZipCode='$ZipCode',
                              MonthSalary='$MonthSalary',
                              AnnualLeave='$AnnualLeave'

                        where Empid='$Empid'";
                  include("connectdb.php");
                  include('dbutil.php');
                  execute_sql($sql);
              break;
        case 3: //新增
               $Empid="";
                display_form($op,$Empid);
              break;
        case 4: //新增資料
            $Empid=$_REQUEST['Empid'];
            $EmpName=$_REQUEST['EmpName'];
            $JobTitle=$_REQUEST['JobTitle'];
            $DeptId=$_REQUEST['DeptId'];
            $City=$_REQUEST['City'];
            $Address=$_REQUEST['Address'];
            $Phone=$_REQUEST['Phone'];
            $ZipCode=$_REQUEST['ZipCode'];
            $MonthSalary=$_REQUEST['MonthSalary'];
            $AnnualLeave=$_REQUEST['AnnualLeave'];

              $sql="insert into employee (Empid,EmpName,JobTitle,DeptId,City,Address,Phone,ZipCode,MonthSalary,AnnualLeave) values ('$Empid','$EmpName','$JobTitle','$DeptId','$City','$Address','$Phone','$ZipCode','$MonthSalary','$AnnualLeave')";
              include("connectdb.php");
              include('dbutil.php');
              execute_sql($sql);
              break;      
        case 5: //刪除資料              
              $Empid=$_REQUEST['Empid'];              
            
              $sql="delete from employee where Empid='$Empid'";
              include("connectdb.php");
              include('dbutil.php');
              execute_sql($sql);
              break;

      }      
  
    }
  ?>


    <p align=right>
    <a href=employee.php?op=3><button type='button' class='btn btn-success'>新增 <i class='bi bi-alarm'></i></button></a>  </p>
    <table class="example">
  	<thead>
  		<tr>
  			<td>員工代號</td>
             <td>員工名稱</td>
             <td>現任職稱</td>    
             <td>部門代號</td>
             <td>縣市</td>
             <td>地址</td>
             <td>電話</td>
             <td>郵遞區號</td>
             <td>月薪資</td>
             <td>年假天數</td>
             <td> edit</td>			
             <td> delete</td>			
  		</tr>
  	</thead>
  	<tbody>

    <?php


    
    include("connectdb.php");
    $sql = "SELECT Empid,EmpName,JobTitle,DeptId,City,Address,Phone,ZipCode,MonthSalary,AnnualLeave FROM employee";

    $result =$connect->query($sql);

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        //printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);
        $Empid=$row['Empid'];
        $EmpName=$row['EmpName'];
        $JobTitle=$row['JobTitle'];
        $DeptId=$row['DeptId'];
        $City=$row['City'];
        $Address=$row['Address'];
        $Phone=$row['Phone'];
        $ZipCode=$row['ZipCode'];
        $MonthSalary=$row['MonthSalary'];
        $AnnualLeave=$row['AnnualLeave'];
        echo "<tr><TD>$Empid<td> $EmpName<td>$JobTitle<td>$DeptId<td>$City<td>$Address<td>$Phone<td>$ZipCode<td>$MonthSalary<TD>$AnnualLeave";    
        echo "<TD><a href=employee.php?op=1&Empid=$Empid><button type='button' class='btn btn-primary'>修改 <i class='bi bi-alarm'></i></button></a>";
        echo "<TD><a href=\"javascript:if(confirm('確實要刪除[$EmpName]嗎?'))location='employee.php?Empid=$Empid&op=5'\"><button type='button' class='btn btn-danger'>刪除 <i class='bi bi-trash'></i></button>";
    }    

    
    ?>


</tbody>
  </table>


  </div>
  <script>
  	$( ".example" ).DataTable();
  </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
<?php
footer();
?>
</html>