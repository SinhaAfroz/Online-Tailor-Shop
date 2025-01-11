<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Update Dress</title>
        
         <link rel="stylesheet" href="assets/css/update.css" type="text/css">

        <script>
            function goback(){
                window.location.assign("tailorhomepage.php");
            }

            function delRec(did){
                window.location.assign("delete_dress.php?dressid="+did);
            }

            function uRec(did){
                window.location.assign("dress_update.php?dressid="+did);
            }
        </script>
    </head>
    
    <body>
        <h1> <span class="yellow">Dress</span></h1>
    <table class="container">
        
          
                <thead>
                    <tr>
                        <th>Design ID</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>price</th>
                        <th>Required_Measurement</th>
                        <th>Product Code</th>
                        <th>Delete/Update</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT * from dress order by CAST(SUBSTRING(designid, 2, LENGTH(designid)) AS INT)";
                            
                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                $index = 0;
                                
                                foreach($productstable as $row){
                                    $d_id = $row['designid'];
                                    ?>
                                    
                                        <tr>
                                            <td><?php echo $row['designid'] ?></td>   
                                            <td><?php echo $row['details'] ?></td>   
                                            <td>
                                                        <img width="150" height="150" alt="dress image" src="<?php echo $row['image'] ?>">
                                            </td>
                                            <td><?php echo $row['price'] ?></td>   
                                            <td><?php echo $row['required_measurement'] ?></td>   
                                            <td><?php echo $row['productcode'] ?></td>   
                                            
                                            <td><button onclick="delRec('<?php echo  $d_id ?>')" name="delBtn<?php echo $index; ?>">Delete</button>
                                                <button onclick="uRec('<?php echo $d_id ?>')" name="uBtn<?php echo $index; ?>">Update</button>
                                            </td>
                                            
                                            <?php
                                               $index += 1 ; 
                                                   
                                      }
                                            ?>

                                        </tr>
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
                </tbody>
            </table>
            <br/><br/>
            <button onclick="goback()">Go Back</button>
            <br/><br/>
        
        </div>

        
   


        
        <br/>
        

    </body>
</html>