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
    <div class="d-flex justify-content-between bg-dark p-1" style="color:white;">
        
        <a href="/" class="col-2 hovering" style="display: block; background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
        </a>
        <div class="col-8 d-flex align-items-center justify-content-evenly">
            <h1>View Books</h1>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-evenly">
            <div type="button" class="btn btn-secondary py-3 m-2"><a href="/Logout.php" style="text-decoration: none; color:white;"> Log&nbspOut</a></div>
        </div>

    </div>

    <form action="/ViewStudentBooks.php" method="POST">
    <main style="display:flex; flex-wrap: nowrap;height: 75vh;height: -webkit-fill-available;max-height: 100vh;overflow-x: auto;overflow-y: hidden;" >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Student Section
</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/ViewStudentPersonalDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentPersonalDetails.php"></use></svg>
          Personal Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/ViewStudentPersonalMarks.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentPersonalMarks.php"></use></svg>
          Exam Marks
        </a>
      </li>

      <li>
        <a href="/ViewStudentPersonalFees.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentPersonalFees.php"></use></svg>
          View Fees
        </a>
      </li>
      <li>
        <a href="/ViewStudentBooks.php" class="nav-link active">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentBooks.php"></use></svg>
          View Books
        </a>
      </li>
      <li>
        <a href="/ViewStudentAttendence.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentAttendence.php"></use></svg>
          View Attendence
        </a>
      </li>

    </ul>
    <hr>
  </div>

    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="overflow: auto; white-space: nowrap; width: 1000px;">
        
    <?php
    $con=mysqli_connect("localhost","root","","authentication");
    session_start();
    $sql = "SELECT * FROM books";
    $res = mysqli_query($con, $sql);

    if($res = $con->query($sql)){ 
        if($res->num_rows > 0){ 
            echo "<table class='table'>"; 
                echo "<tr>"; 
                    echo "<th colspan='3' scope='col'>Book&nbspName </th>"; 
                    echo "<th colspan='3' scope='col'>Author&nbspName</th>";
                    echo "<th colspan='3' scope='col'>Book&nbspId</th>"; 
                    echo "<th colspan='3' scope='col'>Issue&nbspDate</th>"; 
                    echo "<th colspan='3' scope='col'>Return&nbspDate</th>";
                    echo "<th colspan='3' scope='col'>Fine</th>"; 
                echo "</tr>"; 
                
            while($row = $res->fetch_array()){
                if($row['UserName']==$_SESSION['Susername']){
                echo "<tr>"; 
                    echo "<td colspan='3' >" . $row['Name'] . "</td>";
                    echo "<td colspan='3' >" . $row['Author'] . "</td>"; 
                    echo "<td colspan='3' >" . $row['BookId'] . "</td>";
                    echo "<td colspan='3' >" . $row['IssueDate'] . "</td>";
                    echo "<td colspan='3' >" . $row['ReturnDate'] . "</td>";
                    echo "<td colspan='3' >" . $row['Fine'] . "</td>";
                echo "</tr>"; 
                }
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
    </main>
</form>

    <?PHP
    include('Footer.php')
?>
    