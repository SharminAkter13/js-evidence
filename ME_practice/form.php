<?php
session_start();
if(!isset($_SESSION['rename'])){
    header("Location:login.php");
    exit;
}
require_once('student.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $batch = $_POST['batch'];

    $id_valid = preg_match("/^[0-9]{2,6}$/", $id);
    $email_valid = preg_match("/^[a-zA-Z0-9_#%\-\.]+@[a-z]+\.[a-z]{2,3}$/", $email);

    
    if (!$id_valid && !$email_valid) {
        echo "<p style='color:red;'>ID and Email are Invalid</p>";
    } elseif (!$id_valid) {
        echo "<p style='color:red;'>ID is Invalid</p>";
    } elseif (!$email_valid) {
        echo "<p style='color:red;'>Email is Invalid</p>";
    } else {
        $student = new Student($id, $name, $email, $batch);
        $student->dstore();
        echo "<h3 style='color:green; text-align: center;'>Student Details Saved</h3>";
    }
} else {
    echo "<h3 style='color:red; text-align: center;'>Student Data not found</h3>";
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Cache-Control" content="no-store" />

    <title>OOP FORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <style>
       body{
        margin: 0;
        background: #f0f4f0;
        padding:20px;
        padding-top: 70px;
       } 
       .container{
        display: flex;
        justify-content: space-around;
        gap:30px;
        flex-wrap: wrap;
    }
    .form-box, .table-box{
        background:#fff;
        padding: 20px;
        border-radius:8px;
        box-shadow:0 2px 8px black;
        flex: 1 1 400px;
    }
    .form-box{
        height: 520px;
    }
     legend{
        font-size: 1.5rem;
        margin-bottom: 10px;
        text-align: center;
        font-weight: bold;
     }

     input[type='number'],input[type='email'],input[type='text'],input[type='submit']{
        width: 100%;
        padding:10px;
        margin-top:9px;
        margin-bottom:15px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 1rem;
     }

     input[type='submit']{
        background:linear-gradient(90deg,#667eea,#764ba2);
        color: white;
        border:none;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
     }
     input[type='submit']:hover{
        background:linear-gradient(90deg,#764ba2,#667eea);

     }

     table{
        width: 100%;
        border-collapse: collapse;
        margin-top:10px;
     }

     th,td{
        padding: 12px 15px;
        text-align: center;
        border:1px solid black;
     }
     th{
        background-color: #667eea;
        color: white;
        font-weight: bold;

     }
      .navbar {
    background: rgba(102, 126, 234, 0.5)!important;
    }
    
    </style>
</head>
<body>
  <nav class="navbar bg-body-tertiary bg-primary-subtle fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bolder" href="file_upload.php">Student System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Student System</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="file_upload.php">File Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form.php">Student Form</a>
          </li>
          <li class="nav-item">

            <a class="nav-link" href="login.php">Login</a>
          </li>
        
        <li class="nav-item">

            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        
      </div>
    </div>
  </div>
</nav>

<div class="container">
    <div class="form-box">
        <form action="#" method="post">
            <fieldset>
                <legend>STUDENT FORM</legend>
                Student ID:
                <input type="number" name="id" placeholder="Enter ID">

                Student Name:
                <input type="text" name="name" placeholder="Enter Name">

                Student Email:
                <input type="email" name="email" placeholder="Enter Email">

                Student Batch:
                <input type="text" name="batch" placeholder="Enter Batch">

                <input type="submit" name="submit" value="Submit">
            </fieldset>
        </form>
    </div>
    <div class="table-box">
        <?php
        Student::result();
        ?>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>