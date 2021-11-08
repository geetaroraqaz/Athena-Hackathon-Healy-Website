    <style>
       @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap');
*{
  font-family: 'Roboto Condensed', sans-serif;
}

        li > a {
            font-size: 18px;
            color: black;
        }    
        .nav-brand {
          padding-left: 0;
        }

        .nav-item {
          padding: 0 18px;
        }       

  .dropdown-menu {
  background-color: black;
}

.dropdown-menu a {
  color: white;
}
    </style>
    
<nav class="navbar navbar-expand-lg navbar" style="max-width:75%; margin:auto;">

<div class="container">

  <a class="navbar-brand" href="#" style="font-size:40px; color:black;">Healy </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse navitems" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">

    <?php
if (isset($_SESSION['username'])){
?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="/AthenaHack Healthcare/images/profile.png" width="30" height="30" class="rounded-circle">
          <?php echo $_SESSION["username"]; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Profile Settings</a>
          <a class="dropdown-item" href="#">My Bookings</a>
          <a class="dropdown-item" href="/AthenaHack Healthcare/Includes/logout.php?logout-submit=logout">Logout</a>
        </div>
      </li>
    </ul>
</nav>
<?php }
else { ?>

      <li class="nav-item">
        <a class="nav-link text-dark" href="/AthenaHack Healthcare/index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="/AthenaHack Healthcare/about.php">About</a>
      </li>
      <li class="nav-item active">
        <a style="background-color:orange; border-radius:10px; padding:5px 15px;" class="nav-link text-dark" href="/AthenaHack Healthcare/login.php">Login</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<?php } ?>