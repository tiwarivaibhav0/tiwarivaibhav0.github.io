
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
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="dashboard.php">BuyNow.com</a>
  
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
      <div class="modal-body">
      <div class="form-floating mb-3">
            <input type="text" id="edit_product_id" class="form-control rounded-4" value="<?php if(isset($_SESSION['editId']))echo ($_SESSION['editId']);?>" readonly>
          <label for="floatingName">Product ID</label>
          </div>
        <div class="form-floating mb-3">
            <input type="text" id="edit_product_name" class="form-control rounded-4" value="<?php if(isset($_SESSION['editName']))echo ($_SESSION['editName']);?>">
          <label for="floatingName">Product Name</label>
          </div>
          <div class="form-floating mb-3">
            <select name="User_type" id="edit_product_category" class="form-control rounded-4" required>
             <option value="electronics">Electronics</option>
             <option value="fashion">Fashion</option>
             <option value="furniture">Furniture</option>
             <option value="jewellery">Jewellery</option>





           </select>

          <label for="floatingPassword">Select Category</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" id="edit_product_image" class="form-control rounded-4" value="<?php if(isset($_SESSION['product_image']))echo ($_SESSION['product_image']);?>">
          <label for="floatingName">Product Image</label>
          </div>
 


          <div class="form-floating mb-3">
            <input type="text" id="edit_product_price" class="form-control rounded-4" value="<?php if(isset($_SESSION['product_price']))echo ($_SESSION['product_price']);?>">
          <label for="floatingName">Product Price</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" id="edit_product_quantity" class="form-control rounded-4" value="<?php if(isset($_SESSION['quantity']))echo ($_SESSION['quantity']);?>">
          <label for="floatingName">Quantity</label>
          </div> 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close">Close</button>
        <button type="button" class="btn btn-primary" id="editProduct">Save Changes</button>
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