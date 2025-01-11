<?php
session_start();
?>
<head>
<style>
        body{
            background-color: white;
            color: black;
            font-size: 22px;
            text-align:center;
            
        }
       
        /* Add a black background color to the top navigation */
        .topnav {
        background-color: blue;
        border: black 2px solid;
        overflow: hidden;
        float: left;
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
            text-align: center;
            color: black;
        }
        .pendingorders {
        float: left;
        color: blue;
        text-align: center;
        margin-right: 70px;
        text-decoration: none;
        font-size: 18px;
        
        
        }
        table, th, td{
            border: 1px solid lightblue;
            border-collapse: collapse;
            text-align: center;
            font-size: 20px;
            
        }
        tr{
            color: black;
        }
        tr:hover{
            background-color: #9AC1EF;
        }
        .conforders{
        float: left;
        color: blue;
        text-align: center;
        margin-right: 70px;
        text-decoration: none;
        font-size: 18px;
        }
        .delorders{
        float: left;
        color: blue;
        text-align: center;
        margin-right: 70px;
        text-decoration: none;
        font-size: 18px;
        }
</style>


<title>Order Status</title>
<script>
            

             function goback(){
                window.location.assign('homepage.php');
                }
         </script>
</head>

<body>
<button onclick="goback()" style="float: right;">GO Back</button>
<div class="pendingorders">

<table>
   <h1> Pending Orders</h1>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Details</th>
                <th>Transaction No</th>
                <th>Pay Date</th>
                <th>Total Price</th>
          
            </tr>
        </thead>
        
        <tbody>
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $id = $_SESSION['id'];
                    $sqlquery="SELECT orders.orderno as o, orders.c_userid as c_id, orders.orderdate as orderdate, orders.deliverydate as deliverydate, orders.status as status, orders.details as details, orders.rating as rating, payments.trans_no as trans_no, payments.paydate as paydate, payments.payamount as payamount FROM orders JOIN payments ON orders.orderno=payments.orderno WHERE status='Pending' AND orders.c_userid='$id'";
                    //echo $sqlquery;
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement
                        
                        $productstable=$returnval->fetchAll();

                        if($returnval->rowCount() == 0){
                            ?>

                            <tr>
                                <td colspan="8">Empty</td>    
                            </tr>

                            <?php
                        }else{
                           
                        }
                        
                        foreach($productstable as $row){
                            ?>
                                
                                <tr>
                                   
                                    <td><?php echo $row['o'] ?></td>   
                                    <td><?php echo $row['c_id'] ?></td>   
                                    <td><?php echo $row['orderdate'] ?></td>  
                                    <td><?php echo $row['status'] ?></td>  
                                    <td><?php echo $row['details'] ?></td>   
                                    <td><?php echo $row['trans_no'] ?></td>   
                                    <td><?php echo $row['paydate'] ?></td>
                                    <td><?php echo $row['payamount'] ?></td>
                                   
                                </tr>
                            <?php
                        }
                    }
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="8"><?php echo $ex->getMessage() ?></td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                        <td colspan="8"><?php echo $ex->getMessage() ?></td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table><br/>

</div>
<div class="conforders">
<table>
   <h1> Confirmed Orders</h1>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Details</th>
                <th>Delivery Date</th>
                <th>Transaction No</th>
                <th>Pay Date</th>
                <th>Total Price</th>
          
            </tr>
        </thead>
        
        <tbody>
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sqlquery="SELECT orders.orderno as o, orders.c_userid as c_id, orders.orderdate as orderdate, orders.deliverydate as deliverydate, orders.status as status, orders.details as details, orders.rating as rating, payments.trans_no as trans_no, payments.paydate as paydate, payments.payamount as payamount FROM orders JOIN payments ON orders.orderno=payments.orderno WHERE status='Confirmed' AND orders.c_userid='$id'";
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement

                        if($returnval->rowCount() == 0){
                            ?>

                            <tr>
                                <td colspan="9">Empty</td>    
                            </tr>

                            <?php
                        }else{
                           
                        }
                        
                        $productstable=$returnval->fetchAll();

                        
                        foreach($productstable as $row){
                            ?>
                               
                               <tr>
                                   
                                    
                               <tr>
                                   
                                   <td><?php echo $row['o'] ?></td>   
                                   <td><?php echo $row['c_id'] ?></td>   
                                   <td><?php echo $row['orderdate'] ?></td>  
                                   <td><?php echo $row['status'] ?></td>  
                                   <td><?php echo $row['details'] ?></td>  
                                   <td><?php echo $row['deliverydate'] ?></td>  
                                   <td><?php echo $row['trans_no'] ?></td>   
                                   <td><?php echo $row['paydate'] ?></td>
                                   <td><?php echo $row['payamount'] ?></td>
                                  
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
    </table><br/>

</div>
<?php

$id = $_SESSION['id'];
?>
<div class="delorders">
<table>
   <h1> Delivered Orders</h1>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Details</th>
                <th>Rating</th>
                <th>Delivery Date</th>
                <th>Transaction No</th>
                <th>Pay Date</th>
                <th>Total Price</th>
                
          
            </tr>
        </thead>
        
        <tbody>
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sqlquery="SELECT orders.orderno as o, orders.c_userid as c_id, orders.orderdate as orderdate, orders.deliverydate as deliverydate, orders.status as status, orders.details as details, orders.rating as rating, payments.trans_no as trans_no, payments.paydate as paydate, payments.payamount as payamount FROM orders JOIN payments ON orders.orderno=payments.orderno WHERE status='Delivered' AND orders.c_userid='$id'";
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement

                        if($returnval->rowCount() == 0){
                            ?>

                            <tr>
                                <td colspan="10">Empty</td>    
                            </tr>

                            <?php
                        }else{
                           
                        }
                        
                        $productstable=$returnval->fetchAll();

                        
                        foreach($productstable as $row){
                            ?>
                                <tr>
                                   
                                    
                                    <td><?php echo $row['o'] ?></td>   
                                    <td><?php echo $row['c_id'] ?></td>   
                                    <td><?php echo $row['orderdate'] ?></td>  
                                    <td><?php echo $row['status'] ?></td>  
                                    <td><?php echo $row['details'] ?></td>  
                                    
                                    <?php
                                       if(empty($row['rating']) || !isset($row['rating'])){
                                           ?>
                                           <td>Not Rated! </th>
                                           <?php
                                       }else{
                                           ?>
                                           <td><?php echo $row['rating'] ?>/5</td>  
                                           <?php
                                       }
                                    ?>
                                    
                                    <td><?php echo $row['deliverydate'] ?></td>  

                                    
  
                                    <td><?php echo $row['trans_no'] ?></td>   
                                    <td><?php echo $row['paydate'] ?></td>
                                    <td><?php echo $row['payamount'] ?></td>
                                   
                                </tr>
                            <?php
                        }
                    }
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="10"><?php echo $ex->getMessage()?></td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                            <td colspan="10"><?php echo $ex->getMessage()?></td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table><br/>



</div>

</body>

