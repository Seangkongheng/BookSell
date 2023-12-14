<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!-- font-avsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<div class="top-register">
<div class="imag-logo text-center px-5 py-3">
    <img src="image/logo-no-background.png" alt="">
    </div>
</div>
<?php
//info message
if(isset($_SESSION['message'])){
    ?>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-6">

               <?php echo $_SESSION['message']; ?>

        </div>
    </div>
    <?php
    unset($_SESSION['message']);
}
?>
     <div class="container">
        <div class="form-register bg-dark px-5 mt-5">
          
        <form class="" action="code.php" method="POST">
        <h1 class="py-5 text-center text-white">Register</h1>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="form-outline">
                  <input type="text" name="fistName" id="form3Example1"placholder="name" class="form-control" />
                  <label class="form-label text-white" for="form3Example1"><span class="text-danger">*</span >First name</label>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-outline">
                  <input type="text" id="form3Example2" name="lastName" class="form-control" />
                  <label class="form-label text-white" for="form3Example2"><span class="text-danger">*</span>Last name</label>
                </div>
              </div>
            </div>
            <div class="form-outline mb-3">
              <input type="number" id="form3Example3" name="address" class="form-control" />
              <label class="form-label text-white" for="form3Example3"><span class="text-danger">*</span>Address</label>
            </div>

            <div class="form-outline mb-3">
              <input type="number" id="form3Example3"name="numberphone" class="form-control" />
              <label class="form-label text-white" for="form3Example3"><span class="text-danger">*</span>Phone Number</label>
            </div>



            <!-- Email input -->
            <div class="form-outline mb-3">
              <input type="email" id="form3Example3" name="email" class="form-control" />
              <label class="form-label text-white" for="form3Example3"><span class="text-danger">*</span>Email address</label>
            </div>
            <div class="form-outline mb-3">
              <input type="text" id="form3Example4" name="username" class="form-control" />
              <label class="form-label text-white" for="form3Example4"> <span class="text-danger">*</span> Username</label>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4"name="password" class="form-control" />
              <label class="form-label text-white" for="form3Example4"> <span class="text-danger">*</span> Password</label>
            </div>
          <span class="dont_register text-white" href=""> Have you account already? <a href="index.php"> sing up</a>  </span>
            <!-- Submit button -->
            <button type="submit" name="register" class="btn btn-primary btn-block float-end">
              register
            </button>

            <!-- Register buttons -->
            <div class="text-center mt-4">
              <p class="text-white">or sign up with:</p>
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
          </form>
        </div>
     </div>
</body>
</html>

