<?php
    global $conn, $result;
    include "./connection_db.php"; // Adjust the path if needed

    // Check if a user ID is provided in the URL
    if (isset($_GET['id'])) {
        $username = $_SESSION['username'];

        // Query to fetch user information based on the user's userID
        $sql = "
        SELECT
        'Admin' AS type,
        a.userID,
        u.username,
        a.fname,
        a.lname,
        a.email,
        a.address,
        a.contactNum
        FROM admin a
        INNER JOIN users u ON a.userID = u.userID
        WHERE u.username = $username";
        $result = mysqli_query($conn, $sql);

        $data = array(); // Initialize an array to store the data

        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }

        // Check if the user exists
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // You can access user information like $row['userID'], $row['adID'], etc.
        } else {
            // User not found, handle it as needed
            echo "User not found.";
            exit();
        }
    }
?>
