

<?php

if(!empty($_POST['button'])){
    session_start();
    $staffid=$_POST['stf_id'];
    $staffname=$_POST['stf_name'];
  $staffage=$_POST['stf_dob'];
  $staffbloodgroup=$_POST['stf_bg'];
  $experience=$_POST['stf_exp'];
  $contactno=$_POST['stf_num'];
  $qualification=$_POST['stf_qa'];
  $subhandeling=$_POST['stf_subj'];
  $adress=$_POST['stf_address'];
  
//databaseconnection
$servername="localhost";
$username="root";
$password="";
$database="gokulprojectdb";
$conn=new mysqli($servername,$username,$password,$database);

if($conn==True){
    
  $datacheck=$conn->query("SELECT username FROM signupdetails WHERE username='$staffid'");
  $datacheck1=$conn->query("SELECT staff_id FROM staff_details WHERE staff_id='$staffid'");
 
   if($datacheck->num_rows==1){
    if($datacheck1->num_rows==0){
       $conn->query("INSERT INTO `staff_details`(`staff_id`, `staff_name`, `staf_age`, `bloodgroup`, `experience`, `subjects_handeling`, `contact_no`, `qualification`, `Address`) 
       VALUES ('$staffid','$staffname','$staffage','$staffbloodgroup','$experience','$subhandeling','$contactno','$qualification','$adress')");
    $_SESSION['info1']= "<div class='alert alert-success'>registration sucess</div>";
    header('location:staff_reg.php');
    }else{
      $_SESSION['info1']= "<div class='alert alert-danger'>staff reg detail already avilable</div>";
      header('location:staff_reg.php');
    }
      
   }else{
    $_SESSION['info1']= "<div class='alert alert-danger'>staff reg id not avilable</div>";
   
    header('location:staff_reg.php');
 
   }
 }else{
     echo "<script> alert('data base not connected'); </script>"; 
 }
} 
?>

