<?php
session_start();
include('Includes/server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/3695790714.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="login_register.css">

  <title>Healy</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .maindiv {
      max-width: 75%;
      margin: auto;
      margin-top: 120px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 2fr 1fr;
      grid-template-areas:
        "l1 r1"
        "l2 r1";
      grid-gap: 1rem;
    }

    .active-pink-2 input.form-control[type=text]:focus:not([readonly]) {
      border-bottom: 1px solid #f48fb1;
      box-shadow: 0 1px 0 0 #f48fb1;
    }

    button {
      margin: 10px;
    }

    .cont{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-25%, -45%);
}


  </style>
</head>

<body>
  <!-- navbar -->
  <?php
  include('Includes/header.php');
  ?>

  <div class="maindiv">
    <div class="l1">
      <h3 class="text-dark" style="font-size:75px">Lets Find your Doctor!</h3>

      <p class="text-primary" style="font-size:18px; margin-top:20px;">We are here to help you find your personal health
        expert in 3 easy steps</p>
      <p class="text-primary" style="font-size:18px;">Select speciality. symptoms & book your appointment. Simple, isn't
        it?</p>
    </div>

    <div class="r1">
      <div class="container cont" style="">
        <div class="row">
          <div class="col-md-4 offset-md-4 form signup-form">
            <form action="index.php" method="POST" autocomplete="">
              <h1 class="text-center">Register here</h1><br>
              <p class="text-center" style="font-size:18px">One stop HealthCare Appointment platform!</p>
              <p class="text-center" style="font-size:18px">Healy</p><br>
              <?php
                          if (count($errors) == 1) {
                          ?>
              <div class="alert alert-danger text-center">
                <?php
                                  foreach ($errors as $showerror) {
                                      echo $showerror;
                                  }
                                  ?>
              </div>
              <?php
                          } elseif (count($errors) > 1) {
                          ?>
              <div class="alert alert-danger">
                <?php
                                  foreach ($errors as $showerror) {
                                  ?>
                <li>
                  <?php echo $showerror; ?>
                </li>
                <?php
                                  }
                                  ?>
              </div>
              <?php
                          }
                          ?>
              <div class="form-group">
                <input class="form-control" style="padding-left: 40px;" type="text" name="username"
                  placeholder="Username" value="<?php echo $username ?>" required>
                <i class="fa fa-user" style="float: left; margin:-28px 0 0 10px;" aria-hidden="true"></i>
              </div>
              <div class="form-group">
                <input class="form-control" style="padding-left: 40px;" type="email" name="email"
                  placeholder="Email Address" required value="<?php echo $email ?>">
                <i class="fa fa-envelope" style="float: left; margin:-28px 0 0 10px;" aria-hidden="true"></i>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" name="password" id="password" style="padding-left: 40px;"
                  placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                  required>
                <i class="fa fa-key" style="float: left; margin:-28px 0 0 10px;" aria-hidden="true"></i>
                <i class="fa fa-eye" id="show" style="float: right; margin:-28px 10px 0 0; cursor:pointer;"
                  title="Show password" aria-hidden="true"></i>
                <i class="fa fa-eye-slash" id="hide"
                  style="float: right; margin:-28px 10px 0 0; cursor:pointer; display:none;" title="Hide password"
                  aria-hidden="true"></i>
              </div>
              <div class="form-group">
                <input class="form-control" style="padding-left: 40px;" type="password" name="cpassword"
                  placeholder="Confirm password" required>
                <i class="fa fa-key" style="float: left; margin:-28px 0 0 10px;" aria-hidden="true"></i>
              </div>
              <div class="form-group">
                <input class="form-control button" type="submit" name="signup" value="Signup">
              </div>
              <div class="link login-link text-center">Already a member? <a class="font-weight-bold"
                  href="login.php">Login here</a></div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="l2" style="width:75%; ">
      <div>
        <button type="button" class="btn btn-dark btn-rounded rounded-circle"> <i class="fas fa-tooth"></i> </button>
        <button type="button" class="btn btn-danger btn-rounded rounded-circle"> <i class="fa fa-heartbeat"></i>
        </button>
        <button type="button" class="btn btn-dark btn-rounded rounded-circle"> <i class="fa fa-brain"></i> </button>
        <button type="button" class="btn btn-primary btn-rounded rounded-circle"> <i class="fa fa-low-vision"></i>
        </button>
        <button type="button" class="btn btn-secondary btn-rounded rounded-circle"> <i class="fa fa-clinic-medical"></i>
        </button>
      </div>

      <!-- <form class="form-inline d-flex md-form form-sm mt-2">
        <i class="fas fa-search text-dark" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
          aria-label="Search">
      </form> -->

          <h3 class="text-secondary mt-3">Get started!</h3>            
    </div>
  </div>

  <script type='text/javascript'>
        $(document).ready(function() {
            $('#show').click(function() {
                $('#password').attr('type', 'text');
                $('#hide').show();
                $('#show').hide();
            });
            $('#hide').click(function() {
                $('#password').attr('type', 'password');
                $('#show').show();
                $('#hide').hide();
            });
        });
    </script> 

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

</body>

</html>