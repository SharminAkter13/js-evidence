<?php
session_start();
if(!isset($_SESSION['rename'])){
    header("Location:login.php");
    exit;
}


if(isset($_POST['submit'])){
    $img ="uploads/";
    $uploadedFiles =[];
    $errors=[];

    foreach($_FILES['file']['name'] as $key => $name) {
        $tmp_name =$_FILES['file']['tmp_name'][$key];
        $size =$_FILES['file']['size'][$key];
        $type =$_FILES['file']['type'][$key];
        $kb = $size/ 1024;  
        
        if($kb>400){
            $errors[] = "<span>File $name is too Large!!!</span>";
            continue;
        }

        if($type != "image/jpeg" && $type != "image/jpg" && $type != "image/png"){
            $errors[] = "<span>File $name is type not Supported!!!</span>";
            continue;
        }

        if(move_uploaded_file($tmp_name,$img.$name)){
            $uploadedFiles[] =[
                'path' => $img.$name,
                'filename' => $name
            ];
        }else{
            $errors[] =  "<span> Failed to upload <b>$name</b>.</span>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store" />

    <title>Multiple Images Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <style>
        body{
            font-family:'Segoe UI', sans-serif;
            margin:0;
            padding: 0;
    }

    .container{
        width: 600px;
        margin: 80px auto;
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px ;
        box-shadow: 0 8px 16px black;
    }

    h2,h3{
        text-align: center;
        color:#333;
    }

    input[type='file']{
        width:100%;
        padding:12px;
        margin-bottom:15px;
        font-size: 14px;
    }

     input[type='submit']{
        width:100%;
        padding:12px;
        background:linear-gradient(90deg,#764ba2,#667eea);
        color:white;
        border:none;
        border-radius: 6px;
        font-weight:bold;
        cursor:pointer;
        transition: background 0.3s;

    }

     input[type='submit']:hover{
        background:linear-gradient(90deg,#667eea,#764ba2);
    }

    .result-msg{
        color: red;
        margin: 20px 0;
        text-align: center;
        font-size: 16px;
    }

    .image-box{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }

    .image-box img{
        width: 200px;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px black;
        transition:transform 0.3s ease;
    }

    .image-box img:hover{
        transform: scale(1.05);
        }

        .error{
            color: red;
            font-size: 14px;
            text-align: center;
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
        <h2>Multiple Images Upload</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <fieldset>
                <input type="file" name="file[]" multiple required>
                <input type="submit" name="submit" value="Upload">
            </fieldset>

        </form>
    <?php

    if (!empty($errors)) {
    echo "<div class='result-msg'><b>";
    foreach ($errors as $err) {
        echo "$err<br>";
    }
    echo "</div></b>";
}
        if(!empty($uploadedFiles)){
            echo "<h3>Images Uploaded:</h3>";
            echo "<div class='image-box'>";
            foreach($uploadedFiles as $file){
                echo "<img src ='{$file['path']}' alt='{$file['filename']}'>";
            }
            echo "</div>";
        }
    ?>

    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>