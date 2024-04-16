<?php
include("../Model/modeldb.php");
session_start();
$conn = getConnection();
$query = "select * from B_Reg";
$query_run = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    table {
      border-collapse: collapse;
      width: 80%;
      margin-top: 40px;
    }

    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    .action-buttons {
      display: flex;
      justify-content: space-around;
    }

    button {
      padding: 8px 12px;
      cursor: pointer;
    }

    .update-button {
      background-color: #4caf50;
      color: #fff;
      border: none;
    }

    .delete-button {
      background-color: #f44336;
      color: #fff;
      border: none;
    }

    .back-button {
      background-color: #3498db;
      color: #fff;
      border: none;
      position: absolute;
      top: 10px;
      left: 10px;
    }
  </style>
</head>
<title>Buyer</title>
<body>

  <div class="container">
    <a href="admin.php">
      <button class="back-button">BACK</button>
    </a>

    <table>
      <thead>
        <tr>
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Date of Birth</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
            <tr>
              <td><?php echo $row['Username']; ?></td>
              <td><?php echo $row['Name']; ?></td>
              <td><?php echo $row['Email']; ?></td>
              <td><?php echo $row['Gender']; ?></td>
              <td><?php echo $row['Date_of_Birth']; ?></td>
              <td class="action-buttons">
                <form action="update_buyer.php" method="post">
                  <input type="hidden" name="edit_username" value="<?php echo $row['Username']; ?>">
                  <input type="hidden" name="edit_name" value="<?php echo $row['Name']; ?>">
                  <input type="hidden" name="edit_email" value="<?php echo $row['Email']; ?>">
                  <input type="hidden" name="edit_gender" value="<?php echo $row['Gender']; ?>">
                  <input type="hidden" name="edit_dob" value="<?php echo $row['Date_of_Birth']; ?>">
                  <button type="submit" name="edit_btn" class="update-button">Update</button>
                </form>
                <form action="#" method="post"> <!-- Replace # with your delete action -->
                  <button type="submit" class="delete-button">Delete</button>
                </form>
              </td>
            </tr>
        <?php
          }
        } else {
          echo '<tr><td colspan="6">No records found</td></tr>';
        }
        ?>
      </tbody>
    </table>
  </div>

</body>
</html>
