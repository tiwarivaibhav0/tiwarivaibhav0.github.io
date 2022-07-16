<?php
include 'header.php';


if (!isset($_SESSION['user']) || $_SESSION['admin'] == 1) {
?>
  <p>ACCESS DENIED!</p>
<?php } else { ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <link href="dashboard.css" rel="stylesheet">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  </head>

  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 ">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">BuyNow.com</a>
      <!-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span> 
  </button>  -->

      <div class="navbar-nav">
        <ul class="navbar">
          <?php if (isset($_SESSION['user'])) { ?>
            <a class="nav-link px-3 " href="cart.php">
              <span class='bi bi-cart-x-fill' style='color:#fff; height:25px'></span>
              <?php if (isset($_SESSION['cart'])) { ?>
                <span class="position-absolute  translate-middle badge rounded-pill bg-danger" id="cartCount">
                  <?php echo (count($_SESSION['cart'])); ?>
                </span>
              <?php }
              ?>
            </a>

            <a class="nav-link px-3 " href="signout.php">Sign out</a>
            <a href="myOrders.php" style="text-decoration:none"> <?php echo "<span class='text-white mx-2' >" . $_SESSION['user'] . " </span>"; ?></a>


        </ul>

      </div>
    <?php } ?>
    </header>
    <div class="container-fluid">

      <div class="row">

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


          <h2>Cart</h2>
          <div class="table-responsive">

            <?php

            if (isset($_SESSION['cart'])) {
              if (count($_SESSION['cart']) > 0) {
                $text = "<table class='table table-striped table-sm'>";
                $text .= "<tr><th>Name</th><th>Category</th><th>Price</th><th>Quantity</th><th>Action</th></tr>";
                foreach ($_SESSION['cart'] as $key => $val) {

                  $text .= "<tr><td>" . $val['name'] . "</td><td>" . $val['category'] . "</td>₹<td>" . $val['price'] . "</td><td><span class=' fs-6 btn dec  btn-outline-info' id='$key'>-</span><span class='h5 quantVal'>" . ' ' . $val['quantity'] . ' ' . "</span><span class='fs-6 inc btn btn-outline-info' id='$key'>+</span></td><td><a href='#' class='deleteCart btn btn-danger' id='$key'><i class='bi bi-trash'></i></a></td></tr>";
                }
                //echo(print_r($_SESSION['cart']));
                $text .= "</table>";

                echo $text;



            ?>
                <button class="btn btn-primary" id="checkOut">Checkout</button>
              <?php } else {
                echo ("Your cart is empty!");
              }
            } else { ?>
              <p>Your Cart is empty!</p>
            <?php
            }
            ?>
            <a class="btn btn-primary" href="index.php">Go back to Shopping</a>

            <script src="/js/bootstrap.bundle.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
            <script src="dashboard.js"></script>
  </body>

  </html>

<?php }
?>