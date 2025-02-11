<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Update Material</title>
        <link rel="stylesheet" href="assets/css/update.css" type="text/css">


        <script>
            function goback(){
                window.location.assign("tailorhomepage.php");
            }

            function del(mid){
                window.location.assign("delete_mate.php?mateid="+mid);
            }

            function updt(mid){
                window.location.assign("update_mate.php?mateid="+mid);
            }
        </script>
    </head>
    
    <body>
     <h1> <span class="yellow"> Material</span></h1>
    <table class="container">
        
           
                <thead>
                    <tr>
                        <th>Material ID</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Design ID</th>
                        <th>Delete/Update</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT * from material order by CAST(SUBSTRING(mateid, 2, LENGTH(mateid)) AS INT)";
                            
                            try{
                                $return=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $materialtable=$return->fetchAll();
                                $index = 0;
                                
                                foreach($materialtable as $row){
                                    $m_id = $row['mateid'];
                                    ?>
                                    
                                        <tr>
                                            <td><?php echo $row['mateid'] ?></td>   
                                            <td><?php echo $row['details'] ?></td>   
                                            <td>
                                                        <img width="100" height="100" alt="material image" src="<?php echo $row['image'] ?>">
                                            </td> 
                                            <td><?php echo $row['designid'] ?></td>   
                                            
                                            <td><button onclick="del('<?php echo  $m_id ?>')" name="delBtn<?php echo $index; ?>">Delete</button>
                                                <button onclick="updt('<?php echo $m_id ?>')" name="updtBtn<?php echo $index; ?>">Update</button>
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
        
        </div>

        
   


        
        <br/>
        <button onclick="goback()">Back to Menu</button><br/><br/>

    </body>
</html>