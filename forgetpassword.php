<?php
  session_start();
  if(isset($_SESSION['username'])){
    session_destroy();
    header('location:forgetpassword.php');
} 
$info=" ";
    $info1=" ";
if($_SERVER['REQUEST_METHOD']=="POST"){
   
    if(isset($_POST['submit'])){
    $username1=$_POST['fusername'];
    $email=$_POST['femail'];
    $cpassword=$_POST['rpassword'];
    
//databaseconnection
$username="root";
$password="";
$servername="localhost";
$database="gokulprojectdb";

$conn=new mysqli($servername,$username,$password,$database);

$displayvalues=$conn->query("SELECT * FROM signupdetails WHERE username='$username1'");
if($displayvalues->num_rows==1){
 
    $finalvalue=$displayvalues->fetch_assoc();
   if($finalvalue['email']=="$email"){
   $sql=$conn->query("UPDATE signupdetails SET password='$cpassword' WHERE username='$username1' ");
      if ($sql === TRUE) {
        $info ="password reset sucessfull";
       // echo "<script> alert('password updated successfully');</script>";
      //  header('location:login.php');
      
      } else {
        $info1= "Error updating record: ";
      }
      
   }else{
    $info1="email not found";
   }
}else{
    $info1="username and email not found";
}

    }else { $info1="error";}
}

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Forgetpassword</title>
    <meta name="descrption" content="login and sign up page">
    <meta name="keyword" content="login , home ,sign up">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="documentclassification" content="professional">
    <meta name="distripution" content="local">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="database1.css">
<style>
    .fpass{
        margin-top:150px;
        
    }
    label{
        color:black;
        font-size: x-large;
    }
    .text{
        font-size: large;  
    }
    a{
        font-size: x-large; 
    }
    .card1{
        background-color: cornsilk;
    }
    body{
      margin:0;
  height:100vh;
  background:radial-gradient(100% 200% at left,white 30%,#01b0f0 50.1%);
   
     }
    </style>
  
</head>
  <body>
      <div class="container-fluid info">
        <a class="text-success  " href="login.php">click here LOGIN PAGE</a>
      </div>
  <div class="container fpass" >
    <div class="row">
        <div class="col-md-3 card1">
            <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <div class="form-group">
                <label  for="fusername">username</label>
                <input class="form-control" type="text" name="fusername" required>
                </div>
                <div class="form-group" >
                <label  for="femail">email</label>
                <input class="form-control"  type="email" name="femail">
                </div>
                   <div class="form-group">
                   <label  for="rpassword">New Password</label>
                <input class="form-control"  type="text" name="rpassword" required>
                   </div>
                   <div class="form-group">
                    <input type="submit" name="submit" value="submit" class="btn btn-primary">
                   </div>
                   <div class="form-group text-success">
                    <?php echo $info?>
                   </div>
                   <div class="form-group text-danger">
                    <?php echo $info1?>
                   </div>
            </form>
        </div>
        <div class="col-md-3 bg-info">
           <aside class="text-warning text">NOTE:please enter username and regestered email id to reset password</aside>
        </div>
    </div>
  </div>
   
  </body>
</html>
