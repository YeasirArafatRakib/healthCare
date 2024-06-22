<?php

//session_start();

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="../index.php">Health Care</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="HospitalHomePage.php">Home</a>
		</li>

    <?php if(isset($_SESSION['email'])){ ?>
      <li class="nav-item active">
		      <a class="nav-link" onclick="return confirm('Are you sure?')" href="logOut.php">Logout <span class="sr-only">(current)</span> </a>
      </li>
    <?php } else {?>
      <li class="nav-item active">
		      <a class="nav-link" href="LoginForHospital.php">Login</a>
      </li>
    <?php } ?>

    </ul>

  </div>
  
  </div>
</nav>

