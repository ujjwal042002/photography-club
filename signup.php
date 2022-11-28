<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$parentName = $_POST["parentName"];
$address = $_POST["address"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$religion = $_POST["rele"];
$gender = $_POST["gender"];



$rel_id = $_REQUEST['rele'];

// for image upload
print_r($_FILES);
$filename = $_FILES["img"] ["name"];
$tempname = $_FILES["img"] ["tmp_name"];
$folderloc = "student/";
$fileloc=$folderloc.$filename;
move_uploaded_file($tempname,$folderloc);



    $exists=false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `info2` (`stu_id`, `userName`, `password`, `confirmpassword`, `parentName`, `address`, `contact`, `email`, `gender`, `rel_id`, `stu_images`) VALUES (NULL,'$username' , '$password', '".$_POST['cpassword']."', '$parentName', '$address', '$contact', '$email', '$gender', '$rel_id','$fileloc')";
       //establishing a connection
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
// last id from info id

$stu_id = mysqli_insert_id($conn);

//creating a facility array to store multiple input

$facility_array = $_POST['facility'];
//inserting into array facility -> 
foreach ($facility_array as $facility_id) {
  // Insert into student_facility table to link student with facility

      $facility_sql = "INSERT INTO `facility_info2` (`linkid`, `fid`, `stu_id`) VALUES (NULL,' $facility_id ', '$stu_id')";
      mysqli_query($conn,$facility_sql);
    }

  //TRY TO EXECUTE QUERY
  if(!$result)
  {
    echo "something went wrong... cannot redirect!";
  }
else
 {
header("location:login.php");
  }   


}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$(document).ready(function(){

$('#usererror').hide();
   var username_error = false;

   $('#username').keyup(function(){
 validateUsernme();

})
function validateUsernme(){
  let username_value = $('#username').val();
 

  if( username_value.length <3 ||  username_value.length > 10){
$('#usererror').show();
$('#usererror').text("please input valid char");
return false;
  } else {
    $('#usererror').hide();
    return true;
  }
}

})
  </script>
    <title>Signup</title>

    <style>
body{

    background: url("images/book7.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}



</style>


  </head>
  <body style="background-color:#ebf6ff;">


  <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>


    <div class="container my-4">
     <h1 class="text-center"> <strong>Signup to our  website </strong></h1>
     <form action="/temp/signup.php" method="post"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="username"><strong>Username </strong></label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username" aria-describedby="emailHelp">
            <h6 id="usererror" style="color:red"> name must be in between 3 and 10 chahracter</h6>
              
        </div>
        <div class="form-group">
            <label for="password"><strong>Password</strong></label>
            <input type="password" class="form-control" placeholder="password" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword"><strong>Confirm Password</strong></label>
            <input type="password" class="form-control" placeholder="confirm password" id="cpassword" name="cpassword">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
        <div class="form-group">
                     <label for="" ><strong>Parent Name</strong></label>
                      <input type="text" name="parentName" required  class="form-control" placeholder="Enter Parent Name">
                    </div>
                    <div class="form-group">
                        <label for=""> <strong> Student address</strong></label>
                        <input type="text" name="address" required  class="form-control" placeholder="Enter address">
                    </div>
                    <div class="form-group">
                        <label for=""> <strong> Student contact no</strong></label>
                        <input type="text" name="contact" required  class="form-control" placeholder="Enter contact no">
                    </div>
                    <div class="form-group">
                        <label for="email"> <strong> Student Email</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                    <label for="email"> <strong> Gender </strong></label>
                    <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" id="male"><strong>Male</strong></label>
                    <label for="Female" class="radio-inline"><input type="radio" name="gender" value="f" id="Female"><strong>Female</strong></label>
                    <label for="Others" class="radio-inline"><input type="radio" name="gender" value="o" id="Others"><strong>Others</strong></label>
                    </div>

                    <div class="mb-3">
                <lebel for="religion"><strong>Religion:</strong></lebel>
                <select name="rele" class="form-select" aria-label="Default select example">
                  <option selected>Select your religion</option>
                  <?php
                      include 'partials/_dbconnect.php';
                        $sql="SELECT rid, religions FROM religion2";
                        $result=mysqli_query($conn,$sql);
                        
                        while ($rele= mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $rele["rid"]; ?>"><?php echo $rele["religions"]; ?></option>
                        <?php
                      }
                      ?>
                  </select>
            </div>

            <div class="mb-3 form-value-container">
                <label for="facility" class="form-label" name="facilities"><strong>Facilities availed:</strong></label>
                  <br>
                  <?php
                    include 'partials/_dbconnect.php';
                    $sql_facility="SELECT fid,facilities
                    FROM facility2";
                    $result_facility=mysqli_query($conn,$sql_facility);

                    while($rel_facility=mysqli_fetch_assoc($result_facility)){
                      ?>
                      <div class="form-check form-check-inline ms-3 col-3">
                      <input class="form-check-input" type="checkbox" name="facility[]" value="<?php echo $rel_facility["fid"]; ?>">  <!-- use ke -->
                      <label class="form-check-label" for="inlineCheckbox"><?php echo $rel_facility["facilities"]; ?></label> <!-- dikhane ke -->
                      </div>


                      <?php
                    }
                
                  ?>                 
            </div>


            

    <div class="mb-3">
  <label for="formFile" class="form-label">Upload File </label>
  <input class="form-control" type="file" name="img" id="formFile">
</div>
   
                        


         
        <button type="submit" class="btn btn-primary">SignUp</button>
     </form>
    </div> 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>