<?php
include 'header.php';
if(isset($_COOKIE['id'])){

  $_SESSION['user']=$_COOKIE['name'];
  $_SESSION['admin']=$_COOKIE['role'];
  $_SESSION['id']=$_COOKIE['id'];




  header("Location: index.php");

}
if(isset($_SESSION['user']))
 header('location:index.php');






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
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
    <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>
     <form class="needs-validation" novalidate action="#">
     <div class="checkbox mb-3">
      <label>
      <p>Continue as <a href="index.php"  class="float-center">Guest</a></p>

      </label>
    </div>
    <div class="form-floating">
      <div id="reg">
              </div>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="loginEmail" placeholder="name@example.com" required>
      <label for="loginEmail">Email address</label>
      <div class="invalid-feedback">
                Valid email is required.
              </div>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="loginPassword" placeholder="Password" required>
      <label for="loginPassword">Password</label>
      <div class="invalid-feedback">
                Valid Password is required.
              </div>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me" id="remember"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-dark" id='Signin' type="submit">Sign in</button>
    </form>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    <div class="checkbox mb-3">
      <label>
        <span value="remember-me" > Not a user?        <a href="#" id="Register">Register</a>
 </span>
      </label>
    </div>
</main>


    
  </body>
</html>













