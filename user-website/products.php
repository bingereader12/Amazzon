<?php 
session_start();
include('config.php');
$uid=$_SESSION['id'];


if(isset($_POST['submit'])){
  $pid=$_POST['pid'];
  $q=$_POST['quantity'];

  $select = "SELECT * FROM cart WHERE pid='$pid' AND uid='$uid'";
  $as = mysqli_query($conn, $select);

  $r="SELECT * FROM products WHERE pid='$pid'";
  $y=mysqli_query($conn,$r);
  $t=mysqli_fetch_array($y);

  if(mysqli_num_rows($as) > 0){
    $at=mysqli_fetch_array($as);
    $q1=$q+$at['quantity'];
    $u = "UPDATE cart SET quantity='$q1' WHERE uid='$uid' AND pid='$pid'";
    mysqli_query($conn, $u);
  }else{
    $i = "INSERT INTO cart(pid, store_id, pname, price, quantity, uid) VALUES ('$pid', '{$t['store_id']}', '{$t['pname']}', '{$t['price']}', '$q', '$uid')";
    mysqli_query($conn, $i);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Amazzon</title>
     
    <style>
  .transparent-button {
    background-color: transparent;
    border: none;
    color: #000; /* Set the desired color for the text */
    font-weight: bold; /* Apply bold style to the text */
    cursor: pointer; /* Set cursor style to indicate interactivity */
  }
</style>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
          <a class="navbar-brand" href="index.html"><h2>Online Store <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="products.php">Products</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.php">About Us</a>
                      <a class="dropdown-item" href="blog.php">Blog</a>
                      <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                      <a class="dropdown-item" href="terms.php">Terms</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>

                <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>


                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>

                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>

            </ul>
          </div>
        </div>
      </nav>
</header>


    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <h2>Products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="addproducts.php"><button style="margin-top:6%; margin-left:46%;" class="btn btn-primary">Add Product</button></a>
    <div class="products">
      <div class="container">
        <div class="row">
        
        <?php
  $select2="SELECT * FROM products";
  $ra=mysqli_query($conn, $select2);
  while($row=mysqli_fetch_array($ra)){
    echo '
      <div class="col-md-4">
        <div class="product-item">
          <img src="./../seller-website/uploads/'.$row['image'].'" alt="">
          <div class="down-content">
            <form action="product-details.php" method="POST"><input name="pid" value='.$row['pid'].' hidden><button class="transparent-button" type="submit" name="submit"><h4>'.$row['pname'].'</h4></button></form>
            <h6>$'.$row['price'].'</h6>
            <p>'.$row['descri'].'</p>
            <div style="text-align: center;">
            <form action="" method="post"> 
            <input name="pid" value='.$row['pid'].' hidden>
            <input type="number" name="quantity" style="width: 60px; border: solid; border-radius: 6px; text-align:center;" placeholder="1" />
            <button class="btn btn-primary" type="submit" name="submit">Add to Cart</button>
            </form>
            </div>
          </div>
        </div>
      </div>';
  }
?>

        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
