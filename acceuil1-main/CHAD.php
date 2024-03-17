<?php
session_start();
if ( !isset($_SESSION["emailS"]) && !isset($_SESSION["passwordS"])) {
    header("location:../index.php");
} else { ?>

<?php

try {
    $connect = new PDO("mysql:host=localhost;dbname=clients;port=3306;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (PDOException $e) {
    echo $e->getMessage();
  }



  $content=$connect->prepare("insert into postulation (nom,prenom,mail,phone,cv,offre_id,id_c,score,id_r,POST) values(?,?,?,?,?,?,?,?,?,?) ");

  $content->execute(array($_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["TEL"],$_POST["file"],$_POST["id_of"],$_POST["id_c"],$_POST["score"],$_POST["id_r"],$_POST["PST"]));


?>
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
                padding:10px;
                text-align: center;
                transform: translate(-50%,-50%);
                border-radius: 10px;

            }
        </style>
        <h1>  YOU HAVE ACCEPTED THE OFFER SUCCESSFULLY  </h1>
        <script>

setTimeout(()=>
{
location.href="./NEWCANDIDATE.php";
},3000);
        </script>

    </body>

    </html>


<?php } ?>