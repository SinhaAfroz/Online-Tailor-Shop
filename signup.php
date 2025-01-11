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

        <script>
            // this function travels back to the index.html page
            function goback(){
                window.location.assign("index.html");
            }
            // this function travels to the signin.php page
            function gosign(){
                window.location.assign("signin.php");
            }
        </script>
    </head>
    
    <body>
    <h1> Customer Sign Up Please :- </h1>
        <form action="registeruser.php" method="POST">
                 Email: <input type="text" name="email"><br><br>
              Password: <input type="password" name="upass"><br><br>
            First Name: <input type="text" name="fname"><br><br>
            Last  Name: <input type="text" name="lname"><br><br>
                 Phone: <input type="text" name="phone"><br><br>
                 <label for="address" style="vertical-align: top;">Address:   </label>
                 <textarea name="address" rows="3" cols="30"></textarea><br/><br/>
                  City: <input type="text" name="city"><br><br>
              District: <input type="text" name="district"><br><br>
           Postal Code: <input type="text" name="postal"><br><br>
            <input type="submit" value="Register">
        </form>


        <br>
        <br/>
        <button onclick="goback()">Back to Menu</button><br/><br/>
        <button onclick="gosign()">Sign In</button>

    </body>
</html>