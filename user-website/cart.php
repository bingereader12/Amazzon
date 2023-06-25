<?php 
session_start();
include('config.php');
$uid=$_SESSION['id'];
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


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <style>
    #return{
      margin-left:40%;
    }
    #ahead{
      margin-left:1%;
    }

    </style>
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

                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>

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
              <h2>Cart</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products call-to-action">
      <div class="container">
      <div class="table-responsive">
                        <!-- <form action="up.php" method="post" target="_blank"> -->
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr style="text-align:center;">
                                    <th scope="col" style="width: 50px;">PID<br></th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Store Name</th>

                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price<br></th>
                                </tr>
                            </thead>
                            <tbody>

                           
                            <?php
$query_for_transactions = "SELECT * FROM cart WHERE uid='$uid'";
$transaction_result = mysqli_query($conn, $query_for_transactions);

while ($row = mysqli_fetch_array($transaction_result)) {
  $s = "SELECT sname FROM stores WHERE store_id='{$row['store_id']}'";
  $sn_result = mysqli_query($conn, $s);
  $sn_row = mysqli_fetch_array($sn_result);

  $a=$row['quantity'];
  $b=$row['price'];
  $c=$a*$b;

  echo '
    <tr>
      <td style="text-align:center">
        <div class="avatar-xs" style="background-color: white;">
          <span class="avatar-title rounded-circle bg-soft-primary text-primary" style="background-color: white;">
            ' . $row['pid'] . '
          </span>&nbsp;
        </div>
      </td>
      <td style="text-align:center">
        <h4 class="font-size-15 mb-0">' . $row['pname'] . '</h4>
      </td>
      <td style="text-align:center">' . $sn_row['sname'] . '</td>
      <form action="" method="post">
      <input name="pid" value='.$row['pid'].' hidden>
      <td style="text-align:center"><input type="number" name="quantity" style="width: 60px; border: solid; border-radius: 6px; text-align:center;" value='.$row['quantity'].' />
      <button style="width: 80px;" class="btn btn-primary" type="submit" name="submit">Update</button></td></form>
      <td style="text-align:center">' .$c. '</td>
    </tr>';
}
?>

                            </tbody>
                        </table>
                                                                                        <!-- </form> -->
                    </div>
     </div>
    </div>
    <br><br>

    
    <a href="products.php"><button id="return" class="btn btn-danger">Continue Shopping</button></a><a href="checkout.php"><button id="ahead" class="btn btn-primary">Checkout</button></a>

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
