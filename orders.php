
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


<h2 >Orders</h2>
      <div class="table-responsive">
        <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addProductForm">
  Add New Product
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      

          <div class="form-floating mb-3">
            <select name="User_type" id="selectStatus" class="form-control rounded-4" required>
             <option value="pending">Pending</option>
             <option value="approved">Approved</option>
             <option value="delivered">Delivered</option>





           </select>

          <label for="floatingPassword">Select Status</label>
          </div>


        




     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateStatus">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- edit modAL -->


<table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">User ID</th>
              <th scope="col">Customer Name</th>

              <th scope="col">Status</th>
              <th scope="col">Address</th>
              <th scope="col">PIN</th>
              <th scope="col">Total Amount(₹)</th>

              <th scope="col">Order Date</th>
              <th scope="col">Delivery Date</th>
              <th scope="col">Details</th>
              <th scope="col">Edit</th>



            </tr>
          </thead>
          <tbody>
         
          <?php
            try {
              $sql = "SELECT *
              from Orders";
 
                $res=$conn->query($sql);

                $rowss = $res->fetchAll(PDO::FETCH_ASSOC);

                $total=count($rowss);
               









              $limit=6;
                if(isset($_GET['page']))
                $page=$_GET['page'];
                else
                $page=1;
                $start=($page-1)*$limit;
                $pages=ceil($total/$limit);
              $sql = "SELECT *
                       from Orders order by order_id LIMIT $start,$limit";
          
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
                  <td><button class="btn btn-warning viewDetails" id="<?php echo($val['order_id']);?>">Details</button></td>
                  <td><button class="btn btn-primary updateStatusId" id="<?php echo($val['order_id']);?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button></td>





               </tr>
               
               <?php




               }
      
      
            
            
            
            
            } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }

         
  ?>




















           
          </tbody>
        </table>
        <nav aria-label="Page navigation example">
  <ul class="pagination">
     <?php for($i=1;$i<=$pages;$i++) { ?>
      <li class="page-item"><a class="page-link" href="?page=<?php echo($i);?>"><?php echo($i);?></a></li>

       <?php } ?>
  </ul>
</nav>
        <button id="dashboard" class="btn btn-secondary">Go Back To  Dashboard</button>
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