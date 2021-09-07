<?php
session_start();
  if(empty($_SESSION["id"])){
    header('location: login.html');
  }
include "php/selectseleditem.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>E-Commerce Products</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
<?php 
?>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <span class="navbar-brand" ><h2>Ecommerce <em>Services</em></h2></span>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="customerhome.php">Home
                </a>
              </li> 
                 <li class="nav-item">
                <a class="nav-link" href="products.php">Your Products</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="ownerselling.php">Your seled items</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  id="logout">Sign out</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Your Card</h4>
              <h2>Check your purchases</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
<?php 
$counter = 1;
if($flag){
  ?>
  <div class="row text-content">
              <div class="col-md-12">
                <div class="text-content text-center">
  <h3>You didn't sell any items yet</h3>
</div>
</div>
</div>
  <?php 
}
else
{
?>
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Item Name</th>
                          <th scope="col">Number of items sold</th>
                          <th scope="col">Total price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $total_earning = 0;
                        do{
                         $total_earning +=  $row2['totalprice'];
                        ?>
                        <tr>
                          <th scope="row">
                            <?php echo $counter ?>
                          </th>
                          <td>
                            <?php echo $row2['name'] ?>
                          </td>
                          <td>
                            <?php echo $row2['countn']." items" ?>
                          </td>
                          <td>
                            <?php echo $row2['totalprice']."$" ?>
                          </td>
                        </tr>
                     <?php  
                     $counter +=1;
                   }while($row2 = $result1->fetch_assoc()); 
                   ?>
                      </tbody>
                    </table>
                    <div class="alert-success">
                    <h5 class="text-center">Your total earning is : <?php echo $total_earning."$"; ?></h5></div>
                  <?php 
                    }
                    ?>
      </div>
    </div>

<?php 
$counter = 1;
if($flag2){
  ?>
        <div class="products">
      <div class="container">
  <div class="row text-content">
              <div class="col-md-12">
                <div class="text-content text-center">
</div>
</div>
</div>
                    <div class="alert-success">
                    <h5 class="text-center">Your monthly revenue:</h5></div></br></br>
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Total earning</th>
                          <th scope="col">Month</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        do{
                        ?>
                        <tr>
                          <th scope="row">
                            <?php echo $counter ?>
                          </th>
                          <td>
                            <?php echo $row3['totalprice']." $" ?>
                          </td>
                          <td>
                            <?php $monthNum = $row3['month'];
                            $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                            $monthName = $dateObj->format('F');
                            echo $monthName;
                            ?>
                          </td>
                        </tr>
                     <?php  
                     $counter +=1;
                   }while($row3 = $result2->fetch_assoc()); 
                   ?>
                      </tbody>
                    </table>
                    <div class="alert-success">
      </div>
    </div>

<?php }?>
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2021 Thank you for your trust.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/logout.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
