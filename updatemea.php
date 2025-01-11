<?php

try{
session_start();
$dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = $_SESSION['id'];

$query="SELECT * FROM measurement WHERE c_userid='$id'";  /// insecure
$returnval=$dbcon->query($query); ///PDOStatement
            
$productstable=$returnval->fetchAll();


foreach($productstable as $row){
    
    ?>
      <form action="updatemea2.php?cid=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
       
      Height: <input type="number" value="<?php echo $row['height']?>" name="height"><br><br>
              Weight: <input type="number" name="weight" value="<?php echo $row['weight']?>"><br><br>
            Neck: <input type="number" name="neck" value="<?php echo $row['neck']?>"><br><br>
            Chest: <input type="number" name="chest" value="<?php echo $row['chest']?>"><br><br>
                Waist: <input type="number" name="waist" value="<?php echo $row['waist']?>"><br><br>
                 Hips: <input type="number" name="hips" value="<?php echo $row['hips']?>"><br><br>
              Shoulder: <input type="number" name="shoulder" value="<?php echo $row['shoulder']?>"><br><br>
           Sleeve: <input type="number" name="sleeve" value="<?php echo $row['sleeve']?>"><br><br>
            <input type="submit" value="Update">
       
   </form>
    
    
  
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