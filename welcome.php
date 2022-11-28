<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


if($_SESSION['verify']=='User'){
  echo "checked value1"."<br>";
}
else{
  echo "checked value2";
}

// $cookie_name = 'silicon';

// if(!isset($_COOKIE[$cookie_name])) {

// echo "cookie named". $cookie_name. " is not set!";
// } else{

//   echo "cookie". $cookie_name. "is set!<br>";
//   echo "value is:" . $_COOKIE[$cookie_name];
// }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <!--required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <link rel="stylesheet" href="style2.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

<!-- for datatable-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.0/datatables.min.css"/>


   
<link rel="preconnect" href=" https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
      <link rel="preconnect" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
  

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">  
     
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
 <style>
 img:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
</style>

  
    <title>Welcome</title>
  </head>
  <body style="background-color:#f3cece;">



  


  <div class="c1">
<nav class="navbar navbar-light bg-info">
  <div class="container-fluid">
   
    <a class="navbar-brand" href="#">
      <img src="images/logo2.jpg" alt="" width="100" height="110" class= "d-inline-block align-text-centre"><b>
      
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Photography Club</b>
    </a>
  

  </div>
</nav>
</div>





  <?php require 'partials/_nav.php' ?>
    Welcome - <?php echo $_SESSION['username']?>




<!--carousel-->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/turtle-1137608_1920.jpg" class="d-block w-100" alt="..." height=500px width=1200px >
    </div>
    <div class="carousel-item">
      <img src="images/frog.webp" class="d-block w-100" alt="..." height=500px width=1200px>
    </div>
    <div class="carousel-item">
      <img src="images/bird.jpg" class="d-block w-100" alt="..." height=500px width=1200px>
      
     
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>




<!--cards-->

<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="images/wood duck.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Wood Duck</h5>
        <p class="card-text">The Wood Duck is one of the most stunningly pretty of all waterfowl. Males are iridescent chestnut and green, with ornate patterns on nearly every feather; the elegant females have a distinctive profile and delicate white pattern around the eye. These birds live in wooded swamps, where they nest in holes in trees or in nest boxes put up around lake margins. They are one of the few duck species equipped with strong claws that can grip bark and perch on branches.</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 30 seconds ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="images/elephant.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Elephant</h5>
        <p class="card-text">Elephants are the largest land mammals on earth and have distinctly massive bodies, large ears, and long trunks. They use their trunks to pick up objects, trumpet warnings, greet other elephants, or suck up water for drinking or bathing, among other uses. Both male and female African elephants grow tusks and each individual can either be left- or right-tusked, and the one they use more is usually smaller because of wear and tear. </p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 5 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="images/hawk.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Wild Hawk</h5>
        <p class="card-text">Pretty sure this hawk and 2 of its siblings recently left their nest. This one was awkwardly trying to snag a squirrel  by attacking it from the ground. The squirrel eventually tired of the nonsense and chased the hawk to this tree. It was pretty funny to see, would have done better to shoot manually with a slower shutter speed to try and lower the iso. But not too bad for kit lens and fairly dark conditions in the trees.</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 7 mins ago</small>
      </div>
    </div>
  </div>
</div>

<p> <strong>Hover over the image:</strong></p>
<img src="images/book2.jpg" alt="book" width="300" height="300">

      
<!--Accordion-->

<div class="accordion hide" id="accordionExample">
  
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
       Data table
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
<!-- Data table -->

<div class="clearfix tableBox table-responsive">
<table id="students" class="table display" style="width:100%">
<thead>
  <tr>
      <th>username</th>
      <th>parentName</th>
      <th>address</th>
      <th>email</th>
      <th>gender</th>
      <th>rel_id</th>
      <th>facilities</th>
      <th>student images</th>
      <th>Edit/Delete</th>
</tr>
</thead>

      <tbody>


<?php
include 'partials/_dbconnect.php';

$sql=  "SELECT * FROM info2, religion2
WHERE info2.rel_id = religion2.rid";
$res=mysqli_query($conn,$sql) ;
while($sql_arr=mysqli_fetch_assoc($res)){

?>
<tr>


      <td data-head="userName"> <?php echo $sql_arr['userName'] ?> </td>
      <td data-head="parentName"> <?php echo $sql_arr['parentName'] ?> </td>
      <td data-head="address"> <?php echo $sql_arr['address'] ?> </td>
      <td data-head="email"> <?php echo $sql_arr['email'] ?> </td>
      <td data-head="gender"> <?php echo $sql_arr['gender'] ?> </td>
      <td data-head="religions"> <?php echo $sql_arr['religions'] ?> </td>
<!---->

<td>
<?php
$facilities_name = '';

$sqli="SELECT facilities FROM `facility_info2` fi, facility2 fa 
WHERE stu_id=".$sql_arr['stu_id']." and fi.fid= fa.fid";
$resi=mysqli_query($conn,$sqli) ;
while($sqli_arr=mysqli_fetch_assoc($resi)){
$facilities_name .= $sqli_arr['facilities'].',';
}

echo $facilities_name = trim($facilities_name,", ");


?>

</td>

<!---->
      <td data-head="stu_images"> <?php echo $sql_arr['stu_images'] ?> </td>

      <td><?php echo '<a href=edit.php?id='.$sql_arr['stu_id'].'>edit</a> /<a '?>onclick ="return confirm(are you sure you want to delete this item ?');"<?php echo 'href=delete.php?id='.$sql_arr['stu_id']; ?>>Delete</a></td>


     


      </tr>
      <?php
}
?>


</tbody>

</table>





      </div>
    </div>
  </div>
</div>






<!--/Acoordion-->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

-->

    <!-- for datatable-->
    
   <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
-->




<!-- data table jquery required  -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.0/datatables.min.js"></script>

<!-- data table buttons script links -->

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>      
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>



<script>
    $(document).ready(function () {
        $('students').DataTable({
            "searching": true,
            "pageLength": 5,
            "paging": true,
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
          ]

        });
    });
</script>

<script>

$('.del_btn').click(function(e){

var del=confirm('Are you sure you want to delete this item?');

if(del!=true){
e.preventDefault();
}

});
</script>
</script>





<!--
<script>
$(document).ready(function(){
$('students').datatable( {
dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
});

});

//<script>
//function confirm()
//{

//return Confirm('Are you sur you want to delete this record');

//}



</script>
-->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>