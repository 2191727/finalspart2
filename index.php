<?php
session_start();
    require("connection_db.php");

    /* Validation */
    if (isset($_SESSION['username'])) {
        $type = $_SESSION['type'];
        if ($type == 'admin') {
            header("Location: ./admin/accounts_view.php");
            exit();
        } elseif ($type == 'content_manager') {
            header('Location: http://localhost:3000/dashboard');

            exit();
        }
    }

    if (isset($_POST['Admin'])) {
        $Username = $_POST['username'];
        $Password = $_POST['password'];

        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM user WHERE Username = ? AND Password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $Username, $Password);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['type'] = $row['type'];

            switch ($row['type']) {
                case 'Admin':
                    header("Location: ./admin/accounts_view.php");
                    exit();
                case 'content_manager':
                    header('Location: http://localhost:3000/dashboard');

                    exit();
                default:
                    // Handle unknown user type
                    break;
            }
        } else {
            header("Location: index.php?id=$Username&error=Invalid Credentials");
        }
    }
?>

<!DOCTYPE html>
<html lang ="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>
    <!-- Notification for invalid credentials--->
    <div class="notification">
        <?php if (isset($_GET['error'])) { ?>
            <div id="alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
        </div>
    <!-- Login Form--->
    <div class="container">
        <div class="form-box login">
            <form class="login-form" action="login.php" method="POST">
                <div class="img">
                    <img src="images/user.png" id="icon" alt="User Icon" />
                </div>
                <br>
            <h2>LOGIN</h2>
            <div class="input-box">
                <span class="icon"><i class='bx bxs-id-card'></i></span>
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class='bx bxs-lock' ></i></span>
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <input type="submit" class="btn" value="Login" name="submit">
        </form>
    </div>
</div>
<footer>
    <div class="footer-image">
        <img src="images/slu-logo.png" alt="Singko">
    </div>
    <h5>&copy;  2023 Singko. All Rights Reserved</h5>
    <div class="footer-right">
          <h6>Team Singko - 9481AB - IT312/312L</h6>
          <h6>AY 2023-2024</h6>
          <h6>IT Department</h6>
          <h6>School of Accountancy, Management, Computing and Information Studies</h6>
          <h6>Saint Louis University</h6>
        </div>
</footer>

</body>
</html>    