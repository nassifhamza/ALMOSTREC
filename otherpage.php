<?php
// if((!empty($_POST["username"])&& isset($_POST["username"])) && ((!empty($_POST["password"]) && isset($_POST["password"]))))
// {
//     $USEERNAME=htmlspecialchars($_POST["username"]);
//     $password=htmlspecialchars($_POST["password"]);
//     echo "some stuff are for " . $USEERNAME . " and password is " . $password . "<br>";
// echo "<script> location.href='index.html'</script>";}
// else 
//     echo "<h1 style='text-align:center;font-size:3rem;font-weight:bolder'>ERROR 404</h1>";

// if(isset($_GET["id"]))
// {
//     if (filter_var($_GET["id"],FILTER_VALIDATE_INT) || filter_var($_GET["id"],FILTER_VALIDATE_INT)===0 )
//     echo "the id is the following one ".$_GET["id"];

// }
// else
// {
//     echo "there is no fucking ID IN HERE ";
// }

// if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]))
// {
// if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
// $name=htmlspecialchars($_POST["name"]);
// $email=htmlspecialchars($_POST["email"]);
// $pass=htmlspecialchars($_POST["password"]);


// }



try
{
$connect = new PDO("mysql:host=localhost;dbname=clients;port=3306;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){echo $e->getMessage();}

//  $content=$connect->query("select * from login2");
$content=$connect->prepare("select * from login2 where name=? and email=? and password=?");
// $content->execute(array($name,$email,$pass));
// // $line=$content->fetch();
// // echo $line["email"];
// echo "<table border=1>";
// while($n = $content->fetch()) {
//     echo "<tr>";
//     echo "<td>";
//     echo $n["id_cl"];
//     echo "</td>";
//     echo "<td>";
//     echo $n["name"];
//     echo "</td>";
//     echo "<td>";
//     echo $n["email"];
//     echo "</td>";
//     echo "<td>";
//     echo $n["password"];
//     echo "</td>";
//     echo "</tr>";
// }
// echo "</table>";




try
{
$connect = new PDO("mysql:host=localhost;dbname=clients;port=3306;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){echo $e->getMessage();}
?>
