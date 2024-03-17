<?php
//first methode
// $connection= mysqli_connect("localhost","root","","clients");
//second method
// if(isset($_POST["visible"]))
// {
// //     echo "<script> 
// //     let PASSWORD=document.querySelector('input[name='password']');
// // console.log(PASSWORD);
// //     </script>";
// echo "<script> console.log('kha') </script>";
// }


include '../DBCLASS.php';
include '../SIGNUPREC.php';
$DB = new DBH();
$connect = $DB->DATABASE();


if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["prenom"])  && isset($_POST["USERNAME"]) && isset($_POST["password1"])) {

    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["prenom"])  && !empty($_POST["USERNAME"]) && !empty($_POST["password1"])) {
        $name = htmlspecialchars($_POST["name"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $email = htmlspecialchars($_POST["email"]);
        $pass = htmlspecialchars($_POST["password"]);
        $pass1 = htmlspecialchars($_POST["password1"]);
        $username = htmlspecialchars($_POST["USERNAME"]);
        $TEL = htmlspecialchars($_POST["TEL"]);
        $SOCIETE = htmlspecialchars($_POST["SOCIETE"]);
        $ADRESSE = htmlspecialchars($_POST["ADRESSE"]);


        $content = $connect->prepare("select * from loginrec where username=? or email=?");
        $content->execute(array($username, $email));
        $num = $content->rowCount();


        if ($num == 0) {
            if ($pass === $pass1) {

                $SIGNUP = new RECSIGN($name, $email, $pass, $username, $prenom, $SOCIETE, $TEL, $ADRESSE);
                $SIGNUP->SIGNREC();
            } else {
                echo "<div style='border-radius:20px;color:black;margin-top:70px;margin-right:100px;background-color:red;padding:20px;font-weight:bolder;font-size:larger;text-transform:uppercase'> verify your password please,it seems they are not VALID</div>";
            }
        } else {

            echo "<div style='border-radius:20px;color:black;margin-top:70px;margin-right:100px;;background-color:red;padding:20px;font-weight:bolder;font-size:larger;text-transform:uppercase'> EMAIL OR USERNAME ALREADY EXISTS</div>";
        }
    }
}
 
if (isset($_POST["emailS"]) && isset($_POST["passwordS"])) {
    if (!empty($_POST["emailS"]) && !empty($_POST["passwordS"])) {
        session_start();
        $_SESSION["emailS"] = $_POST["emailS"];
        $_SESSION["passwordS"] = $_POST["passwordS"];
        $email2 = htmlspecialchars($_SESSION["emailS"]);
        $pass2 = htmlspecialchars($_SESSION["passwordS"]);


        $content = $connect->prepare(" select * from loginrec where (username=? or email=?) and password=?");
        $content->execute(array($email2, $email2, $pass2));
        $line = $content->rowCount();

        if ($line > 0) {
            header("location:../acceuil1-main/recruiter.php");
            $DATAR = $content->fetch();
            $_SESSION["nom"] = $DATAR["name"];
            $_SESSION["prenom"] = $DATAR["prenom"];
            $_SESSION["user"] = $DATAR["username"];
            $_SESSION["ID_RE"] = $DATAR["id_r"];

            if (isset($_POST["check"])) {
                setcookie("email", $_SESSION["emailS"], time() + 365 * 24 * 3600, null, null, false, true);
                setcookie("password", $_SESSION["passwordS"], time() + 365 * 24 * 3600, null, null, false, true);
            } else {
                setcookie("email", "", time() - 3600, null, null, false, true);
                setcookie("password", "", time() - 3600, null, null, false, true);
            }
        } else {

            echo "<p style='border-radius:20px;color:black;margin-right:100px;;margin-top:70px;background-color:red;padding:20px;font-weight:bolder;font-size:larger;text-transform:uppercase'> either you have a wrong PASSWORD OR  THIS EMAIL DOESN'T EXIST <p>";
        }
    }
}




// if(isset($_POST["emailS"]) && isset($_POST["passwordS"]))
// {
// if(!empty($_POST["emailS"]) && !empty($_POST["passwordS"]))
// {
// $email2=htmlspecialchars($_POST["emailS"]);
// $pass2=htmlspecialchars($_POST["passwordS"]);

// try
//     {
//     $connect = new PDO("mysql:host=localhost;dbname=clients;port=3306;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
//     }catch(Exception $e){echo $e->getMessage();}
//     $content=$connect->prepare(" select * from login where email=? and password=?");
//     $content->execute(array($email2,$pass2));
//     $line=$content->rowCount();
//     if($line>0)
//     {
//     echo "<script> location.href='../index.html'</script>";
//     }
//     else
//     {
//         echo "either you have a wrong PASSWORD OR  THIS EMAIL DOESN'T EXIST";
//     }



// }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="this is a web site login">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>LOGIN</title>
</head>

<body>
    <div class="LISTCONTAINER">
        <ul>
        <li> <a href="../acceuil1-main/index.php">Acceuil</a></li> 
         <li><a href="../acceuil1-main/index.php">About</a></li> 
        <li><a href="../acceuil1-main/index.php">Contact</a></li>
        </ul>
    </div>
    <div class="LOGO" style="font-size: 40px; text-transform:capitalize;margin:20px"><i class="fa-brands fa-fantasy-flight-games icon"></i> recruteur</div>
    <div class="container" id="container">

        <div class="form-container sign-up">
            <form action="" method="post">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>

                </div>
                <span> New Account </span>
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="prenom" name="prenom" required>
                <input type="text" placeholder="USERNAME" name="USERNAME" required>
                <input type="text" placeholder="SOCIETE" name="SOCIETE" required>
                <input type="text" placeholder="ADRESSE" name="ADRESSE" required>
                <input type="text" minlength="10" maxlength="10" placeholder="TEL" name="TEL" required>

                <input type="email" placeholder="Email" name="email" required>
                <input type="password" pattern="(?=(.*[0-9]))(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;'<>,./?])(?=.*[a-z])(?=(.*[A-Z]))(?=(.*)).{8,}" placeholder="password" name="password" required>
                <input type="password" pattern="(?=(.*[0-9]))(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;'<>,./?])(?=.*[a-z])(?=(.*[A-Z]))(?=(.*)).{8,}" placeholder="confirm password" name="password1" required>
                <button>Sign Up</button>

            </form>

        </div>
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1> Connect with</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>

                </div>
                <span>Or Sign In</span>

                <input type="text" placeholder="Email OR USERNAME" name="emailS" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"]; ?>">
                <input type="password" placeholder="password" name="passwordS" value="<?php if (isset($_COOKIE["password"])) echo $_COOKIE["password"]; ?>">
                <a href="#"style="color: blue;">Forgot your password ?</a>
                <input style="position:relative; left:90px;" type="checkbox" name="visible" class="VISIBLE" id="back1">
                <label for="back1" style="position: relative; top:-20px;left:0px">Show password</label>
                <input style="position:relative; left:80px;" type="checkbox" name="check" class="check" id="back">
                <label for="back" style="position: relative; top:-22px;left:0px">Remember me</label>
                <button id="SIGNIN">Sign In</button>

            </form>

        </div>
        <div class="toggle-container">

            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>
                        Welcome back !
                    </h1>
                    <p> Enter your personal details</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>


                <div class="toggle-panel toggle-right">
                    <h1>
                        HELLO THERE !
                    </h1>
                    <p>Try to join us</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>

    </div>
    <script src="back.js"></script>
</body>

</html>