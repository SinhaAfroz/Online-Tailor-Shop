


<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Add Dress</title>
        <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="assets/css/s.css">
        <link rel="stylesheet" href="assets/css/update.css" type="text/css">

    
    </head>

    <body>

        <section class='login' id='login'>
  <div class='head'>
  <h1 class='company'>Add A Dress :-</h1>
  </div>

    
    <div class='form'>

        <form action="add_d.php" method="POST" enctype="multipart/form-data">
           
            <label for="details" style="vertical-align: top;">Details:   </label>
            <textarea rows="5" cols="50" id="details" name="details"></textarea><br><br>
            Image: <input type="file" name="pimage"><br><br>
            Price: <input type="number" name="price"><br><br>
            Required_Meaurement <input type="text" name="required_measurement"><br><br>
            Product Code: 
            


           

            <select name="productcode">
           <?php

           
                
                
                try{

                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $query="SELECT productcode FROM category";  /// insecure
                    $returnval=$dbcon->query($query); ///PDOStatement
                                
                    $productstable=$returnval->fetchAll();
                    

                    foreach($productstable as $row){
                        ?>
                        <option><?php echo $row['productcode']?></option>  
                        
                        
                        <script>
                        alert($row['productcode']);

                        </script>

                        <?php
                    }

                    

                }
                catch(PDOException $ex){
                    ?>

                    <script>
                    alert("Error");
                    </script>

                    <?php
                }

               

               
           ?>
            </select> <br><br>
            <input type="submit" name="upload" value="Add">
        </form>
    </div>
</section>

     
        <section style="color: black" id="team" class="">
    <!-- =============== container =============== -->


       <h1> <span class="yellow"> Category Table For Selecting:</span></h1>
    <table class="container">
          
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Gender</th>
                       
                  
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT * FROM category";
                            
                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                
                                foreach($productstable as $row){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['productcode'] ?></td>   
                                            <td><?php echo $row['productname'] ?></td>   
                                            <td><?php echo $row['description'] ?></td> 
                                            <td><?php echo $row['gender'] ?></td> 
                                           
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
            <br/>

        </div>
         <br/><br/>
             <a href="tailorhomepage.php" class="myButton">Back</a>
              <br/><br/>
        
        </section>

    </body>

    
</html>


