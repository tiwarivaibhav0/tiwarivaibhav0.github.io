<?php
include 'header.php';
if (isset($_SESSION['user']))
  if ($_SESSION['admin'] == 1)
    header('Location: dashboard.php');


?>
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
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">BuyNow.com</a>
    <!-- <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search" id="find"> -->


    <div class="navbar-nav">
      <ul class="navbar">
        <?php if (isset($_SESSION['user'])) { ?>
          <a class="nav-link px-3 " href="cart.php">
            <span class='bi bi-cart-x-fill' style='color:#fff; height:25px'></span>
            <?php if (isset($_SESSION['cart'])) { ?>
              <span class="position-absolute  translate-middle badge rounded-pill bg-danger" id="cartCount">
                <?php echo (count($_SESSION['cart'])); ?>
              </span>
            <?php } else { ?>
              <span class="position-absolute  translate-middle badge rounded-pill bg-danger" id="cartCount">
                0 </span>

            <?php  }
            ?>
          </a>


          <a class="nav-link px-3 " href="signout.php">Sign out</a>
          <a href="myOrders.php" style="text-decoration:none"> <?php echo "<span class='text-white mx-2' >" . $_SESSION['user'] . " </span>"; ?></a>


      </ul>

    </div>
  <?php } else { ?>
    <a class="nav-link px-3 btn btn-light text-dark mx-3" href="login.php">Log in</a>


    </ul>

  <?php  } ?>
  </header>
  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">BuyNow.com</h1>
          <p class="lead text-muted">“Ecommerce isn’t the cherry on the cake, it’s the new cake”.Be a part of the party & have a piece of the cake now.</p>
          <p>
            <a href="#" class="btn btn-primary my-2" id="clickSort">Sort By Price</a>
            <a href="#" class="btn btn-secondary my-2" id="clickCategory">
              Filter By Category

            </a>
          <div>
            <select name="sort" id="sortPrice">
              <!-- <option value="">Filter By Category</option> -->
              <option value="">Choose..</option>
              <option value="Ascending">Low To High</option>
              <option value="Descending">High To Low</option>




            </select>
            <select name="filter" id="selectFilter">
              <option value="">Select Category</option>

              <option value="electronics">Electronics</option>
              <option value="fashion">Fashion</option>
              <option value="furniture">Furniture</option>
              <option value="jewellery">Jewellery</option>
              <option value="clear" class="text-white bg-danger">Clear Filter</option>





            </select>
          </div>



          </p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <!-- Before Filter Section -->

          <?php if (!isset($_SESSION['filter'])) {
            try {
              if (!isset($_SESSION['sortDesc']))
                $sql = "SELECT *
                       from Product order by `product_price`";
              else
                $sql = "SELECT *
                       from Product order by `product_price` DESC";


              $res = $conn->query($sql);

              $rows = $res->fetchAll(PDO::FETCH_ASSOC);

              // echo(count($rows));

            } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            } ?>






            <?php foreach ($rows as $key => $val) {     ?>


              <div class="col">
                <div class="card shadow-sm">
                  <!-- <svg class="" width="100%" height="225px" xmlns="http://www.w3.org/2000/svg" role="img"  preserveAspectRatio="xMidYMid slice" focusable="false">
            </svg> -->
                  <img width="100%" height="225px" src="<?php echo ($val['product_image']); ?>" />

                  <div class="card-body">
                    <p>
                      <span><?php echo ($val['product_name']) ?></span>
                      <span class="float-end">₹<?php echo ($val['product_price']) ?></span>


                    </p>
                    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <div class="d-flex justify-content-between align-items-center">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Details</button>
                      <?php if (isset($_SESSION['user'])) { ?>
                        <button type="button" class="cart btn btn-sm  btn-primary float-end" id='<?php echo ($val['product_id']) ?>'>Add to cart</button>
                      <?php } else { ?>
                        <a href="login.php" class="btn btn-sm  btn-danger float-end">Add to cart</a>

                      <?php } ?>

                    </div>
                  </div>
                </div>
              </div>

            <?php } ?>


        </div>
      </div>
    </div>

  </main>
<?php } else {
            $cat = $_SESSION['filter'];
            try {
              if (!isset($_SESSION['sortDesc']))
                $sql = "SELECT *
             from Product WHERE `category`='$cat' order by `product_price` ";
              else
                $sql = "SELECT *
     from Product WHERE `category`='$cat' order by `product_price` DESC";


              $res = $conn->query($sql);

              $rows = $res->fetchAll(PDO::FETCH_ASSOC);

              // echo(count($rows));

            } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            } ?>






  <?php foreach ($rows as $key => $val) {     ?>


    <div class="col">
      <div class="card shadow-sm">
        <!-- <svg class="" width="100%" height="225px" xmlns="http://www.w3.org/2000/svg" role="img"  preserveAspectRatio="xMidYMid slice" focusable="false">
  </svg> -->
        <img width="100%" height="225px" src="<?php echo ($val['product_image']); ?>" />

        <div class="card-body">
          <p>
            <span><?php echo ($val['product_name']) ?></span>
            <span class="float-end">₹<?php echo ($val['product_price']) ?></span>


          </p>
          <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
          <div class="d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-sm btn-outline-secondary">Details</button>
            <?php if (isset($_SESSION['user'])) { ?>
              <button type="button" class="cart btn btn-sm  btn-primary float-end" id='<?php echo ($val['product_id']) ?>'>Add to cart</button>
            <?php } else { ?>
              <a href="login.php" class="btn btn-sm  btn-danger float-end">Login to Add to cart</a>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>

  <?php } ?>


  </div>
  </div>
  </div>

  </main>
<?php




          }
?>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
  </div>
</footer>

</body>

</html>