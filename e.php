<?php
  session_start();
  if(isset($_GET['id'])){
    $_SESSION['edit']=true; //This is set as false because Profile is not yet Updated
  }
  else{
    unset($_SESSION['edit']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <title>Registration Form</title>
</head>
<body>
    <!-- <?php
        //include '../navbar.php';
    ?> -->
    <div class="container form_div  col-lg-5 col-md-10 col-sm-12 mt-2 mb-5">
        <div class="heading form-value-container mb-3">
          <h1 class="form-heading">Hawkins High School</h1>
        </div>
        <div class="heading-value-container mb-3">
          <div class="heading-deg "></div>
        <div class="heading-container mb-3">
          
          <h2 class="">Student Registration 2021-22</h2>
          <p class="ps-0 ms-0" >
            WELCOME TO HAWKINS HIGH SCHOOL,<br>
            Hawkins High School is managed by American Studies Association of US, Hawkins, Texas, United States.
            American Studies Association of US, is one of the most reputed International Organization and has its Schools 
            and Colleges located at Los Angeles (CA), Kington (UK) and Hawkins (TX). <br><br>
            Session starts from - 29th September

            <br><br>
            For further details contact:-<br>
            Jim Hopper - 977-818-7619
          </p>
        <hr>
        <p>
          <spsan class="s-required"><span class="star-required">*</span> Required</spsan>
        </p>
        </div>
        </div>
        <form action="submit.php" method="POST" enctype="multipart/form-data">
            <?php
                include 'connection.php';
                if(isset($_SESSION['edit'])){
                    $student_id=$_GET['id'];
                    $_SESSION['reset_student_id']=$student_id;
                    $sqla="SELECT * FROM student_info,category_master,religion_master
                            WHERE student_info.student_id=$student_id
                            AND student_info.religion_id=religion_master.religion_id
                            AND student_info.category_id=category_master.category_id";
                    $resa=mysqli_query($conn,$sqla);
                    $sqla_arr=mysqli_fetch_assoc($resa);
                }
            ?>
            <?php
                //include 'connection.php';
                if(isset($_SESSION['edit'])){
                    $sqlb="SELECT student_facility.facility_id 
                            FROM student_facility 
                            WHERE student_facility.student_id=$student_id";
                    $resb=mysqli_query($conn,$sqlb);
                    while($sqlb_arr=mysqli_fetch_assoc($resb)){
                        $sqlbi_arr[]=$sqlb_arr['facility_id'];
                    }
                }
            ?>
            
            <div class="container mb-3 form-value-container">
              <label for="Name" class="form-label ">Applicant's Name <spsan class="star-required">*</spsan></label>
              <input type="text" class="form-control c1" id="stName" name="stName" placeholder="Applicant's Name" 
              <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['student_name'] ?>" <?php } ?> required>
              
            </div>
            <div class="mb-3 form-value-container">
              <label for="fathersName" class="form-label">Father's Name <spsan class="star-required">*</spsan></label>
              <input type="text" class="form-control c2" id="fName" name="fName" placeholder="Enter Your Fathers's Name" 
              <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['fathers_name'] ?>" <?php } ?>  required>
              
            </div>
            <div class="mb-3 form-value-container">
              <label for="motherssName" class="form-label">Mothers's Name <spsan class="star-required">*</spsan></label>
              <input type="text" class="form-control c3" id="mName" name="mName" placeholder="Enter Your Mother's Name" 
              <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['mothers_name'] ?>"  <?php } ?> required>
              
            </div>
            <div class="mb-3 form-value-container">
              <label for="class" class="form-label">Class <spsan class="star-required">*</spsan></label>
              <input type="text" class="form-control c4" id="std" name="std" placeholder="Enter Your class" 
              <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['class'] ?>" <?php } ?> required>
              <p class="text-danger" id="classError"><i class="fas fa-exclamation-circle"> </i> Enter a valid class.</p>
              
            </div>
            <div class="mb-3 form-value-container">
                <lebel for="gender" >Gender <spsan class="star-required">*</spsan></lebel>
                  <div class="form-check form-check-inline ms-3">
                    <?php if(isset($_SESSION['edit']) && $sqla_arr['gender']=='M'){ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="male" value="M" checked>
                    <?php }else{ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="male" value="M">
                    <?php } ?>
                    <label class="form-check-label " for="inlineRadio1">Male</label>
                  </div>
                  <div class="form-check form-check-inline ms-3 ">
                    <?php if(isset($_SESSION['edit']) && $sqla_arr['gender']=='F'){ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="female" value="F" checked>
                    <?php }else{ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="female" value="F">
                    <?php } ?>
                    <label class="form-check-label " for="inlineRadio2">Female</label>
                  </div>
                  <div class="form-check form-check-inline ms-3 ">
                    <?php if(isset($_SESSION['edit']) && $sqla_arr['gender']=="Others"){ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="others" value="Others" checked>
                    <?php }else{ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="others" value="Others">
                    <?php } ?>
                    <label class="form-check-label " for="inlineRadio3">Others</label>
                  </div>
                
                  
            </div>
            <div class="mb-3 form-value-container">
                <label for="formFile" class="form-label">Applicant's Photo <spsan class="star-required">*</spsan></label>
                <input class="form-control c6" type="file" id="formFile" name="userImg" accept=".jpg,.jpeg,.png">
            </div>
            <div class="mb-3 form-value-container">
                <label for="facility" class="form-label" name="facilities">Facilities availed <spsan class="star-required">*</spsan></label>
                  <br>
                  <?php
                    //include 'connection.php';
                    $sql_facility="SELECT facility_id,facility_name
                    FROM facilities_master";
                    $result_facility=mysqli_query($conn,$sql_facility);

                    while($rel_facility=mysqli_fetch_assoc($result_facility)){
                    ?>
                        <div class="form-check form-check-inline ms-3 col-lg-3 col-6">
                            <?php if(isset($_SESSION['edit']) && in_array($rel_facility["facility_id"], $sqlbi_arr)){ ?>
                                    <input class="form-check-input" type="checkbox" name="facility[]" value="<?php echo $rel_facility["facility_id"]; ?>" checked>  
                            <?php }else{ ?>
                                    <input class="form-check-input" type="checkbox" name="facility[]" value="<?php echo $rel_facility["facility_id"]; ?>">
                            <?php } ?>
                            <label class="form-check-label c7" for="inlineCheckbox"><?php echo $rel_facility["facility_name"]; ?></label>
                        </div>
                        <?php 
                    }
                
                  ?>
                 
            </div>
            <div class="mb-3 form-value-container">
                <lebel for="religion">Religion <spsan class="star-required">*</spsan></lebel>
                <select name="religion" class="form-select mt-2" aria-label="Default select example">
                  <option>Select your religion</option>
                  <?php
                        //include 'connection.php';
                        $sql="SELECT religion_id,religion_name
                        FROM religion_master";
                        $result=mysqli_query($conn,$sql);
                        
                        while ($rel= mysqli_fetch_assoc($result)) {
                            if(isset($_SESSION['edit']) && $sqla_arr['religion_id']==$rel["religion_id"]){ ?>
                                <option class="c8" value="<?php echo $rel["religion_id"]; ?>" selected><?php echo $rel["religion_name"]; ?></option>
                            <?php }else{ ?>
                                <option class="c8" value="<?php echo $rel["religion_id"]; ?>" ><?php echo $rel["religion_name"]; ?></option>
                            <?php }
                      }
                      ?>
                </select>
               
            </div>  
            <div class="mb-3 form-value-container">
                <lebel for="gender" >Category <spsan class="star-required">*</spsan></lebel>
                <!-- <br> -->
                <?php
                    //include 'connection.php';
                    $sql_category="SELECT category_id,category_name
                    FROM category_master";
                    $result_category=mysqli_query($conn,$sql_category);

                    while($rel_category=mysqli_fetch_assoc($result_category)){ ?>
                      <div class="form-check form-check-inline ms-3">
                          <?php 
                            if(isset($_SESSION['edit']) && $sqla_arr['category_id']==$rel_category["category_id"]){ ?>
                                <input class="form-check-input c9" type="radio" name="Category" value="<?php echo $rel_category["category_id"]; ?>" checked required>
                        <?php }else{ ?>
                            <input class="form-check-input c9" type="radio" name="Category" value="<?php echo $rel_category["category_id"]; ?>" required>
                        <?php } ?>
                        <label class="form-check-label " for="inlineRadio1"><?php echo $rel_category["category_name"]; ?></label>
                      </div>
                      <?php
                    }
                ?>
                
            </div>
            <div class="col-12 mb-3 form-value-container">
                <label for="inputEmail" class="form-label">Email <spsan class="star-required">*</spsan></label>
                <input type="email" name="email" class="form-control mb-3 c10" id="email"placeholder="Enter Your Email" 
                <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['email'] ?>" <?php } ?> required>
               
            </div>
            <div class="mb-3 form-value-container">
                <label for="contactno" class="form-label">Contact No. <spsan class="star-required">*</spsan></label>
                <input type="number" class="form-control c11" id="contact" name="contact" placeholder="Enter Your Contact number" 
                <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['contact'] ?>" <?php } ?> required>
                <p class="text-danger" id="contactError"><i class="fas fa-exclamation-circle"> </i> Contact number must contain 10 characters.</p>
                
            </div>
            <div class="mb-3 form-value-container">
                <label for="address" class="form-label">Address <spsan class="star-required">*</spsan></label>
                <textarea class="form-control c12" placeholder="Enter Your Address" id="address" name="address"
                 required><?php if(isset($_SESSION['edit'])){ echo $sqla_arr['address']; } ?></textarea>
            </div>
            <div class="mb-3 form-value-container">
                <lebel for="dob" class="form-label">Date of Birth <spsan class="star-required">*</spsan></lebel>
                <input type="date"  data-date="" class="form-control mt-2 c13" id="dob" name="dob" placeholder="Enter Your D.O.B"
                <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['dob'] ?>" <?php } ?> required>
                
            </div>
            <p class="foot-para">A copy of your responses will be emailed to the address you provided.</p>
            <div class="submit-bt">
            
              <button type="submit" id="formSubmit" class="btn btn-info text-light sub-bt" name="submit"><strong>
                <?php if(isset($_SESSION['edit'])){ echo 'Edit'; }else{ echo 'Submit'; } ?>
                </strong></button>
              <button type="reset" class="btn btn-outline-dark rst-bt ">Reset</button>
            </div>
        </form>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script/validations.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    

</body>
</html>



