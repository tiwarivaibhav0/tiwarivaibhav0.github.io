<?php
include 'header.php';
?>

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
    <link href="register.css" rel="stylesheet">
  </head>

  <body>
  <title>BuyNow.com</title>

<!-- <div class=" modal-sheet position-static d-block  py-5" tabindex="-1" role="dialog" id="modalSheet"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-6 shadow pt-2">

<div class="modal-body p-4 pt-2  ">
        <!-- <form class="" action="#"> -->
        <div class="checkbox mb-3">
      <label>
      <p>Continue as <a href="index.php"  class="float-center">Guest</a></p>

      </label>
    </div>
        
    <div class="form-floating mb-3" id="Warning">
            
          </div><div class="form-floating mb-3">
            <input type="text" name="fname" class="form-control rounded-4" id="floatingfname" placeholder="First Name" required>
            <label for="floatingfname">First Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="lname" class="form-control rounded-4" id="floatinglname" placeholder="Last Name" required>
            <label for="floatinglname">Last Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control rounded-4" id="floatingemail" placeholder="name@example.com" required>
            <label for="floatingemail">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-4" id="floatingPassword2" placeholder="Password" required>
            <label for="floatingPassword">Enter same Password as above</label>
          </div>
          <div class="form-floating mb-3" id="reg">
            
          </div>
          <!-- <div class="form-floating mb-3"> -->
           <!-- <select name="User_type" id="User_type" class="form-control rounded-4" required>
             <option value="admin">Admin</option>
             <option value="user">User</option>

             <option value="customer">Customer</option>

             <option value="manager">Manager</option>

           </select>

          <label for="floatingPassword">Select User Type</label>
          </div> -->
          
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-dark" id=Signup>Sign up</button>
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
          <p>Have an account? <a href="#" id="Login">Login</a></p>
         
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>

<div class="b-example-divider"></div>


    <script src="/js/bootstrap.bundle.min.js"></script>  

  </body>

