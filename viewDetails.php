
<?php
include 'header.php';



if(!isset($_SESSION['user'])||$_SESSION['admin']==0){
  ?>
  <p>ACCESS DENIED!</p>
  <?php }
  else {
?>
  <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="dashboard.php">BuyNow.com</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <?php if(isset($_SESSION['user'])) { ?>
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="signout.php">Sign out</a>
    </div>
    <?php } ?>
  </div>
</header>



  <div class="container-fluid">

  <div class="row">

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


<h2 >Order ID : <?php echo( $_SESSION['viewId']);?></h2>
      <div class="table-responsive">
       
<table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Product ID</th>
              <th scope="col">Product Name</th>

              <th scope="col">Quantity</th>
              <th scope="col">Price (₹)</th>
            



            </tr>
          </thead>
          <tbody>
         
          <?php
         
               foreach($_SESSION['viewOrderDetails'] as $key => $val){     ?>    
                <tr>
                  <td><?php echo($val['order_id']);?></td>
                  <td><?php echo($val['product_id']);?></td>
                  <td><?php echo($val['product_name']);?></td>
                  <td><?php echo($val['quantity']);?></td>
                  <td>₹<?php echo($val['item_price']);?></td>
                 





               </tr>
               
               <?php




               }
      
      
            
            
            

         
  ?>




















           
          </tbody>
        </table>
        <a href="orders.php"  class="btn btn-secondary">Go Back To All Orders</a>
      </div>
</main>
</div>
</div>

<script src="/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>
<?php }

?>