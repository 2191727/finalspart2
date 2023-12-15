<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello World</title>

  <link rel="stylesheet" href="\WebtechFinals\stylesheets\header_footer_sidebar.css">
</head>

<body>

  <div id="content-background">
    <?php
        if (isset($_GET['action']) && $_GET['action'] == 'add-user') 
            ?>
            <div class="wrapper">
                <div class="sidebar">
                    <ul>
                        <li class=""><a href="accounts_view.php" onclick="return confirm('Are you sure you want to cancel?')"><i class="fas fa-user"></i>Accounts Management</a></li>
                        <li class="hover-link"><a href="accounts_view.php?action=add-user"><i class="fa-solid fa-user-plus"></i> Add New User</a></li>
                        <li class=""><a href="archived_accounts.php" onclick="return confirm('Are you sure you want to cancel?')"><i class="fa-solid fa-user-slash"></i> Archived Users</a></li>
                    </ul>
                </div>
            </div>
  
  </body>
  </html>