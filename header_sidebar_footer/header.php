<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello World</title>
  <link rel="stylesheet" href="\WebtechFinals-1\stylesheets\header_footer_sidebar.css">
</head>
<body>

  <div class="Container">
    <nav>
      <ul class='navbar'>
          <span class="logo-title">
              <li class="text-logo"><a><h1>SV STREAMING PLATFORM</h1></a></li>
          </span>
          <input type='checkbox' id='check'/>
          <span class="menu"><!--
              <li><a href="my_profile.php?id=<?= $_SESSION['username'] ?>"><i class="fa-regular fa-circle-user"></i> <?php echo $_SESSION['username']; ?></a></li>
              <li><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
              <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
          </span>-->
          <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
      </ul>
  </nav>
</div>


</body>
</html>
