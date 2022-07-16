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


 <?php if(isset($_SESSION['cart'])) {?>  
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill"><?php echo(count($_SESSION['cart'])); ?></span>
        </h4>
        <ul class="list-group mb-3">


          <?php $sum=0; 
          foreach($_SESSION['cart'] as $key => $val){ ?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"> <?php echo($val['name']);?></h6>
              <small class="text-muted">Quantity *<?php echo($val['quantity']);?> </small>
            </div>
            <span class="text-muted">₹<?php echo($val['price']*$val['quantity']);?></span>
          </li>
        
          <?php
          $sum+=$val['price']*$val['quantity'];
          }
          ?>
         
         <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>FIRST100</small>
            </div>
            <span class="text-success">−₹100</span>
          </li> 
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (INR)</span>
            <strong><?php $sum-=100; echo("₹ "."$sum"); ?></strong>
          </li>
        </ul>

        <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form> -->
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Shipping address</h4>
        <form class="needs-validation" novalidate action="orderPlaced.php" method="POST">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" name="firstName" placeholder="" value="<?php echo( $_SESSION['fname']);?>" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" name="lastName" placeholder="" value="<?php echo( $_SESSION['lname']);?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

          

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" value="<?php echo( $_SESSION['email']);?>">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">City</label>
              <input type="text" class="form-control" name="city" placeholder="" required>
              <div class="invalid-feedback">
                Please enter your City.
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option value="India">India</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" name="state" required>
                <option value="">Choose...</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                  <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                  <option value="Assam">Assam</option>
                  <option value="Bihar">Bihar</option>
                  <option value="Chandigarh">Chandigarh</option>
                  <option value="Chhattisgarh">Chhattisgarh</option>
                  <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                  <option value="Daman and Diu">Daman and Diu</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Lakshadweep">Lakshadweep</option>
                  <option value="Puducherry">Puducherry</option>
                  <option value="Goa">Goa</option>
                  <option value="Gujarat">Gujarat</option>
                  <option value="Haryana">Haryana</option>
                  <option value="Himachal Pradesh">Himachal Pradesh</option>
                  <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                  <option value="Jharkhand">Jharkhand</option>
                  <option value="Karnataka">Karnataka</option>
                  <option value="Kerala">Kerala</option>
                  <option value="Madhya Pradesh">Madhya Pradesh</option>
                  <option value="Maharashtra">Maharashtra</option>
                  <option value="Manipur">Manipur</option>
                  <option value="Meghalaya">Meghalaya</option>
                  <option value="Mizoram">Mizoram</option>
                  <option value="Nagaland">Nagaland</option>
                  <option value="Odisha">Odisha</option>
                  <option value="Punjab">Punjab</option>
                  <option value="Rajasthan">Rajasthan</option>
                  <option value="Sikkim">Sikkim</option>
                  <option value="Tamil Nadu">Tamil Nadu</option>
                  <option value="Telangana">Telangana</option>
                  <option value="Tripura">Tripura</option>
                  <option value="Uttar Pradesh">Uttar Pradesh</option>
                  <option value="Uttarakhand">Uttarakhand</option>
                  <option value="West Bengal">West Bengal</option>              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" name="zip" placeholder="" maxlength="6" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          

         

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input value="Credit Card" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input value="Debit Card" name="paymentMethod" type="radio" class="form-check-input"  required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit/Debit card number</label>
              <input type="number" class="form-control"     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
 id="cc-number" placeholder="" maxlength="16" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="date" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="number" class="form-control"     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
 id="cc-cvv" placeholder="" maxlength="3" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
            <div class="col-md-3">
            <label for="cc-cvv" class="form-label">OTP</label>

              <a  class="btn btn-success form-control " onclick="this.innerHTML='OTP SENT'">Send OTP</a>
              <input type="hidden" value="<?php echo($sum-100);?>" name="amount">
             
        </div>
        </div>
        <br>
        <div class="row gy-3">

        <div class="col-md-3">
            <label for="cc-cvv" class="form-label" id="OTP">Enter OTP</label>
            <input type="number" class="form-control"     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
  placeholder="" maxlength="6" required>

             
        </div>
        <div class="col-md-3">
            <label for="cc-cvv" class="form-label">Verify</label>

              <a  class="btn btn-warning form-control " onclick="if(document.getElementById('OTP').innerHTML!=0)this.innerHTML='Verified';">Verify OTP</a>
             
        </div>
          </div>
          

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name='orderPlaced'>Place Order</button>
        </form>
      </div>
    </div>
  </main>
<?php }
else{
    echo("nothing in your cart to checkout");
}
?>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2022 BuyNow.com</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>










<script src="/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>

<?php }
?>