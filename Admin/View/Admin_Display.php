<!DOCTYPE html>
<html>
<head>
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
    </style>
    <title>Pending Verfications</title>
</head>
<body>
    <a href="admin.php">
      <button class="back-button">BACK</button>
    </a>
    <br>

<h2>Pending Property Submissions</h2>

<table border="2">
    <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Status</th>
        <th>Price</th>
        <th>Description</th>
        <th>Decision</th>
        <th>Link </th>
        <th>Action</th>
    </tr>

    <?php
    session_start();
    require_once('../Model/db.php');
    $conn=getConnection();

    $sql = "SELECT * FROM Property ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['decision']}</td>
                    <td> <a href='Property_details.php?location={$row['location']}'>View Details</a></td>
                    <td>";
            if ($_SESSION['Username'] == $Username) {
                echo "<a href='../Model/Approve_property.php?location={$row['location']}&action=approve'>Approve</a>
                      <a href='../Model/Approve_property.php?location={$row['location']}&action=reject'>Reject</a>";
            }
            echo "</td></tr>";
        }
    }


    $conn->close();
    ?>

</table>


</body>
</html>
