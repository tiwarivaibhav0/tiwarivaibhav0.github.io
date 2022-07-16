

<?php
include 'header.php';


if(!isset($_SESSION['user'])||$_SESSION['admin']==0){
?>
<p>ACCESS DENIED!</p>
<?php }
else { ?>
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

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">BuyNow.com</a>
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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item" id="Orders">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              <span >Orders</span>
            </a>
          </li>
          <li class="nav-item" id="Products">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <span >Products</span>
            </a>
          </li>
          <li class="nav-item" id="Users">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              <span >Users</span>
            </a>
          </li>
          
        </ul>

      
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        
      </div>

<br><br>
      <h2 >Orders</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">User ID</th>
              <th scope="col">Customer Name</th>

              <th scope="col">Status</th>
              <th scope="col">Address</th>
              <th scope="col">PIN</th>
              <th scope="col">Total Amount (₹)</th>

              <th scope="col">Order Date</th>
              <th scope="col">Delivery Date</th>


            </tr>
          </thead>
          <tbody>
         
          <?php
            try {
              $sql = "SELECT *
                       from Orders order by order_id desc limit 5";
          
               $res=$conn->query($sql);
      
               $rows = $res->fetchAll(PDO::FETCH_ASSOC);
               //var_dump($rows);
               foreach($rows as $key => $val){     ?>    
                <tr>
                  <td><?php echo($val['order_id']);?></td>
                  <td><?php echo($val['id']);?></td>
                  <td><?php echo($val['CustomerName']);?></td>
                  <td><?php echo($val['status']);?></td>
                  <td><?php echo($val['address']);?></td>
                  <td><?php echo($val['pin']);?></td>
                  <td>₹<?php echo($val['total_amount']);?></td>
                  <td><?php echo($val['order_date']);?></td>
                  <td><?php echo($val['delivery_date']);?></td>





               </tr>
               
               <?php




               }
      
      
            
            
            
            
            } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }

         
  ?>




















           
          </tbody>
        </table>
      </div>


      <br><br>

      <h2>Products</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Product ID</th>
              <th scope="col">Product Name</th>
              <th scope="col">Category</th>
              <th scope="col">Product Price (₹)</th>
            </tr>
          </thead>
          <tbody>
          <?php
            try {
              $sql = "SELECT *
                       from Product order by product_id desc limit 5";
          
               $res=$conn->query($sql);
      
               $rows = $res->fetchAll(PDO::FETCH_ASSOC);
               //var_dump($rows);
               foreach($rows as $key => $val){     ?>    
                <tr>
                  <td><?php echo($val['product_id']);?></td>
                  <td><?php echo($val['product_name']);?></td>
                  <td><?php echo($val['category']);?></td>
                  <td>₹<?php echo($val['product_price']);?></td>
               </tr>
               
               <?php




               }
      
      
            
            
            
            
            } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }

         
  ?>
           
           
          </tbody>
        </table>
      </div>

  <br> <br>
      <h2>Users</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">FirstName</th>
              <th scope="col">LastName</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
            </tr>
          </thead>
          <tbody>
            <?php
            try {
              $sql = "SELECT *
                       from User order by id desc limit 5";
          
               $res=$conn->query($sql);
      
               $rows = $res->fetchAll(PDO::FETCH_ASSOC);
               //var_dump($rows);
               foreach($rows as $key => $val){     ?>    
                <tr>
                  <td><?php echo($val['id']);?></td>
                  <td><?php echo($val['firstname']);?></td>
                  <td><?php echo($val['lastname']);?></td>
                  <td><?php echo($val['email']);?></td>
                  <td><?php echo($val['role']);?></td>
               </tr>
               
               <?php




               }
      
      
            
            
            
            
            } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }

         
  ?>
          </tbody>
        </table>
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