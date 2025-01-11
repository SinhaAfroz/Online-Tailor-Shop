


<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Add Category</title>
        <style>
        body{
            background-color: black;
            color: white;
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
            color: white;
        }
        </style>
    </head>
    
    <body>
    <h1> Add A Category :- </h1>
        <form action="add_c.php" method="POST">
            Product Code: <input type="text" name="productcode"><br><br>
            Product Name:  <input type="text" name="productname"><br><br>
            <label for="description" style="vertical-align: top;">Description:   </label>
            <textarea rows="5" cols="50" id="description" name="description"></textarea><br><br>
            <input type="submit" value="Add">
        </form>
    </body>
</html>


