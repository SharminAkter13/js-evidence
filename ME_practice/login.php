<?php
session_start();
if(isset($_POST['register'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $file_location = "reg_data.txt";
    $errors=[];

    if(!preg_match("/^[a-zA-Z0-9_%#\-\.]+[@][a-z]+[\.][a-z]{2,3}$/",$email)){
        $errors['email']= "Invalid email format!!!";
    }elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/",$password)){
        $errors['password'] = "Password must have uppercase, lowercase, number ,spacial character & be at least 6 chars.";
    }elseif ($password !== $confirm_password) {
        $errors['confirm_password'] ="Password does not match!!!";
    }
    
    if(empty($errors)){
        $hashed_pass = password_hash($password,PASSWORD_DEFAULT);
        $data = $name.",".$email.",".$hashed_pass.",".PHP_EOL;
        file_put_contents($file_location,$data,FILE_APPEND);
        $_SESSION['rename'] = $name;
        header("Location:file_upload.php");
        exit;
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE ACCOUNT</title>
     <style>
   body {
    /* background-image: url('https://cdn.pixabay.com/photo/2021/05/04/09/25/background-6228126_640.jpg'); */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    }


    .container {
      width: 400px;
      margin: 70px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 95%;
      padding: 10px;
      margin: 5px 0;
      border-radius: 4px;
      border: 2px solid #ccc;
      transition: 0.3s;
    }

    input.valid {
      border-color: green;
    }

    input.invalid {
      border-color: red;
    }

    .error-msg {
      color: red;
      font-size: 13px;
      margin-bottom: 8px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background: linear-gradient(to right, #7b68ee, #00bfa5);
      color: white;
      border: none;
      border-radius: 4px;
      font-weight: bold;
      cursor: pointer;
    }

    .msg {
      text-align: center;
    }
     .toggle {
      float: right;
      font-size: 12px;
      cursor: pointer;
      color: #333;
      margin-right: 5%;
      margin-top: -28px;
      position: relative;
      z-index: 2;
    }

    
  </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align:center;">CREATE ACCOUNT</h2>
        <form action="#" method="post" id="regForm">
            <input type="text" name="name" placeholder="Your Name" required>

            <input type="email" name="email" id="email" placeholder="Your Email" required>
            <div class="error-msg"><?php echo $errors['email'] ?? ''; ?></div>

            <input type="password" name="password" id="password" placeholder="Your Password" required>
            <div class="toggle" onclick="togglePass('password')">Show</div>
            <div class="error-msg"><?php echo $errors['password'] ?? ''; ?></div>

            <input type="password" name="confirm_password" id="confirm_password" placeholder="Your confirm_password" required>
            <div class="toggle" onclick="togglePass('confirm_password')">Show</div>
           <div class="error-msg"><?php echo $errors['confirm_password'] ?? ''; ?></div>

            <input type="submit" name="register" value="SIGN UP">
        </form>
    </div>
    <script>
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const confirm_password = document.getElementById('confirm_password');

        email.addEventListener('input', function(){
            const pattern = /^[a-zA-Z0-9_%#\-\.]+[@][a-z]+[\.][a-z]{2,3}$/;
            this.className = pattern.test(this.value) ? 'valid' : 'invalid';
        });

        password.addEventListener('input', function(){
            const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/;
            this.className = pattern.test(this.value) ? 'valid' : 'invalid';
        });

        confirm_password.addEventListener('input', function(){
            this.className = (this.value === password.value && this.value !== "") ? 'valid' : 'invalid';
        });
       
       
        function togglePass(id) {
            const input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        }


    </script>
</body>
</html>