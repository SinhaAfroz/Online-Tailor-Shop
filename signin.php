<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Sign In</title>
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
           // this function travels to the index.html page
            function goback(){
                window.location.assign("index.html");
            }
            // this function travels to the signup.php page
            function goregister(){
                window.location.assign("signup.php");
            }
        </script>
    </head>
    
    <body>
    <h1> Sign In Please :- </h1>
        <form action="verifyuser.php" method="POST">
            User Email: <input type="text" name="email"><br><br>
            Password: <input type="password" name="upass"><br><br>
            User Type:  
            <select id="type" name="typebox">
            <option value="Customer">Customer</option>
            <option value="Tailor">Tailor</option>
            </select><br/>
            <br/>
            <input type="submit" value="Sign In">
        </form>

        
        <br/>
        <br/>
        <button onclick="goback()">Back to Menu</button><br/><br/>
        <button onclick="goregister()">Sign Up</button>
    </body>
</html>