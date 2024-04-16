<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
</head>

<body>
    <h2>Change Password</h2>

    <?php

    // Display message if available
    if (isset($message)) {
        echo "<p>{$message}</p>";
    }  
    unset($_SESSION['message']); // Clear the message after displaying
    ?>

    <form method="post" action="../Controller/Change_passwordController.php">
        <label for="currentpassword">Current Password:</label>
        <input type="password" name="currentpassword" required><br>

        <label for="newpassword">New Password:</label>
        <input type="password" name="newpassword" required><br>

        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" name="confirmpassword" required><br>

        <button type="submit" name="submit">Change Password</button>
    </form>
</body>

</html>
