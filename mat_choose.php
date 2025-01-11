<head>
<title>Material Choose</title>
<style>
        body{
            background-color: white;
            color: black;
            font-size: 22px;
            text-align:center;
            
        }


        table, th, td{
            border: 1px solid lightblue;
            border-collapse: collapse;
            text-align: center;
            
        }
        tr{
            color: black;
        }
        tr:hover{
            background-color: #9AC1EF;
        }

        /* Add a black background color to the top navigation */
        .righttable1 {
        
        color: black;
        text-align: center;
        text-decoration: none;
        font-size: 25px;
        
        
        }

        .righttable2 {
        
        color: black;
        text-align: center;
        text-decoration: none;
        font-size: 25px;
        
        
        }

       
        
        h1{
            text-align: center;
            color: black;
        }
</style>
</head>

<?php

    session_start();

    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){

        if(isset($_GET['param1']) && !empty($_GET['param1'])){
        ?> 
            <table>
            <h1> Dress Table: </h1>
        <thead>
            <tr>
                <th>Select </th>
                <th>Design ID</th>
                <th>Details</th>
                <th>Image</th>
                <th>price</th>
                <th>Required_Measurement</th>
                <th>Product Code</th>
                <th>Material</th>
            </tr>
        </thead>
                <tbody>
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            
                            $searchval=$_GET['param1'];
                            $sqlquery="";
                            if(!empty($searchval)){
                                $sqlquery="SELECT * FROM dress where productcode LIKE '%$searchval%'";
                            }
                            
                            
                            try{
                                //session_start();
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                $index = 0;
                                foreach($productstable as $row){
                                    ?>

                                        <tr>
                                            <td>
                                            
                                                <input type="checkbox" id="checkDress<?php echo $index; ?>" name="checkDress"+<?php echo $index; ?> value="">
                                                <label for="checkDress"+<?php echo $index; ?>> Select Dress</label>
                                                <input type="hidden" id="hidden<?php echo $index; ?>" value="<?php echo $row['designid'] ?>">
                                            </td>    
                                            <td><?php echo $row['designid'] ?></td>   
                                            <td><?php echo $row['details'] ?></td>   
                                            <td>
                                                        <img width="150" height="150" alt="dress image" src="<?php echo $row['image'] ?>">
                                            </td>
                                            <td id="pricetag<?php echo $index ?>"><?php echo $row['price'] ?></td>   
                                            <td><?php echo $row['required_measurement'] ?></td>   
                                            <td><?php echo $row['productcode'] ?></td>   
                                            
                                            </td>
                                            
                                            <?php
                                            $index = $index + 1;
                                                
                                                   
                                      }

        
                                            ?>
                                            

                                            </tbody>
                                         </table>
                                         <br/>

                                             <h1>Price: <span id="total">0</span></h1>

                                             <button onclick="Calc(<?php echo $index ?>)" type="button" name="calc_btn">Calculate Price</button>
                                             <button onclick="Order(<?php echo $index ?>)" type="button" name="order_btn">Order Right Away!</button>

                                             <script>
                                                
                                                function Calc(number){
                                                    var total=0;
                                                    for(var lp=0;lp<number;lp++){
                                                        var field=document.getElementById('checkDress'+lp);
                                                        if(field.checked){
                                                            console.log(document.getElementById('quantity'+lp).value);
                                                           
                                                            total+=parseInt(document.getElementById('pricetag'+lp).textContent) * parseInt(document.getElementById('quantity'+lp).value);
                                                        }
                                                    }
                                                    document.getElementById('total').innerText=total + " Tk";
                                                    
                                                }

                                                function Order(number){
                                                    var total=0;
                                                    var backendstring="";
                                                    for(var lp=0;lp<number;lp++){
                                                        var field=document.getElementById('checkDress'+lp);
                                                        var hiddenfield=document.getElementById('hidden'+lp);
                                                        if(field.checked){
                                                            backendstring+=hiddenfield.value+"-"+document.getElementById('quantity'+lp).value+",";
                                                        }
                                                    }
                                                    if (confirm('Confirm Order?')) {
                                                        window.location.assign("addorder_db.php?cart="+backendstring);
                                                    } else {
                                                    // Do nothing!
                                                        window.location.assign("homepage.php");
                                                    }

                                                    
                                                }
                                             </script>

                                       
                                    <?php
                                }
                            
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="5">Data read error ... ...</td>    
                                    </tr>
                                <?php
                            }

                            
                            
                        }
                        catch(PDOException $ex){
                            ?>
                                <tr>
                                    <td colspan="5">Data read error ... ...</td>    
                                </tr>
                            <?php
                        }
                    ?>
               


           
        <?php  
        }
        else{
            ?>
                <script>
                    window.location.assign('homepage.php');
                </script>
            <?php
        }
    }
    else{
        ?>
            <script>
                window.location.assign('signin.php');
            </script>
        <?php
    }

?>