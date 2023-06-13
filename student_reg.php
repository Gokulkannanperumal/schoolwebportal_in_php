<?php
session_start();


?>

<!DOCTYPE html>
<html>
    <head>
    <title>Student_reg</title>
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
   <h4> <img src="lotousimage.png" width="50px" height="50px">STUDENT_INFO_REGISTRATION <button class="btn btn-dark float-right"> 
        <a href="admin.php">ADMIN</a></button></h4>
        
    </div>
    <div class="container">
      <div class="row "  >
       
            <div id="signup" class="col-sm-10  ">
                <label ><h3  class=" text-info" >STUDENT_REGISTRATION FORM:</h3></label><br>
                <?php if(isset($_SESSION['info1']))
                    echo $_SESSION['info1'];
                   unset($_SESSION['info1']);
                   
                ?>
                <form action="studentdetails.php" method="post" class="form-group">
                  <label for="std_id">Student Reg ID</label>
                  <input type="text" name="std_id" class="form-control" required>
                  <label for="std_name">Student Name</label>
                  <input type="text" name="std_name" class="form-control" required>
                  <label for="std_dob">DATE OF BIRTH</label>
                  <input type="date" name="std_dob" class="form-control"required>
                  <label for="std_bg">BLOOD GROUP</label>
                  <input type="text" name="std_bg" class="form-control"required>
                  <label for="std_class">STUDYING</label>
                  <input type="text" name="std_class" class="form-control"required>
                  <label for="std_num">CONTACT</label>
                  <input type="text" name="std_num" class="form-control"required>
                  <label for="std_father">FATHER NAME</label>
                  <input type="text" name="std_father" class="form-control"required>
                  <label for="std_mom">MOTHER NAME</label>
                  <input type="text" name="std_mom" class="form-control"required>
                  <label for="std_address">ADDRESS</label>
                  <textarea name="std_address" id="" cols="20" rows="3"class="form-control" required></textarea>
                  <input type="submit" value="Register" class="btn btn-primary " name="button">
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid footer">
      <footer class="fotter">
         <strong>GLOBAL SCHOOLS</strong>
      </footer>
    </div>
    <script src="formvalidation.js"></script>
  </body>
</html>