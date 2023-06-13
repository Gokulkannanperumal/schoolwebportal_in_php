

<?php

if(!empty($_POST['button'])){
    session_start();
    $studentid=$_POST['std_id'];
    $studentname=$_POST['std_name'];
  $studentage=$_POST['std_dob'];
  $studentbloodgroup=$_POST['std_bg'];
  $classdetails=$_POST['std_class'];
  $contactno=$_POST['std_num'];
  $fathername=$_POST['std_father'];
  $mother=$_POST['std_mom'];
  $adress=$_POST['std_address'];
  
//databaseconnection
$servername="localhost";
$username="root";
$password="";
$database="gokulprojectdb";
$conn=new mysqli($servername,$username,$password,$database);

if($conn==True){
    
  $datacheck=$conn->query("SELECT username FROM signupdetails WHERE username='$studentid'");
  $datacheck1=$conn->query("SELECT stud_id FROM student_details WHERE stud_id='$studentid'");
 
   if($datacheck->num_rows==1){
    if($datacheck1->num_rows==0){
       $conn->query("INSERT INTO `student_details`(`stud_id`, `Student_name`, `Student Age`, `Blood Group`, `Class Details`, `Contact number`, `Father Name`, `Mother Name`, `Address`) 
    VALUES ('$studentid','$studentname','$studentage','$studentbloodgroup','$classdetails','$contactno','$fathername','$mother','$adress')");
    $_SESSION['info1']= "<div class='alert alert-success'>registration sucess</div>";
    header('location:student_reg.php');
    }else{
      $_SESSION['info1']= "<div class='alert alert-danger'>student reg detail already avilable</div>";
      header('location:student_reg.php');
    }
      
   }else{
    $_SESSION['info1']= "<div class='alert alert-danger'>student reg id not avilable</div>";
   
    header('location:student_reg.php');
 
   }
 }else{
     echo "<script> alert('data base not connected'); </script>"; 
 }
} 
?>

