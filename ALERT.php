<?php 

if ((isset($_POST["FORMATS"]) && isset($_POST["SKILLS"])  && isset($_POST["LANGS"]) &&  isset($_FILES["FILES"]) )|| (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailS"]))) {
    header("location:./acceuil1-main/index.php");
}

else { ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<style>
            h1{
                background-color: RED;
                position: absolute;
                top:50%;
                left: 50%;
                padding: 10px;
                border-radius: 5px;
                transform: translate(-50%,-50%);

            }
        </style>
        <h1>PLEASE VERIFY THE FOLLOWING FLIELDS MAKE SURE THEY'RE ALL SET  (FORMATION,COMPETENCE,LANGUAGES) </h1>
        <script>

setTimeout(()=>
{
location.href="./index.php";
},3000);
        </script>


</body>
</html>

<?php }?>