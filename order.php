<style>
        body{
            background-color: black;
            color: white;
            font-size: 22px;
            text-align:center;
            
        }
       
        /* Add a black background color to the top navigation */
        .topnav {
        background-color: black;
        border: white 2px solid;
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
        color: white;
        }
        
        h1{
            text-align: center;
            color: white;
        }
</style>

<header>
<script>
             function logout(){
                window.location.assign('logoutprocess.php');
             }
         </script>
</header>


<?php
    session_start();

    if(isset($_SESSION['id']) && !empty($_SESSION['id']) && isset($_SESSION['type']) && !empty($_SESSION['type'])){
        

         
            
          ?>
         <br />
         
          <div class="topnav">
            <a href="order.php">Place Order</a>
            <a href="status.php">Order Status</a>
            <a href="profile.php">Profile Details</a>
            <a href="logoutprocess.php">Log Out</a>
          </div><br><br><br>

          <?php

    if($_SESSION['type'] == "Customer"){
        echo "Welcome Customer ".$_SESSION['id']."!\n";

    }else if($_SESSION['type'] == "Tailor"){
        echo "Welcome Tailor ".$_SESSION['id']."!";
    }
    else{

    }
      
            

    
    }
    else{
        ///session doesn't contain any valid user email
        ?>
            <script>
                window.location.assign('signin.php');
            </script>
        <?php
    }
?>