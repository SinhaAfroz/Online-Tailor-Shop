


<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Add Category</title>
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
            background-color: gray;
        }
        h1{
            color: black;
        }
        </style>
    </head>
    
    <body>
    <h1> Add A Category :- </h1>
        <form action="add_c.php" method="POST">
           
            Product Name:  <input type="text" name="productname"><br><br>
            Gender:  <select name="gender">
                     <option>Male</option>
                     <option>Female</option> </select>
            
            
            <br><br>
            <label for="description" style="vertical-align: top;">Description:   </label>
            <textarea rows="5" cols="50" id="description" name="description"></textarea><br><br>
            <input type="submit" value="Add">
        </form>
    </body>
</html>


