<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Sign Up</title>
        <style>
        body{
            background-color: white;
            color: black;
        }
        a{
            font-size: 24px;
            color:black;
        }
        a:hover{
            color:red;
        }
        .options{
            background-color: lightgray;
        }
        h1{
            color: black;
        }
        </style>
    </head>
    
    <body>
    <h1> Tailor Sign Up Please :- </h1>
        <form action="registeruser_t.php" method="POST">
        Email: <input type="text" name="email"><br><br>
            Password: <input type="password" name="upass"><br><br>
            First Name: <input type="text" name="fname"><br><br>
            Last  Name: <input type="text" name="lname"><br><br>
                 
                 Phone: <input type="text" name="phone"><br><br>
                 <label for="address" style="vertical-align: top;">Address:   </label>
                 <textarea name="address" rows="3" cols="30"> </textarea><br/><br/>
            <input type="submit" value="Register">
        </form>
    </body>
</html>