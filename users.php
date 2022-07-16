
<?php
include 'header.php';



if(!isset($_SESSION['user'])||$_SESSION['admin']==0){
  ?>
  <p>ACCESS DENIED!</p>
  <?php }
  else {
?>
  <link href="dashboard.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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


<h2 >Users</h2>
      <div class="table-responsive">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New User
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-floating mb-3">
            <input type="text" name="fname" class="form-control rounded-4" id="admin_fname" placeholder="First Name" required>
            <label for="admin_fname">First Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="lname" class="form-control rounded-4" id="admin_lname" placeholder="Last Name" required>
            <label for="floatinglname">Last Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control rounded-4" id="admin_email" placeholder="name@example.com" required>
            <label for="floatingemail">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-4" id="admin_Password" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating mb-3">
           <select name="User_type" id="admin_user_type" class="form-control rounded-4" required>
             <option value="admin">Admin</option>
             <option value="user">User</option>

             <option value="customer">Customer</option>

             <option value="manager">Manager</option>

           </select>

          <label for="floatingPassword">Select User Type</label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addUser">Add</button>
      </div>
    </div>
  </div>
</div>
<!-- edit modAL -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Privileges & Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
            <select name="User_type" id="updated_user_type" class="form-control rounded-4" required>
             <option value="admin">Admin</option>
             <option value="user">User</option>

             <option value="customer">Customer</option>

             <option value="manager">Manager</option>

           </select>

          <label for="floatingPassword">Select User Type</label>
          </div>
          <div class="form-floating mb-3">
            <select name="User_type" id="updated_status" class="form-control rounded-4" required>
             <option value="active">Active</option>
             <option value="inactive">Inactive</option>



           </select>

          <label for="floatingPassword">Select Status</label>
          </div> 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editUser">Save Changes</button>
      </div>
    </div>
  </div>
</div>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">FirstName</th>
              <th scope="col">LastName</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Status</th>
              <th scope="col">Edit</th>



              <th scope="col">Delete</th>
              <!-- <th scope="col">Save</th> -->


            </tr>
          </thead>
          <tbody>
            <?php
            try {
              $sql = "SELECT *
              from User";
 
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
                       from User LIMIT $start,$limit";
          
               $res=$conn->query($sql);
      
               $rows = $res->fetchAll(PDO::FETCH_ASSOC);
               //var_dump($rows);
               foreach($rows as $key => $val){     ?>    
                <tr >
                  <td><?php echo($val['id']);?></td>
                  <td><?php echo($val['firstname']);?></td>
                  <td><?php echo($val['lastname']);?></td>
                  <td><?php echo($val['email']);?></td>
                  <td><?php echo($val['role']);?></td>
                  <td><?php echo($val['status']);?></td>

                  <td><a href="#" class="edit btn btn-primary" id="<?php echo($val['id']);?>" data-bs-toggle="modal" data-bs-target="#editModal"> <i class="bi bi-pen"></i> </a> </td>
                  <td><a href="#" class="delete btn btn-danger" id="<?php echo($val['id']);?>"> <i class="bi bi-trash"></i> </a> </td>
                  <!-- <td><a href="#" class="delete btn btn-success"> Save </a> </td> -->

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