<?php
session_start();


?>

<!DOCTYPE html>
<html>
    <head>
    <title>Student_mark_upload</title>
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
    <div class="container-fluid title mb-0">
   <h4> <img src="lotousimage.png" width="50px" height="50px">STUDENT_MARK_UPLOAD <button class="btn btn-dark float-right"> 
        <a href="staffportal.php">BACK</a></button></h4>
        
    </div>
    <div class="container_fluid">
      <div class="row mt-0 mb-0"  >
       
            <div id="" class="col-sm-12 ">
               <?php if(isset($_SESSION['info1']))
                       echo $_SESSION['info1'];
                      unset($_SESSION['info1']);
                      
                   ?>
                <form action="stud_mark_details.php" method="post" class="form-group">
                  <div class="row">
                 <div class="col-6">
                  <label ><h3  class=" text-info" >STUDENT_MARK_UPLOAD</h3></label><br>
                  <label class="" for="std_id">Student Reg ID</label>
                  <input type="text" name="std_id" class="form-control" required>
                  <label for="std_exam">Exam</label>
                  <select id="" name="std_exam" class="form-control">
                    <option value="studentmarkdetails_qa_10">quaterly</option>
                    <option value="#">Halfyearly</option>
                    <option value="#">Annual</option>
                  </select>
                
                  <label for="tamil">TAMIL</label>
                  <input type="number" min="0" max="100" name="tamil" class="form-control"required>
                
                  <label for="english">ENGLISH</label>
                  <input type="number" min="0" max="100"name="english" class="form-control"required>
                
                  <label for="maths">MATHS</label>
                  <input type="number" min="0" max="100" name="maths" class="form-control"required>
                </div>
                <div class="col-6 ">
                  <label class="mt-3 pt-5" for="science">SCIENCE</label>
                  <input type="number" min="0" max="100"name="science" class="form-control"required>
                
                  <label for="ss">SOCIAL SCIENCE</label>
                  <input type="number" min="0" max="100" name="ss" class="form-control"required>
              
                  <label for="total">TOTAL</label>
                  <input type="number" min="0" max="500" name="total" id=""class="form-control" >
               
                  <label for="result">RESULT</label>
                  <select id="" name="result" class="form-control">
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                  </select>
                  <input type="submit" value="Register" class="btn btn-primary " name="button">
                </div>
              </div>
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