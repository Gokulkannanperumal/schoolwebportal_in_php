<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Staff_reg</title>
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
   <h4> <img src="lotousimage.png" width="50px" height="50px">SYAFF_INFO_REGISTRATION <button class="btn btn-dark float-right"> 
        <a href="admin.php">ADMIN</a></button></h4>
        
    </div>
    <div class="container">
      <div class="row "  >
       
            <div id="signup" class="col-sm-10  ">
                <label ><h3  class=" text-info" >STAFF_REGISTRATION FORM:</h3></label><br>
                <?php if(isset($_SESSION['info1']))
                    echo $_SESSION['info1'];
                   unset($_SESSION['info1']);
                   
                ?>
                <form action="staffdetails.php" method="post" class="form-group">
                  <label for="stf_id">Staff Reg ID</label>
                  <input type="text" name="stf_id" class="form-control" required>
                  <label for="stf_name">Staff Name</label>
                  <input type="text" name="stf_name" class="form-control" required>
                  <label for="stf_dob">DATE OF BIRTH</label>
                  <input type="date" name="stf_dob" class="form-control"required>
                  <label for="stf_bg">BLOOD GROUP</label>
                  <input type="text" name="stf_bg" class="form-control"required>
                  <label for="stf_exp">EXPERIENCE</label>
                  <input type="text" name="stf_exp" class="form-control"required>
                  <label for="stf_num">CONTACT</label>
                  <input type="text" name="stf_num" class="form-control"required>
                  <label for="stf_qa">QUALIFICATION</label>
                  <input type="text" name="stf_qa" class="form-control"required>
                  <label for="stf_subj">SUBJECTS HANDELING</label>
                  <textarea name="stf_subj" id="" cols="10" rows="2"class="form-control" required></textarea>
                  <label for="stf_address">ADDRESS</label>
                  <textarea name="stf_address" id="" cols="20" rows="3"class="form-control" required></textarea>
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