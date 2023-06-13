<?php
if(!empty($_POST['lbutton'])){
session_start();

header('location:');

$lusername=$_POST['lusername'];
$lpassword=$_POST['lpassword'];
$lbutton=$_POST['lbutton'];
//databaseconnection
$servername="localhost";
$username="root";
$password="";
$database="gokulprojectdb";
$conn=new mysqli($servername,$username,$password,$database);

if($conn==True){
    $_SESSION['username']=$lusername;
 $datacheck=$conn->query("SELECT * FROM signupdetails WHERE username='$lusername'");

  if($compare=$datacheck->num_rows==1){
    $compare=$datacheck->fetch_assoc();
    if($compare['usertype']=='1'){
      if($compare['password']=="$lpassword"){
        header('location:admin.php');
  }else {
    $_SESSION['info1']= "<div class='alert alert-danger'>Enter valid password</div>"; 
    header('location:login.php');
  }
    }else if($compare['usertype']=='3'){
      if($compare['password']=="$lpassword"){
        header('location:staffportal.php');
  }else {
    $_SESSION['info1']= "<div class='alert alert-danger'>Enter valid password</div>"; 
    header('location:login.php');
  }
}else{
  
      if($compare['password']=="$lpassword"){
            header('location:home.php');
      }else{
        $_SESSION['info1']= "<div class='alert alert-danger'>Enter valid password</div>"; 
        header('location:login.php');
      }
    }
  }else{
    $_SESSION['info1']= "<div class='alert alert-danger'>User name not matched</div>"; 
    header('location:login.php');
  }
}else{
    $_SESSION['info1']= "data base not connected"; 
}
}
?>