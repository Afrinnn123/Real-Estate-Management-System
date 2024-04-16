<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            background-size: cover;
            background-color: mintcream;
            margin: 0;
            font-family: "Afacad";
        }

        h1 {
            text-align: center;
            color: black;
            margin-top: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1 img {
            width: 40px; 
            margin-right: 10px; 
        }

        form {
            text-align: center;
            margin-top: 30px;
        }

        fieldset {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            width: 30%;
            border-radius: 8px;
            margin: auto;
        }

        legend {
            font-weight: bold;
            color: black;
        }

        table {
            margin: auto;
        }

        label {
            display: inline-block;
            margin-bottom: 10px;
            color: black;
        }

        input {
            padding: 5px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        a {
            display: block;
            text-align: center;
            color: black;
            margin-top: 20px;
            text-decoration: none;
        }

        input[type="submit"] {
            background-color: royalblue;
            color: black;
            border: black;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: skyblue;
        }

    
    </style>
</head>
<body>
    

    <h1  ><img src="icons8-property-64.png">BD Homes</h1>
    
    <form method="POST" action="../Controller/loginCheck.php">
        <fieldset>
            <legend><b>ADMIN LOGIN</b></legend>
            <?php 
            session_start();
            if(isset($_SESSION['error_message'])){
            echo "<p style='color:red;text-align:center;';>".$_SESSION['error_message']."<p>";
            unset($_SESSION['error_message']);
            }?>
            <table>
                <tr>
                    <td>
                        <label for="Username">Username :</label>
                    </td>
                    <td>
                        <input type="text" id="Username" name="Username"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Password">Password :</label>
                    </td>
                    <td>
                        <input type="password" id="Password" name="Password" placeholder="<=8 chars, use(@,#,$,!)" ><br>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
        <!--<a href="Registration_A.php">Don't have an account? Click here to register</a>-->
    </form>
</body>
</html>
