<?php

$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    include 'connect.php';
    
    $userType=$_POST['userType'];
    $ID=$_POST['ID'];
    $password=$_POST['password'];

    session_start();
    $_SESSION['userType']=$userType;
    // $_SESSION['ID']=$ID;

  if($userType!='student'){
    $sql="SELECT * from employee_t where employeeID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:employee_dashboard.php');
        }
     }
  }    

  elseif($userType=='student'){
    $sql="SELECT * from student_t where studentID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:employee_dashboard.php');
        }
     }
  }    

        else{
            $invalid=1;
        }
  }
  ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Login page</title>

    <style>
      body{
        background-image:url('spmslg.png');
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-size:32% 48%;
        background-position:top;
        background-color:#0f0f0f;
      }

      .mainContainer{
        display:flex;
        background: #282C35;
        padding:5%;
        margin-top:20%;
        width:50%;
        height:5%;
        box-shadow : 1px 1px 5px #778899;
        justify-content:center;
        border-radius:5px;
        
        
      }

      .ID{
        font-family: Arial, Helvetica, sans-serif;
        font-size:20px;
        padding:3px;
        color:black;
        margin-bottom:22px;
        margin-left:95px;
        border-radius:5px;
        border:1px solid #e5e4e2;

      }

      .ID:hover{
        border:2px solid #696969;
      }

   .ID:active{
    opacity: 0.5;
   }

   .ID2{
    font-family: Arial, Helvetica, sans-serif;
        font-size:20px;
        padding:3px;
        color:black;
        margin-bottom:22px;
        margin-left:30px;
        border-radius:5px;
        border:1px solid #e5e4e2;
   }

   .ID2:hover{
        border:2px solid #696969;
      }

   .ID2:active{
    opacity: 0.5;
   }


      label{
        
        font-family: Arial, Helvetica, sans-serif;
        font-size:20px;
        color:black;
        /* font-weight:bolder; */
        
      }

  .submitButton{
     height: 40px;
     width: 100%;
     display:inline-block;
     border-radius: 5px;
     border: none;
     outline: none;
     background: #6698FF;
     color: #fff;
     font-size: 15px;
     letter-spacing:4px;
     text-transform: uppercase;
     cursor:pointer;
     /* margin-left:35%; */
     font-family: Arial, Helvetica, sans-serif;
     margin-top:15px;

    }

    .submitButton:hover{
    background:linear-gradient(90deg,#87CEFA,#00BFFF);
   }

   .submitButton:active{
    opacity: 0.5;
   }

   .selectNew{
    height: 40px;
     width: 200px;
     display:inline-block;
     border-radius: 5px;
     border: none;
     outline: none;
     background: #6698FF;
     color: #fff;
     font-size: 15px;
     letter-spacing:4px;
     text-transform: uppercase;
     cursor:pointer;
     margin-left:5%;
     font-family: Arial, Helvetica, sans-serif;
     margin-top:15px;

   }

    </style>


  </head>
  <body>

 <?php
 if($invalid==1){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong></strong> Invalid credentials!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>

  <div style="display:flex;justify-content:center;">
  <div class="mainContainer">
   <form action="login.php" method="post">
  <div class="login">
    <label style="">
      User Type
    </label>
    <select name="userType" class="select selectNew">
             <option disabled selected>User Type</option>
             <option value="student">Student</option>
             <option value="faculty">Faculty</option>
             <option value="department head">Department Head</option>
             <option value="dean">Dean</option>
         </select>
         </div>
    <br>

    <label>
      ID  
    </label>
    <input class="ID"  type="text" name="ID" placeholder="Enter Your ID">
    <br>
    <label>
      Password  
    </label>
    <input class="ID2"  type="password" name="password" placeholder="Enter Your Password"><br>
    <input type="submit" name="submit" value="Login" class="submitButton">
    </form>
  </div>
  </div>


</body>
</html> 