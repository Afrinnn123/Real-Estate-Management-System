<?php 
require_once('db.php');

function auth($Username,$Password)
{
     $conn=getConnection();
     $sql1="Select * from A_Reg where Username='$Username' and Password='$Password'";
     $res= mysqli_query($conn,$sql1);
     $count=mysqli_num_rows($res);
     if($count==1)
     {
     	return true;
     }
     else
     {
     	return false;
     }

}
  
function update($Name, $Email, $Gender, $dob, $Username) {
    $conn = getConnection();
    $sql = "UPDATE B_Reg SET Name = '{$Name}', Email = '{$Email}', Gender = '{$Gender}', Date_of_Birth = '{$dob}' WHERE Username = '{$Username}'";
    
    if(mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}


function deleteUser($Username)
{
    $conn = getConnection();
    $sql3 = "DELETE FROM B_Reg WHERE Username = '{$Username}'";
    return mysqli_query($conn, $sql3);
}


function getPropertyData()
{
    $conn = getConnection();
    $query = "SELECT
                pt.property_id,
                pt.property_name,
                pt.address,
                pt.size_sqft AS size,
                pt.property_type AS type,
                pt.sell_date,
                pt.buyer_name AS buyer,
                pt.purchase_price,
                pt.selling_price,
                e.agent_fee,
                e.legal_fees,
                e.property_inspection
            FROM
                property_transactions pt
            LEFT JOIN expenses e ON pt.transaction_id = e.transaction_id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}


function getUserDetails($conn, $loggedInUsername) {
    $conn = getConnection();
    $sql4 = "SELECT * FROM A_Reg WHERE Username='$loggedInUsername'";
    $res2 = mysqli_query($conn, $sql4);
    return $res2;
}

function verifyCurrentPassword($Username, $currentPassword){
    $conn = getConnection();
    $sql5 = "SELECT Password FROM A_Reg WHERE Username='$Username'";
    $result5 = mysqli_query($conn, $sql5);

    if ($result5) {
        $row5 = mysqli_fetch_assoc($result5);
        $dbPassword = $row5['Password'];

        return $currentPassword === $dbPassword;
    }

    return false;
}

function updatePassword($Username, $newPassword){
    $conn = getConnection();
    $updateSql = "UPDATE A_Reg SET Password='$newPassword' WHERE Username='$Username'";
    mysqli_query($conn, $updateSql);

    $updateLoginSql = "UPDATE login SET Password='$newPassword' WHERE Username='$Username'";
    mysqli_query($conn, $updateLoginSql);
}


function regcheck($A_name, $email, $Username, $Password,$gender,$dob,$utype)
{
     $conn=getConnection();
     $sql6="select * from A_Reg";
     $res= mysqli_query($conn,$sql);
     $sql7 = ("Insert into A_Reg (Name,Email,Username,Password,Gender,Date_of_Birth, User_Type) Values ('$A_name', '$email', '$Username', '$Password','$gender','$dob','$utype')");
     mysqli_query($conn,$sql7);
     $sql8=("Insert into login (Username,Password, User_Type) Values ( '$Username', '$Password','$utype')");
     mysqli_query($conn,$sql8);
     
}







?>


 
