<?php

include("../Model/db.php");
$conn = getConnection();

if(isset($_POST['input'])){

    $input = trim($_POST['input']);
    $input = mysqli_real_escape_string($conn, $input);  

    $query = "SELECT * FROM B_Reg WHERE LOWER(Name) LIKE LOWER('%$input%') OR LOWER(User_Type) LIKE LOWER('%$input%')
    
    UNION ALL
    
    SELECT * FROM S_Reg WHERE LOWER(Name) LIKE LOWER('%$input%') OR LOWER(User_Type) LIKE LOWER('%$input%')";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $Name = $row['Name'];
            $Email = $row['Email'];
            $Username = $row['Username'];
            $Gender = $row['Gender'];
            $Date_of_Birth = $row['Date_of_Birth'];
            $User_Type = $row['User_Type'];

            echo "<tr>
                    <td>{$Name}</td>
                    <td>{$Email}</td>
                    <td>{$Username}</td>
                    <td>{$Gender}</td>
                    <td>{$Date_of_Birth}</td>
                    <td>{$User_Type}</td>
                  </tr>";
        }
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
    }

}
?>
