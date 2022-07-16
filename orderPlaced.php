<?php
include 'header.php';


if (!isset($_SESSION['user']) || $_SESSION['admin'] == 1) {
?>
  <p>ACCESS DENIED!</p>
<?php } else {
  //unset($_SESSION['cart']);
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

    .container {
      max-width: 960px;
    }
  </style>
  </head>

  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">BuyNow.com</a>
      

      <div class="navbar-nav">
        <ul class="navbar">
          <?php if (isset($_SESSION['user'])) { ?>
            <a class="nav-link px-3 " href="cart.php">
              <span class='bi bi-cart-x-fill' style='color:#fff; height:25px'></span>

            </a>

            <a class="nav-link px-3 " href="signout.php">Sign out</a>
            <?php echo "<span class='text-white' >" . $_SESSION['user'] . " </span>"; ?>


        </ul>

      </div>
    <?php } ?>
    </header>

    <?php if (isset($_POST['orderPlaced'])) {
      $name = $_POST['firstName'] . ' ' . $_POST['lastName'];
      $address = $_POST['address'] . ' ' . $_POST['city'];
      $country = "India";
      $state = $_POST['state'];
      $id = $_SESSION['id'];
      $zip = $_POST['zip'];
      $amount = $_POST['amount'];
      $method = $_POST['paymentMethod'];
      $Address = $_POST['address'] . ' ' . $_POST['city'].' '.$_POST['state'];
       

      $conn->query("START TRANSACTION");

      try {
        $sql = "INSERT INTO `Orders` (`order_id`, `id`, `status`, `address`, `order_date`, `delivery_date`,`total_amount`,`pin`,`CustomerName`) VALUES (NULL, '$id', 'pending', '$Address', now(), NOW() + interval 2 day,'$amount','$zip','$name');";


        $conn->query($sql);
       // echo ("Successfully Inserted");
      } catch (PDOException $e) {
       // echo "Connection failed: " . $e->getMessage();
      }

      $last_order_id="SELECT `order_id` FROM `Orders` ORDER BY `order_id` DESC LIMIT 1;
      ";
      try {
          $last_order=$conn->query($last_order_id);
        } catch (PDOException $e) {
              // echo "Connection failed: " . $e->getMessage();
            }
           $res= $last_order->fetchAll(PDO::FETCH_ASSOC);
           $last_Order_id=$res[0]['order_id'];


      foreach($_SESSION['cart'] as $key => $val){
         $qty=$val['quantity'];
         $item_price=$val['price'];
         $item_name=$val['name'];
        try {
          $sql = "INSERT INTO `Order_items` (`order_id`, `product_id`, `quantity`,`item_price`,`product_name`) VALUES ('$last_Order_id', '$key', '$qty','$item_price','$item_name');";
  
  
          $conn->query($sql);
        //  echo ("Successfully Inserted");
        } catch (PDOException $e) {
         // echo "Connection failed: " . $e->getMessage();
        }









      }


    ?>
      <h2>Your Order is Successfully Placed!</h2>
      <table class='table table-striped table-sm'>
        </tr>
        <tr>
          <th>Name</th>
          <th><?php echo ($name); ?></th>
        </tr>
        <tr>
          <th>Address</th>
          <th><?php echo ($address); ?></th>
        </tr>
        <tr>
          <th>State</th>
          <th><?php echo ($state); ?></th>
        </tr>
        <tr>
          <th>Country</th>
          <th><?php echo ($country); ?></th>
        </tr>
        <tr>
          <th>Pin Code</th>
          <th><?php echo ($zip); ?></th>
        </tr>
        <tr>
          <th>Total Amount</th>
          <th>₹<?php echo ($amount); ?></th>
        </tr>
        <tr>
          <th>Transaction ID</th>
          <th>98784549815736542</th>
        </tr>

        <tr>
          <th>Payment Method </th>
          <th><?php echo ($method); ?></th>
        </tr>








      </table>

      <a class="btn btn-primary" href="index.php">Go back to Shopping</a>



    <?php 
          $conn->query("COMMIT");

    }
     unset($_SESSION['cart']);
    ?>
    <script src="/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
  </body>

  </html>

<?php }
?>