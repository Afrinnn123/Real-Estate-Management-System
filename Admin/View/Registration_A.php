<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <center>
    <form method="post" action="../Controllers/A_validation.php">
        <fieldset style="width:50%">
            <legend><b>REGISTRATION</b></legend>
            
            <table>
                <tr>
                    <td width="200">
                        <label align="left" for="Name">Name </label>
                    </td>
                    <td>
                        :<input type="text" name="Name" />
            
                    </td>
                </tr>
                <tr>
                    <td width="200">
                        <label align="left" for="Email">Email</label>
                    </td>
                    <td>
                        :<input required type="email" name="Email" />
            
                    </td>
                </tr>
                <tr>
                    <td width="200">
                        <label align="left" for="Username">Username</label>
                    </td>
                    <td>
                        :<input required type="text" name="Username" />
                   
                    </td>
                </tr>
                <tr>
                    <td width="200">
                        <label align="left" for="Password">Password </label>
                    </td>
                    <td>
                        :<input required type="Password" name="Password" />
          
                    </td>
                </tr>
                <tr>
                    <td width="200">
                        <label align="left" for="Confirm_Password">Confirm Password </label>
                    </td>
                    <td>
                        :<input required type="Password" name="Confirm_Password" />
             
                    </td>
                </tr>
                <tr>
                    <td width="200" colspan="2">
                        <fieldset>
                            <legend>Gender</legend>
                            <input type="radio" id="male" name="Gender" value="Male" />
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="Gender" value="Female" />
                            <label for="female">Female</label>
                            <input type="radio" id="others" name="Gender" value="Others" />
                            <label for="others">Others</label>
                        </fieldset>
                   
                    </td>
                
                </tr>
                <tr>
                    <td width="200" colspan="2">
                        <fieldset>
                            <legend>Date of Birth</legend>

                            <input type="date" name="Date_of_Birth" />
                        
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td width="200">
                        <label align="left" for="User_Type">User_Type </label>
                    </td>
                    <td>
                        :<input required type="text" name="User_Type" value="Admin"/>
          
                    </td>
                </tr>

                </td>
                </tr>
                <tr>
                    <td align="left" colspan="2">
                        <input type="submit" name="submit"/>
                    </td>
                </tr>

            </table>
        </fieldset>
        <?php
        if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo $error . "<br>";
            }
            unset($_SESSION['errors']);
        }
        ?>
        <a href="login.php">Login Page</a>
    </form>
</center>
</body>
</html>