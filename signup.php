<?php
session_start();
include('signupdetails.php');
//include('logindetails.php');
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Signup page</title>
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
<link rel="stylesheet" href="signup2.css">

</head>
  <body>
    <div class="container-fluid title">
   <h4> <img src="lotousimage.png" width="50px" height="50px"> ID_REGISTRATION <button class="btn btn-dark float-right"> 
        <a href="admin.php">ADMIN</a></button></h4>
        
    </div>
    <div class="container">
      <div class="row "  >
       
            <div id="signup" class="col-sm-7  ">
                <label ><h2  class=" text-info" >ID_REGISTRATION FORM:</h2></label><br>
                <?php if(isset($_SESSION['info']))
                    echo $_SESSION['info'];
                    unset($_SESSION['info']);
                ?>
                <form action="signupdetails.php" class="form-group" method="post"  id="signupform">
                  <label for="susername">USERID</label>
                  <input type="text" name="susername" id="susername" class="form-control"  required>
                  <p class="text-warning" id="uerror"></p>  
                  <label for="spass">Password</label>
                  <input type="password" name="spassword" id="spass" class="form-control"  required> 
                  <p class="text-warning" id="perror"></p>  
                  <div class="form-group form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" id="scheck"> showpassword
                    </label></div>  
                    <label for="email">Email:</label>
                  <input type="email" name="email" id="email" class="form-control"  required> 
                  <label for="email">userType:</label>
                  <input type="number" name="utype" id="utype" class="form-control"  required>
                  <p class="text-warning" id="uterror"></p>
                   
                    <input type="submit" value="Register" class="btn btn-primary " name="sbutton">
                    <div>
                    <a class="float-right text-info" href="student_reg.php" target="">Stuentprofilereg</a>
                  </div>
                  <div>
                    <a class="float-left text-info " href="staff_reg.php" target="">Staffprofilereg</a>
                  </div>
                </form>
            </div>
            <div class="col-md-4">
           <aside class="text-info text">NOTE:<br><hr>Model ID :<br> student ID: GL_STANDARD_ID<br>Staff ID:GL_ST_ID<br><hr>USER TYPE:<br>STUDENT: 2<br>STAFF: 3<hr></aside>
        </div>
        </div>
    </div>
    <div class="container-fluid footer">
      <footer class="fotter">
         <strong>user login and signup page</strong>
      </footer>
    </div>
    <script src="formvalidation.js"></script>
  </body>
</html>