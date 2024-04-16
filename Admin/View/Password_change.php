<?php
session_start();

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "user";
$conn = new mysqli($servername, $username, $pass, $dbname);

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $loggedInUsername = $_SESSION['Username'];

    $sql = "SELECT Password FROM A_Reg WHERE Username='$loggedInUsername'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $dbPassword = $row['Password'];

        if ($currentpassword === $dbPassword) {
            if ($newpassword === $confirmpassword) {
                $updateSql = "UPDATE A_Reg SET Password='$newpassword' WHERE Username='$loggedInUsername'";
                mysqli_query($conn, $updateSql);

                $updateLoginSql = "UPDATE login SET Password='$newpassword' WHERE Username='$loggedInUsername'";
                mysqli_query($conn, $updateLoginSql);

                $error_message = '<p style="color: green;">Password updated successfully!</p>';
            } else {
                $error_message = '<p style="color: red;">New password and confirm password do not match.</p>';
            }
        } else {
            $error_message = '<p style="color: red;">Current password is incorrect.</p>';
        }
    } else {
        $error_message = '<p style="color: red;">Error fetching data from the database.</p>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 20px;
            font-family: "Afacad";
        }

        .back-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            position: absolute;
            top: 10px;
            left: 10px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px 0;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: lightblue;
            color: black;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .error-message {
            margin-top: 10px;
            color: red;
        }
    </style>
</head>
<body>
    <a href="admin.php">
      <button class="back-button">BACK</button>
    </a>
    <br>
    <h2>Change Password</h2>

    <form method="post" action="">
        <label for="currentpassword">Current Password:</label>
        <input type="password" name="currentpassword" required>

        <label for="newpassword">New Password:</label>
        <input type="password" name="newpassword" required>

        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" name="confirmpassword" required>

        <button type="submit" name="submit">Change Password</button>

        <?php
            echo $error_message;
        ?>
    </form>
</body>
</html>
