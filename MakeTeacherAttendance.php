<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
</head>
<body>
  <?php
  if(isset($_POST['Filter']))
  {
    
  }else{
    if(isset($_POST['confirm'])){
    if($_POST['confirm']=='Confirm'){
        $con=mysqli_connect("localhost","root","","authentication");
        $sql = "SELECT * FROM teacher_attendance_temp";
        $res = mysqli_query($con, $sql);
        if($res->num_rows > 0){
          while($row = $res->fetch_array()){ 
            if(isset($_POST["sta-".$row['UserName']])){
                $sql2="INSERT INTO `teacher_attendance`
                (`Fname`, `Mname`, `Lname`, `Brunch`, `UserName`, `Date`,`Status`)
                VALUES ('".$row['Fname']."','".$row['Mname']."','".$row['Lname']."','".$row['Brunch']."','".$row['UserName']."','".date('Y-m-d')."','".$_POST["sta-".$row['UserName'].'']."')";                    
                $req = mysqli_query($con, $sql2);

                $sql3="DELETE FROM `teacher_attendance_temp` WHERE UserName='".$row['UserName']."' ";                    
                $req = mysqli_query($con, $sql3);
            }
            } 
        }
            
            // header('Location: ViewStudentsAccount.php');
        }else{
            echo '<div class="p-2 d-flex justify-content-center bg-danger" style="color: white;">';
                echo "<div class='col-2'><h5>Type&nbsp'Confirm'&nbspto&nbspcontinue!</h5></div>";
            echo '</div>';
        }
    
    }}
    ?>
    <div class="d-flex justify-content-between bg-dark p-1" style="color:white;">
        
        <a href="/" class="col-2 hovering" style="display: block; background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
        </a>
        <div class="col-8 d-flex align-items-center justify-content-evenly">
            <h1>Enter Attandence</h1>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-evenly">
            <div type="button" class="btn btn-secondary py-3 m-2"><a href="/Logout.php" style="text-decoration: none; color:white;"> Log&nbspOut</a></div>
        </div>

    </div>

    <form action="/MakeTeacherAttendance.php" method="POST">
    <main style="display:flex; " >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">HR Section</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/ViewTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherDetails.php"></use></svg>
          View Teacher Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/InputTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputTeacherDetails.php"></use></svg>
          Input Teacher Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/UpdateTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeacherDetails.php"></use></svg>
          Update Teacher Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/MakeTeacherAttendance.php" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/MakeTeacherAttendance.php"></use></svg>
          Teacher Attendance
        </a>
      </li>
      <li class="nav-item">
        <a href="/DeleteTeacher.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteTeacher.php"></use></svg>
          Delete Teacher Details
        </a>
      </li>
      <hr>
      <li>
        <a href="/ViewStudentDetails.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentDetails.php"></use></svg>
          View Students Details
        </a>
      </li>
      <li>
        <a href="/InputStudentDetails.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentDetails.php"></use></svg>
          Input Students Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/UpdateStudentDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateStudentDetails.php"></use></svg>
          Update Students Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/DeleteStudent.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteStudent.php"></use></svg>
          Delete Students Details
        </a>
      </li>
      <hr>
      <li>
        <a href="/ViewAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewAccountant.php"></use></svg>
          View Accountant Details
        </a>
      </li>
      <li>
        <a href="/InputAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputAccountant.php"></use></svg>
          Input Accountant Details
        </a>
      </li>
      <li>
        <a href="/UpdateAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateAccountant.php"></use></svg>
          Update Accountant Details
        </a>
      </li>
      <li>
        <a href="/DeleteAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteAccountant.php"></use></svg>
          Delete Accountant Details
        </a>
      </li>
      <hr>
      <li>
        <a href="/ViewLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewLibrarian.php"></use></svg>
          View Librarian Details
        </a>
      </li>
      <li>
        <a href="/InputLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputLibrarian.php"></use></svg>
          Input Librarian Details
        </a>
      </li>
      <li>
        <a href="/UpdateLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateLibrarian.php"></use></svg>
          Update Librarian Details
        </a>
      </li>
      <li>
        <a href="/DeleteLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteLibrarian.php"></use></svg>
          Delete Librarian Details
        </a>
      </li>
      
    </ul>
    <hr>
  </div>

    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="overflow: auto; white-space: nowrap; width: 1000px;">
    <form action="MakeTeacherAttendance.php" method="POST">
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light " style="width: 1000px;">
      <div class="row">
        <div class="col">
        <h5>Filter Teachers</h5>
        </div>
          <div class="col">
              <input type="text" name="Brunch" class="form-control" placeholder="Branch">
          </div>
          <div class="col">
              <input type="text" name="Semester" class="form-control" placeholder="Semester">
          </div>
          <div class="col">
              <input type="text" name="Year" class="form-control" placeholder="Year">
          </div>
          <div class="col">
            <input class="col btn btn-primary"  name="Filter" type="submit" value="Filter">
          </div>
      </div>
    </form>

    <?php
    $con=mysqli_connect("localhost","root","","authentication");
    if(empty($_GET['PageNo'])){
        $_GET['PageNo']=1;
    }
    $page_number=$_GET['PageNo'];
    $limit=7;
    $initial_page=$initial_page = ($page_number-1) * $limit; ;
    if(isset($_POST['Brunch'])){
    if($_POST['Brunch']!='' && $_POST['Semester']!='' && $_POST['Year']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Brunch='".$_POST['Brunch']."' and Semester='".$_POST['Semester']."' and Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Brunch']!='' && $_POST['Semester']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Brunch='".$_POST['Brunch']."' and Semester='".$_POST['Semester']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Semester']!='' && $_POST['Year']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Semester='".$_POST['Semester']."' and Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Brunch']!='' && $_POST['Year']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Brunch='".$_POST['Brunch']."' and Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Brunch']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Brunch='".$_POST['Brunch']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Semester']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Semester='".$_POST['Semester']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Year']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
    }
    else{
      
      $sql = "SELECT * FROM teacher_attendance_temp  LIMIT " . $initial_page . ',' . $limit;
    }}else{
      $sql = "SELECT * FROM teacher_attendance_temp  LIMIT " . $initial_page . ',' . $limit;
    }

    $res = mysqli_query($con, $sql);
    $row_number=7*($page_number-1);
    if($res = $con->query($sql)){ 
        if($res->num_rows > 0){ 
            echo "<table class='table table-striped mt-1'>"; 
                echo "<tr>"; 
                    echo "<th colspan='3' scope='col'>First&nbspname </th>"; 
                    echo "<th colspan='3' scope='col'>Middle&nbspname</th>";
                    echo "<th colspan='3' scope='col'>Last&nbspname</th>";  
                    echo "<th colspan='3' scope='col'>Branch </th>";
                    echo "<th colspan='3' scope='col'>Date </th>";
                    echo "<th colspan='3' scope='col'>Month </th>";
                    echo "<th colspan='3' scope='col'>Year </th>";
                    echo "<th colspan='3' scope='col'>Status </th>";
                    echo "<th colspan='3' scope='col'>Accept As </th>";
                echo "</tr>"; 
                
            while($row = $res->fetch_array()){ 
                echo "<tr>"; 
                    echo "<td colspan='3' >" . $row['Fname'] . "</td>";
                    echo "<td colspan='3' >" . $row['Mname'] . "</td>"; 
                    echo "<td colspan='3' >" . $row['Lname'] . "</td>";
                    echo "<td colspan='3' >" . $row['Brunch'] . "</td>";
                    echo "<td colspan='3' >" . date("D") . "</td>";
                    echo "<td colspan='3' >" . date("M") . "</td>";
                    echo "<td colspan='3' >" . date("Y") . "</td>";
                    echo "<td colspan='3' >" . $row['Status'] . "</td>";
                    echo "<td colspan='3' >
                    <select name='sta-".$row['UserName']."' class='form-select'>
                        <option value='P'>Present</option>
                        <option value='EL'>EL</option>
                        <option value='CL'>CL</option>
                        <option value='SL'>SL</option>
                        <option value='ML'>ML</option>
                        <option value='PL'>PL</option>
                        <option value='LOPL'>LOPL</option>
                    </select>
                    </td>";
                echo "</tr>";
                $row_number+=1;
            } 
            echo "</table>"; 
            $res->free(); 
        } else{ 
        $messagee = "No matching records are found.";
        echo "<script type='text/javascript'> alert('$messagee'); </script> " . mysqli_error($con);
        } 
    } else{ 
        $messagee = "ERROR: Could not able to execute $sql. ";
        echo "<script type='text/javascript'> alert('$messagee'); </script> " . mysqli_error($con);
    }  
    $con->close();
    ?>
    
    <div class="mt-1">
      <?php
    echo"    <nav aria-label='Page navigation example' class='d-flex justify-content-center'>";
    echo"      <ul class='pagination'>";
    echo"        <li class='page-item'>";
    echo"          <a class='page-link' href='Attandence.php?PageNo=".($page_number-1)."' aria-label='Previous'>";
    echo"            <span aria-hidden='true'>&laquo;</span>";
    echo"            <span class='sr-only'>Previous</span>";
    echo"          </a>";
    echo"        </li>";
    echo"        <li class='page-item'>";
    echo"          <a class='page-link' href='Attandence.php?PageNo=".($page_number+1)."' aria-label='Previous'>";
    echo"            <span class='sr-only'>Next</span>";
    echo"            <span aria-hidden='true'>&raquo;</span>";
    echo"          </a>";
    echo"        </li>";
    echo"      </ul>";
    echo"    </nav>";
  ?>
    <input type="text" class="form-control" name="confirm" id="inputPassword2" placeholder='Type "Confirm" to continue'>
    </div>
    <input class="btn btn-primary mt-3 p-2"  type="submit" value="Submit">
    </div>
    </main>
</form>

<?PHP
    include('Footer.php')
?>
    