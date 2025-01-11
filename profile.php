<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
    <style>
        body{
            background-color: white;
            color: black;
            font-size: 22px;
            text-align:left;
            
        }
       
       .cap{
           background-color: lightgray;

       }

       .info{
           background-color: lightblue;
       }
        /* Add a black background color to the top navigation */
        .topnav {
        background-color: blue;
        border: black 2px solid;
        overflow: hidden;
        float: none;
        position: absolute;
        
        left: 50%;
        transform: translate(-50%, -50%);
        }

        /* Style the links inside the navigation bar */
        .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 25px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
        background-color: lightgreen;
        color: black;
        }

        /* Add a color to the active/current link */
        .topnav a.active {
        background-color: #4CAF50;
        color: black;
        }
        
        h1{
            text-align: left;
            font-size: 25px;
            color: black;
        }
</style>
</head>


<body>

    <div class="cap">
    
    <h1>Profile Details </h1>

    </div>
    <?php

try{
    session_start();

    ///php-mysql 3 way. We will use PDO - PHP data object
    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $c_e = $_SESSION['email'];
    $query="SELECT * FROM customer WHERE email='$c_e'";

    
    try{
        /// to insert data to corresponding database
        $qex = $dbcon->query($query);
        
        $result = $qex->fetchAll();
        //print_r($result);

        foreach($result as $r)
        {
        ?>

       <div class="info">
        <h1>Customer ID: <?php echo $r['c_userid']; ?></h1>
        <h1>Customer Name: <?php echo $r['fname']." ".$r['lname']; ?></h1>
        <h1>Email:  <?php echo $r['email']; ?></h1>
        <h1>Phone: <?php echo $r['phone']; ?></h1>
        <h1>Address: <?php echo $r['address']; ?></h1>
        <h1>City: <?php echo $r['city']; ?></h1>
        <h1>District: <?php echo $r['district']; ?></h1>
        <h1>Postal Code: <?php echo $r['postalcode']; ?></h1>
        <h1>Tailor Assigned ID: <?php echo $r['t_userid']; ?></h1>

        </div>


            <br/>
            <table>
            
               <h1> Measurements</h1>
              
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Neck</th>
                            <th>Chest</th>
                            <th>Waist</th>
                            <th>Hips</th>
                            <th>Shoulder</th>
                            <th>Sleeve</th>
                            
                      
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            try{
                                ///php-mysql 3 way. We will use PDO - PHP data object
                                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $id =  $_SESSION['id'];
                                $sqlquery="SELECT * FROM measurement WHERE c_userid='$id'";
                                
                                try{
                                    $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                    
                                    $productstable=$returnval->fetchAll();
                                    
                                    foreach($productstable as $row){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['c_userid'] ?></td>   
                                                <td><?php echo $row['height'] ?></td>   
                                                <td><?php echo $row['weight'] ?></td>   
                                                <td><?php echo $row['neck'] ?></td>
                                                <td><?php echo $row['chest'] ?></td>
                                                <td><?php echo $row['waist'] ?></td>
                                                <td><?php echo $row['hips'] ?></td>
                                                <td><?php echo $row['shoulder'] ?></td>
                                                <td><?php echo $row['sleeve'] ?></td>
                                               
                                            </tr>
                                        <?php
                                    }
                                }
                                catch(PDOException $ex){
                                    ?>
                                        <tr>
                                            <td colspan="9">Data read error ... ...</td>    
                                        </tr>
                                    <?php
                                }
                                
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="9">Data read error ... ...</td>    
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
    
            

       <?php
        
        /// if successful, forward the user to the login page
        }
        ?>

        <button onclick="window.location.assign('homepage.php');">Go Back Home</button>
            
        <?php
    }
    catch(PDOException $ex){
        /// if not successful, return back to sign up page
        echo $ex->getMessage();
        ?>

            <script>//window.location.assign('signup.php')</script>
        <?php
    }
    
}
    catch(PDOException $ex){
        ?>
            <script>//window.location.assign('signup.php')</script>
        <?php
    }


    ?>
</body>
</html>