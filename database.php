<?php
session_start(); 
if(!isset($_SESSION['username'])){
    header('location:login.php');
}


//databaseconnection
$username="root";
$password="";
$servername="localhost";
$database="gokulprojectdb";

$conn=new mysqli($servername,$username,$password,$database);

$displayvalues=$conn->query("select * from signupdetails");
$displaystudent=$conn->query("select * from student_details");
$displaystaff=$conn->query("select * from staff_details");




?>

<!DOCTYPE html>
<html>
    <head>
    <title>Data base</title>
    <meta name="descrption" content="login and sign up page">
    <meta name="keyword" content="login , home ,sign up">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="documentclassification" content="professional">
    <meta name="distripution" content="local">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="database.css">
<style>
  body {
    margin:0;
  height:100vh;
  background:radial-gradient(100% 200% at right,#01b0f0 0%,white 50.1%);
  }
</style>
</head>
  <body>
    <div class="container-fluid title">
        <h3><img src="lotousimage.png" width="50px" height="50px"><?php  echo "welcome Admin:\t ";print_r($_SESSION['username']);?> <a class="float-right text-danger" href="logout.php">logout</a></h3>
    </div>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark mt-0">
  <ul class="navbar-nav">
    <li class="nav-item ml-1 mr-5 ">
      <a class="nav-link text-dark" href="logout.php">HOME</a>
    </li>
    <li class="nav-item mr-5">
      <a class="nav-link text-dark" href="admin.php">ADMIN</a>
    </li>
    <li class="nav-item mr-5 active">
      <a class="nav-link " href="#">DATABASE</a>
    </li>
    <li class="nav-item mr-5">
      <a class="nav-link text-dark " href="logout.php">LOGIN</a>
    </li>
    <li class="nav-item mr-5">
      <a class="nav-link text-dark" href="forgetpassword.php">FORGET PASSWORD</a>
    </li>
  </ul>
</nav>
    
<div class="container  mt-2">
               <div class="col-md-10 dtable">
                  <h2>USERS LIST</h2>
                  <div class="table-responsive-lg">
                    <table class="table table-striped table-primary table-hover ">
                    <tr class="thead">
                        <th>ID</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>Email</th>
                        <th>REGTIME</th>
                        <th>USERTYPE</th>
                    </tr>
                    <?php
                    while($final=$displayvalues->fetch_assoc()){
                    echo " <tr >";
                     echo "<td>".$final['id']."</td>";
                     echo "<td>".$final['username']."</td>";
                     echo "<td>".$final['password']."</td>";
                     echo "<td>".$final['email']."</td>";
                     echo "<td>".$final['regtime']."</td>";
                     echo "<td>".$final['usertype']."</td>";
                     echo " <tr>";
                    }?>
                    </table>
                  </div>
               </div>
           
            <div class="row">
               <div class="col-md-10 dtable">
                  <h2>STUDENT LIST</h2>
                  <div class="table-responsive-lg">
                    <table class="table table-striped table-primary table-hover ">
                    <tr class="thead">
                        <th>ID</th>
                        <th>STUDENTNAME</th>
                        <th>AGE</th>
                        <th>BLOODGROUP</th>
                        <th>STUDYING</th>
                        <th>CONTACT</th>
                        <th>FATHER</th>
                        <th>Mother</th>
                        <th>ADDRESS</th>
                    </tr>
                    <?php
                    while($student=$displaystudent->fetch_assoc()){
                    echo " <tr >";
                     echo "<td>".$student['stud_id']."</td>";
                     echo "<td>".$student['Student_name']."</td>";
                     echo "<td>".$student['Student Age']."</td>";
                     echo "<td>".$student['Blood Group']."</td>";
                     echo "<td>".$student['Class Details']."</td>";
                     echo "<td>".$student['Contact number']."</td>";
                     echo "<td>".$student['Father Name']."</td>";
                     echo "<td>".$student['Mother Name']."</td>";
                     echo "<td>".$student['Address']."</td>";
                     echo " <tr>";
                    }?>
                    </table>
                  </div>
               </div>
                  </div>
           
            <div class="row">
               <div class="col-md-10 dtable">
                  <h2>STAFF LIST</h2>
                  <div class="table-responsive-lg">
                    <table class="table table-striped table-primary table-hover ">
                    <tr class="thead">
                        <th>ID</th>
                        <th>STAFFNAME</th>
                        <th>AGE</th>
                        <th>BLOODGROUP</th>
                        <th>EXPERIENCE</th>
                        <th>CONTACT</th>
                        <th>SUBJECTS</th>
                        <th>QUALIFICATION</th>
                        <th>ADDRESS</th>
                    </tr>
                    <?php
                    while($staff=$displaystaff->fetch_assoc()){
                    echo " <tr >";
                     echo "<td>".$staff['staff_id']."</td>";
                     echo "<td>".$staff['staff_name']."</td>";
                     echo "<td>".$staff['staf_age']."</td>";
                     echo "<td>".$staff['bloodgroup']."</td>";
                     echo "<td>".$staff['experience']."</td>";
                     echo "<td>".$staff['subjects_handeling']."</td>";
                     echo "<td>".$staff['contact_no']."</td>";
                     echo "<td>".$staff['qualification']."</td>";
                     echo "<td>".$staff['Address']."</td>";
                     echo " <tr>";
                    }?>
                    </table>
                  </div>
               </div>
              </div>
           </div>
    </div>
    <script> 
$(document).ready(function(){
  $("#menubtn").click(function(){
    $("#cid").animate({
      height: 'toggle'
    },"slow");
  });
});
</script> 
    
   
  </body>
</html>

