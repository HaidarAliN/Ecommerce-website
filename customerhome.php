<?php
  session_start();
  if(empty($_SESSION["id"])){
    header('location: login.html');
  }
  if($_SESSION["type"]==1){
    header('location: ownerhome.php');
  }
  include "php/allshops.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>E-Commerce - Customer page</title>

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
              <li class="nav-item active">
                <a class="nav-link" href="php/login.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
                            <li class="nav-item">
                <a class="nav-link" href="card.php">Your card</a>
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
    <!-- Banner Starts Here -->
<div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>shops</h4>
              <h2>Check out all the stores registered on our website</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
          <div class="col-md-12">
            <div class="filters-content">
               <?php 
               $x = 0;
                  while($row = $result->fetch_assoc()){

                    if($x % 3 == 0){
                  ?>
                <div class="row grid">
                <?php } ?>
                    <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                        <a href=<?php echo "customerproduct.php?sid=".$row['id'] ?>><img src='<?php echo $row['image_path']; ?>' alt=""></a>
                        <div class="down-content">
                          <a href=<?php echo "customerproduct.php?sid=".$row['id'] ?>><h4><?php echo $row['name'] ?></h4></a>
                          <h6><?php echo $row['category'] ?></h6>
                          <!-- <p><?php echo $row['description'] ?></p> -->
                        </div>
                      </div>
                    </div>
                    <?php
                    if(($x+1) % 3 == 0){
                      ?>
                    </div>
                    <?php
                  }
                  $x = $x + 1;
                  }
                  ?>
                    
                </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    

    
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
