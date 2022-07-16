<?php
include 'header.php';


if(!isset($_SESSION['user'])||$_SESSION['admin']==1){
?>
<p>ACCESS DENIED!</p>
<?php }
else { ?>
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
    <?php if(isset($_SESSION['user'])) { ?>
      <a class="nav-link px-3 " href="cart.php">
     <span class='bi bi-cart-x-fill' style='color:#fff; height:25px'></span>
     <?php if(isset($_SESSION['cart'])) { ?>
     <span class="position-absolute  translate-middle badge rounded-pill bg-danger">
     <?php echo(count($_SESSION['cart'])); ?>
      </span>
    <?php }
    ?> 
    </a>

  <a class="nav-link px-3 " href="signout.php">Sign out</a>
  <a href="myOrders.php" style="text-decoration:none"> <?php  echo "<span class='text-white mx-2' >".$_SESSION['user']." </span>"; ?></a>


    </ul>
 
    </div>
    <?php } ?>
</header>
  <div class="container-fluid">

  <div class="row">

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


<h2 >Your Orders</h2>
<div class="table-responsive">

      <?php
          $id = $_SESSION['id'];

    if(isset($_SESSION['id'])){

        try {
            $sql = "SELECT *
                     from Orders where Orders.id='$id'";
        
             $res=$conn->query($sql);
    
             $rows = $res->fetchAll(PDO::FETCH_ASSOC);

            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }









  if(count($rows)>0){ ?>

<table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Order ID</th>

              <th scope="col">Status</th>
              <th scope="col">Address</th>
              <th scope="col">PIN</th>
              <th scope="col">Total Amount (₹)</th>

              <th scope="col">Order Date</th>
              <th scope="col">Delivery Date</th>
              <th scope="col">Details</th>



            </tr>
          </thead>
          <tbody>





   <?php  foreach($rows as $key => $val){ ?>
        
    <tr>
                  <td><?php echo($val['order_id']);?></td>
                  <td><?php echo($val['status']);?></td>
                  <td><?php echo($val['address']);?></td>
                  <td><?php echo($val['pin']);?></td>
                  <td>₹<?php echo($val['total_amount']);?></td>
                  <td><?php echo($val['order_date']);?></td>
                  <td><?php echo($val['delivery_date']);?></td>
                  <td><button class="btn btn-warning viewDetailsOrder" id="<?php echo($val['order_id']);?>">Details</button></td>





               </tr>
   

<?php }

      
      

?>
  
  </tbody>
        </table>
<a class="btn btn-primary" href="index.php">Go back to Shopping</a>
<?php }
else{
    echo("You have not ordered anything yet!");
} 
}
else{ ?>
    <p>You haven't placed any orders!</p>
<?php
} 
?>
  <script src="/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>

<?php }
?>