<?php
session_start();
include 'partials/_dbconnect.php';


if (isset($_REQUEST['id'])){
$edit_flag=true;
$sql = "SELECT * from info2 where stu_id=".$_REQUEST['id'];
$res=mysqli_query($conn,$sql);
if($res){

$row = mysqli_fetch_array($res);
//$a=$row["fid"];
//$b=explode(",",$a);
}
}else{
    $edit_flag=false;
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

    <title>edit</title>
  </head>
  <body style="background-color:#ebf6ff;">


  <?php require 'partials/_nav.php' ?>
    


    <div class="container my-4">
     <h1 class="text-center">Edit</h1>
     <form action="<?php if (!$edit_flag) echo '/temp/signup.php'; else echo 'update.php';?>" method="post"  enctype="multipart/form-data">
<?php if ($edit_flag) { ?>
<input name="stu_id" value=<?php echo $_REQUEST['id']; ?> type="hidden">

<?php
}
?>
        <div class="form-group">
            <label for="username"><strong>Username</strong></label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username" aria-describedby="emailHelp" value="<?php if ($edit_flag) echo $row['userName']; ?>" >
            
        </div>
        
        <div class="form-group">
                     <label for="" ><strong>Parent Name</strong></label>
                      <input type="text" name="parentName" required  class="form-control" placeholder="Enter Parent Name" value="<?php if ($edit_flag) echo $row['parentName']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for=""> <strong> Student address</strong></label>
                        <input type="text" name="address" required  class="form-control" placeholder="Enter address" value="<?php if ($edit_flag) echo $row['address']; ?>" >
                    </div>
                    
                    <div class="form-group">
                        <label for="email"> <strong> Student Email</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php if ($edit_flag) echo $row['email']; ?>">
                    </div>

                    <div class="form-group">
                    <label for="email"> <strong> Gender</strong> </label>
                    <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" 
                    <?php if($row['gender']=='m') echo 'CHECKED' ?> id="male"><strong>Male</label>
                    <label for="Female" class="radio-inline"><input type="radio" name="gender" value="f" <?php if($row['gender']=='f') echo 'CHECKED' ?> id="Female"><strong>Female</strong></label>
                    <label for="Others" class="radio-inline"><input type="radio" name="gender" value="o" <?php if($row['gender']=='o') echo 'CHECKED' ?> id="Others"><strong>Others</strong></label>
                    </div>

                    <div class="mb-3">
                <lebel for="religion"><strong>Religion:</strong></lebel>
                <select name="rele" class="form-select" aria-label="Default select example">
                  <option selected>Select your religion</option>
                  <?php
                      //include 'partials/_dbconnect.php';
                        $sql="SELECT rid, religions FROM religion2";
                        $result=mysqli_query($conn,$sql);
                        
                        while ($rele= mysqli_fetch_assoc($result)) {
                            if ($row['rel_id']==$rele['rid']) $religion_selected = 'SELECTED';
                            else  $religion_selected = '';
                        ?>
                        <option <?php echo $religion_selected; ?>  value="<?php echo $rele["rid"]; ?>"><?php echo $rele["religions"]; ?></option>
                        <?php
                      }
                      ?>
                  </select>
            </div>



            <div class="mb-3 form-value-container">
                <label for="facility" class="form-label" name="facilities"><strong>Facilities availed:</strong></label>
                  <br>
                  <?php
                   // include 'partials/_dbconnect.php'; 
                    $sql_facility="SELECT fid,facilities FROM facility2";
                    $result_facility=mysqli_query($conn,$sql_facility);
                    while($rel_facility=mysqli_fetch_assoc($result_facility)){
                      $facility_selected = '';
                      if($edit_flag){
                        $sel_query="select fid from facility_info2 where stu_id =".$_REQUEST['id']." and fid=".$rel_facility['fid'];
                        $res2=mysqli_query($conn,$sel_query);
                        $fac_row=mysqli_fetch_assoc($res2);
                        if (mysqli_num_rows($res2) > 0 ) $facility_selected = 'CHECKED';
                        else $facility_selected = '';
                      //if ($fac_row['fid']==$rel_facility['fid']) 
                      //$facility_selected = 'CHECKED';
                        }
                     // }
                      ?>
                      <div class="form-check form-check-inline ms-3 col-3">
                      <input class="form-check-input" type="checkbox" <?php echo $facility_selected; ?> name="facility[]" value="<?php echo $rel_facility["fid"]; ?>">
                      <label class="form-check-label" for="inlineCheckbox"><?php echo $rel_facility["facilities"]; ?></label>
                      </div>


                      <?php
                    }
                
                  ?>                 
            </div>


            

    <div class="mb-3">
  <label for="formFile" class="form-label">Upload File </label>
  <input class="form-control" type="file" name="img" id="formFile">
</div>
   
                        


         
        <button type="submit" class="btn btn-primary">Update</button>
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