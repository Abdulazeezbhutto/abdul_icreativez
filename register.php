<!DOCTYPE html>
<html>
<head>
    <title>Simple Registration Form</title>
</head>
<body>
    <center>
    <h2 style="background-color: cyan; height: 60px; padding-top:20px">Register</h2>
    <hr>
    <br>
    <fieldset style = "width : 500px">
        <legend>Register Here...!</legend>
         <p style="color:<?php echo $_GET['color'] ?? ""; ?>"><?php echo $_GET['msg'] ?? ""; ?></p>
         
        <form action="process.php" method="POST">
            <table cellspacing = "10" cellpadding = "5">
                <tr>
                    <th>Name: </th>
                    <td><input type="Text" name = "username" placeholder="Enter your name Here.." ></td>
                </tr>
                 <tr>
                    <th>Email: </th>
                    <td><input type="email" name = "email" placeholder="Enter your Email Here.." ></td>
                </tr>
                 <tr>
                    <th>password: </th>
                    <td><input type="password" name = "password" placeholder="Enter your password Here.." ></td>
                </tr> 
                 <tr align = "center">
                    
                    <td colspan = "2"><input type="submit" name = "submit" Value = "Register" ></td>
                </tr>

            </table>
            <p>Account already created <a href="login.php">Click</a> here...!</p>
    
        </form>
    </fieldset>

    

    </center>
</body>
</html>
