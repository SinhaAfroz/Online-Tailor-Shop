<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Measurement</title>
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
                window.location.assign("homepage.html");
            }
            // this function travels to the signin.php page
      
        </script>
    </head>
    
    <body>
    <h1> Fill in the measurement details:- </h1>
        <form action="measurement.php" method="POST">
                 Height: <input type="number" name="height"><br><br>
              Weight: <input type="number" name="weight"><br><br>
            Neck: <input type="number" name="neck"><br><br>
            Chest: <input type="number" name="chest"><br><br>
                Waist: <input type="number" name="waist"><br><br>
                 Hips: <input type="number" name="hips"><br><br>
              Shoulder: <input type="number" name="shoulder"><br><br>
           Sleeve: <input type="number" name="sleeve"><br><br>
            <input type="submit" value="Submit">
        </form>


        <br>
        <br/>
        <button onclick="goback()">Back to Menu</button><br/><br/>

    </body>
</html>