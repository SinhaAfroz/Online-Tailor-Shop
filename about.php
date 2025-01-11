<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About:-</title>
    <style>
        body{
            background-color: darkblue;
            background-image: url("back.png");
            background-repeat: repeat-xy;
        }
        a{
            font-size: 24px;
            color:black;
        }
        a:hover{
            color:red;
        }
        .options{
            background-color: lightgray;
        }
        h1{
            color: lightgreen;
        }
        p{
            font-size: 20px;
            color: white;
        }
        .about{
            background-color: darkblue;
        }
        mark{
            background-color: darkblue;
            color: lightgreen;
        }
    </style>

<script>
function back(){
    window.location.assign('index.html');
}

</script>
</head>
<body>
    <div class="about">
    <h1>About:- </h1><br/>
    <p> This website is built and coded by the legendary <br/> 
         Coders Iftekhar Hyder And Md. Mazbaul Hoque Meem<br/> <br/>  

    </p>
    
    </div>

    <button onclick="back()">Go Back!</button>

    
    
    

    


</body>
</html>
