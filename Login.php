<?php
session_start();
//include('signupdetails.php');
include('logindetails.php');
?>

<!DOCTYPE html>
<html>
    <head>
    <title>login page</title>
    <meta name="descrption" content="login and sign up page">
    <meta name="keyword" content="login , home ,sign up">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="documentclassification" content="professional">
    <meta name="distripution" content="local">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="">
<style>
     .logo{
      text-align:center;
      padding:0;
      font: size 25px;
     }
     .title{
    
    color: blue;
    height:auto;
    padding:5px;
    margin-bottom:10px;
}
     body{
      margin:0;
  height:100vh;
  background:radial-gradient(100% 200% at right,white 50%,#01b0f0 50.1%);
   
     }
     #login{
   background: transparent;
   border-radius: 10px;
  padding:10px;
margin-top:60px;
padding:50px}
.img{
  margin-left:200px;

}
.heading{
  font-family: 'Acme', sans-serif;
  font-weight: bolder;
  font-size:xx-large;
  color:#01b0f0;
}
    </style>
</head>
  <body>
    <div class="container-fluid background title">
   <h2> <img src="lotousimage.png" width="50px" height="50px">Global School Login Page </h2>
        
    </div>
    <div class="container ">
      <div class="row "  >
          <div id="login" class="col-sm-6 ">
                <label ><img class="img"  src="login1.png" alt="no image"  width="80px" height="80px"srcset=""></label><br>
                <?php if(isset($_SESSION['info1']))
                    echo $_SESSION['info1'];
                    unset($_SESSION['info1']);
                ?>
                <form action="logindetails.php" class="form-group" method="post" id="loginform">
                  <label for="lname">USERID</label>
                  <input type="text" name="lusername" id="lname" class="form-control" required>  
                  <label for="lpass">Password</label>
                  <input type="password" name="lpassword" id="lpass" class="form-control"  required>
                  <div class="form-group form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" id="lcheck"> showpassword
                    </label>
                  </div>  
                  <div>
                    <a class="float-right text-danger" href="forgetpassword.php" target="">Forgetpassword</a>
                  </div>
                    <input type="submit" class="btn btn-primary" name="lbutton" value="Login">
                    
                </form>
                          </div>
                          <div class="col-sm-6">
                            <div class="logo">
                             <h3 class="heading">GLOBAL SCHOOLS</h3>
                             <img src="lotousimage.png" alt="no image"  width="auto" height="350px"srcset=""><br>
                             <strong>A Tradition Of Excellence</strong>
                          </div>
                          </div>
                       </div>    
                     </div>
    
    </div>
    
    <!---footer-->

<!--footer end-->
    <script src="formvalidation.js"></script>
  </body>
</html>