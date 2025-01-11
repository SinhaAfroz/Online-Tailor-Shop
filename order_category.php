<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Choose</title>
    <style>
    .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 4px 4px 4px 4px darkblue;
    transition: 0.1s;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
        box-shadow: 4px 4px 4px 4px red;
    }

    /* Add some padding inside the card container */
    .container {
    padding: 5px 5px;
    display: inline-block;
    background-color: lightblue;
    }
    .card{
        
        display: inline-block;
        margin-right: 20px;

    }
    </style>


    <script>

    function ChooseCat(c){

        window.location.assign("dress_choose.php?param1="+c);

    }
    </script>
</head>
<body>
    <h1> Choose Category Please:- </h1>


    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT productcode, productname, description, gender FROM category";
                            
                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                ?>

                        

                                <?php
                                $ind = 0;
                                $pcode = "";



                                foreach($productstable as $row){
                                   
                                    $pcode = $row['productcode'];
                                    ?>

                                        <div class="card">
                                        <div class="container">
                                        <div class="category" onclick="ChooseCat('<?php echo $pcode;?>')">
                                            <h4 id="pcode"><b>Product Code: <?php echo $pcode ?></b></h4>
                                            <h4 id="pname"><b>Product Name: <?php echo $row['productname'] ?></b></h4>
                                            <h4><b>Desciption: <?php echo $row['description'] ?></b></h4>
                                            <h4><b>Gender: <?php echo $row['gender'] ?></b></h4>
                                        </div>
                                        </div>
                                        </div>

                                        
                                        
                                                    <?php
                                                     $ind = $ind + 1;
                                                }
                                            ?>

                                        
                                    
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


</body>
</html>