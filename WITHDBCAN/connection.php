<?php


// $_SESSION["nameS"]=$_POST["nameS"];
// $_SESSION["passwordS"]=$_POST["passwordS"];

// if(  isset($_SESSION["emailS"]) && isset($_SESSION["passwordS"]))
// {
// if(!empty($_SESSION["emailS"]) && !empty($_SESSION["passwordS"]))
// {
// $email2=htmlspecialchars($_SESSION["emailS"]);
// $pass2=htmlspecialchars($_SESSION["passwordS"]);

// try
//     {
//     $connect = new PDO("mysql:host=localhost;dbname=clients;port=3306;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
//     }catch(Exception $e){echo $e->getMessage();}
//     $content=$connect->prepare(" select * from login where email=? and password=?");
//     $content->execute(array($email2,$pass2));
//     $line=$content->rowCount();
//     if($line>0)
//     {
//         header("location:../index.php");
//     }
//     else
//     {

//         header("location:index.php");
       
//     }



// }
// else
// {

// }
// }


// if( isset($_POST["emailS"]) && isset($_POST["passwordS"]))
// {
// if(!empty($_POST["emailS"]) && !empty($_POST["passwordS"]))
// {   
//     $_SESSION["emailS"]=$_POST["emailS"];
//     $_SESSION["passwordS"]=$_POST["passwordS"];
// $email2=htmlspecialchars($_SESSION["emailS"]);
// $pass2=htmlspecialchars($_SESSION["passwordS"]);

// try
//     {
//     $connect = new PDO("mysql:host=localhost;dbname=clients;port=3306;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
//     }catch(Exception $e){echo $e->getMessage();}
//     $content=$connect->prepare(" select * from login where email=? and password=?");
//     $content->execute(array($email2,$pass2));
//     $nom=$content->fetch();
//     $_SESSION["nom"]=$nom["name"];
//     $line=$content->rowCount();
//     if($line>0)
//     {
//         header("location:../index.php");
//     }
//     else
//     {

//         echo "either you have a wrong PASSWORD OR  THIS EMAIL DOESN'T EXIST";
       
//     }



// }
// }



?>