

<?php

if(!empty($_POST['sbutton'])){
    session_start();
$susername=$_POST['susername'];
$spassword=$_POST['spassword'];
$email=$_POST['email'];
$utype=$_POST['utype'];
$sbutton=$_POST['sbutton'];
//databaseconnection
$servername="localhost";
$username="root";
$password="";
$database="gokulprojectdb";
$conn=new mysqli($servername,$username,$password,$database);

if($conn==True){
    
 $datacheck=$conn->query("SELECT username FROM signupdetails WHERE username='$susername'");

  if($datacheck->num_rows==1){
     $_SESSION['info']= "<div class='alert alert-danger'>username already avilable</div>";
     header('location:signup.php');
  }else{

    $conn->query(" INSERT INTO signupdetails ( username,password,email,usertype ) VALUES('$susername','$spassword','$email',$utype)");
    $_SESSION['info']= "<div class='alert alert-success'>registration sucess</div>";
    header('location:signup.php');
  }
}else{
    echo "<script> alert('data base not connected'); </script>"; 
}
}
?>

