<?php
                            session_start();
                            include('config.php');
                            $id=$_SESSION['id'];
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
    th{
      text-align:center;  
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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="stores.php">Stores</a>
                      <a class="dropdown-item" href="add-stores.php">Add Products</a>
                      <a class="dropdown-item" href="addproducts.php">Add Stores</a>
                      <a class="dropdown-item" href="terms.html">Terms</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="checkout.php">Orders</a></li>

                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>


                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>


    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">User Accounts</h4>

                    <div class="table-responsive">
                        <!-- <form action="up.php" method="post" target="_blank"> -->
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 50px;">ID<br></th>
                                    <th scope="col">Store Name</th>
                                    <th scope="col">Email</th>

                                    <th scope="col">Phone</th>
                                    <th scope="col">Description<br></th>
                                </tr>
                            </thead>
                            <tbody>

                           
                            <?php
                                // For transactions in Home Page(index page)
                                $query_for_transactions = "SELECT * FROM stores WHERE seller_id='$id'";
                                $transaction_result = mysqli_query($conn,$query_for_transactions);
                                $no_of_transaction = mysqli_num_rows($transaction_result);

                                while($row = mysqli_fetch_array($transaction_result)) {
                                   echo 
                                   '<tr>                                             
                                        <td style="text-align:center">
                                            <div class="avatar-xs" style="background-color: white;" >
                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary" style="background-color: white;">
                                                '.$row['store_id'].'
                                                    
                                                </span>&nbsp;
                                            </div>
                                        </td>
                                        <td style="text-align:center">
                                           <h3 class="font-size-15 mb-0">'.$row['sname'].' </h3>
                                            
                                        </td>
                                        <td style="text-align:center">'.$row['semail'].'</td>
                                        <td style="text-align:center">'.$row['sphone'].'</td>
                                        <td style="text-align:center">'.$row['description'].'</td>
                                        <div class="col-sm-4"><br></div></td>
                                        
                                </tr>';
                               } 
                               
                            ?>
                            </tbody>
                        </table>
                                                                                        <!-- </form> -->
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
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
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
  </body>
</html>