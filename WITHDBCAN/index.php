<?php


include '../DBCLASS.php';
include '../SIGNUPCAN.php';
$DB = new DBH();
$connect = $DB->DATABASE();
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

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["prenom"])  && isset($_POST["USERNAME"]) && isset($_POST["password1"])) {

    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["prenom"])  && !empty($_POST["USERNAME"]) && !empty($_POST["password1"])) {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $pass = htmlspecialchars($_POST["password"]);
        $pass1 = htmlspecialchars($_POST["password1"]);
        $username = htmlspecialchars($_POST["USERNAME"]);

        $content = $connect->prepare("select * from logincan where username=? or email=?");
        $content->execute(array($username, $email));
        $num = $content->rowCount();


        if ($num == 0) {
            if ($pass === $pass1) {


                $SIGNUP = new CANSIGN($name, $email, $pass, $username, $prenom);
                $SIGNUP->SIGNCAN();
            } else {
                echo "<div style='border-radius:20px;color:black;margin-top:20px;background-color:red;padding:20px;font-weight:bolder;font-size:larger;text-transform:uppercase'>verify your password please,it seems they are not VALID </div>";
            }
        } else {

            echo "$num <div style='border-radius:20px;color:black;margin-top:20px;background-color:red;padding:20px;font-weight:bolder;font-size:larger;text-transform:uppercase'>EMAIL OR USERNAME ALREADY EXISTS</div>";
        }
    }
}

if (isset($_POST["emailS"]) && isset($_POST["passwordS"])) {
    if (!empty($_POST["emailS"]) && !empty($_POST["passwordS"])) {
        session_start();
        $_SESSION["emailc"] = htmlspecialchars($_POST["emailS"]);
        $_SESSION["passwordS"] = htmlspecialchars($_POST["passwordS"]);
        $email2 = htmlspecialchars($_SESSION["emailc"]);
        $pass2 = htmlspecialchars($_SESSION["passwordS"]);


        $content = $connect->prepare(" select * from logincan where (username=? or email=?) and password=?");
        $content->execute(array($email2, $email2, $pass2));
        $line = $content->rowCount();

        if ($line > 0) {

            $DATA = $content->fetch();
            $_SESSION["nomc"] = $DATA["name"];
            $_SESSION["prenomc"] = $DATA["prenom"];
            $_SESSION["userc"] = $DATA["username"];
            $_SESSION["ID_C"] = $DATA["id_cl"];
           
          


            if ($DATA["TEL"] !== null && $DATA["ADRESSE"] !== null && $DATA["domain"] !== null) {
                $_SESSION["image"] = $DATA["IMAGE"];
                $_SESSION["FILE"] = $DATA["path_file"];
                $_SESSION["TEL"] = $DATA["TEL"];
                $_SESSION["ADR"] = $DATA["ADRESSE"];
                $_SESSION["domain"] = $DATA["domain"];

                
               
                header("location:../acceuil1-main/NEWCANDIDATE.php");

            } else {
                header("location:../acceuil1-main/condidat.php");
            }
            if (isset($_POST["check"])) {
                setcookie("email", $_SESSION["emailc"], time() + 365 * 24 * 3600, null, null, false, true);
                setcookie("password", $_SESSION["passwordS"], time() + 365 * 24 * 3600, null, null, false, true);
            } else {
                setcookie("email", "", time() - 3600, null, null, false, true);
                setcookie("password", "", time() - 3600, null, null, false, true);
            }
        } else {

            echo "<p style='border-radius:20px;color:black;margin-top:20px;background-color:red;padding:20px;font-weight:bolder;font-size:larger;text-transform:uppercase'> either you have a wrong PASSWORD OR  THIS EMAIL DOESN'T EXIST <p>";
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
            <li> <a href="../acceuil1-main/index.php">ACCEUIL</a></li>
            <li><a href="../acceuil1-main/index.php">ABOUT</a></li>
            <li><a href="../acceuil1-main/index.php">CONTACT</a></li>
        </ul>
    </div>
    <div class="LOGO" style="font-size: 40px; text-transform:capitalize;margin:20px"><i class="fa-brands fa-fantasy-flight-games icon"></i> candidat</div>
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
                <span> CREATE A NEW ACCOUNT </span>
                <input type="text" placeholder="Name" name="name">
                <input type="text" placeholder="prenom" name="prenom">
                <input type="text" pattern="^[a-z0-9_-]{3,16}$" placeholder="USERNAME" name="USERNAME">
                <input type="email" placeholder="Email" name="email">
                <input type="password" pattern="(?=(.*[0-9]))(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;'<>,./?])(?=.*[a-z])(?=(.*[A-Z]))(?=(.*)).{8,}" placeholder="password" name="password">
                <input type="password" pattern="(?=(.*[0-9]))(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;'<>,./?])(?=.*[a-z])(?=(.*[A-Z]))(?=(.*)).{8,}" placeholder="confirm password" name="password1">
                <button>Sign Up</button>

            </form>

        </div>
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>

                </div>
                <span>Or USE YOUR EMAIL PASSWORD</span>

                <input type="text" placeholder="Email OR USERNAME" name="emailS" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"]; ?>">
                <input type="password" placeholder="password" name="passwordS" value="<?php if (isset($_COOKIE["password"])) echo $_COOKIE["password"]; ?>">
                <a href="#">Forgot your password ?</a>
                <input style="position:relative; left:90px;" type="checkbox" name="visible" class="VISIBLE" id="back1">
                <label for="back1" style="position: relative; top:-20px;left:0px">SHOW PASSWORD</label>
                <input style="position:relative; left:80px;" type="checkbox" name="check" class="check" id="back">
                <label for="back" style="position: relative; top:-22px;left:0px">REMEMBER ME</label>
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
                        HELLO :THERE !
                    </h1>
                    <p> Register by your personal details</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>

    </div>




    <script src="back.js"></script>
</body>

</html>