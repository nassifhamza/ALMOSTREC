<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="STYLISH.css">
</head>

<body>

    <?php
    $USERNAME = $PASSWORD = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"]))
            $USERNAME = "<p style='color:red;'>the username is REQUIRED<p>";
        if (empty($_POST["PASSWORD"]))
            $PASSWORD = "<p style='color:red';>the password is REQUIRED<p>";
    }
    ?>
    <?php
    $MESUSERNAME = $MESPASSWORD = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = htmlspecialchars($_POST["username"]);
        $pass = htmlspecialchars($_POST["password"]);
        if (!preg_match("#[a-zA-Z0-9]#", $name)) {
            $MESUSERNAME = "THE FORMAT NAME IS INVALID";
        }
        if (!preg_match("#[a-zA-Z0-9]#", $pass)) {
            $MESPASSWORD = "THE FORMAT PASSWORD IS INVALID";
        }
    }
    ?>

    <style>
        form div input {
            margin: 10px;
        }
    </style>
    <form method="post">
        <div style="margin:20px auto;width:50%">

            <label style="margin-left: 50px;" for="user">username</label>
            <br>
            <input type="text" name="username" id=user> <?php echo $MESUSERNAME ?>
            <br>
            <?php echo $USERNAME ?>

            <br>
            <label style="margin-left: 50px;" for="pass">PASSWORD</label>
            <br>
            <input type="password" name="password" id="pass"><?php echo $MESPASSWORD ?>
            <br>
            <?php echo $PASSWORD ?>
            <br>
            <input type="submit" name="BTN" id="submit" value="CONNECT">
        </div>
    </form>
    <?php





    echo "this is me <br>";
    define("names", "hamza");
    $val = "  could be anything here actually";
    echo "my names are kind cute strats like " . names . $val;
    $value2 = 2;
    $value3 = 3;
    $value1 = $value2 ** $value3;
    echo "sup is $value1 ";

    //****************************************testing some stuff*********************************
    $MAR = array(array("ana", 62), array("me", 78));
    echo "<br>";
    $TEAR = array(12, 214, 423, 3463, 36363, 6363, 63);

    $i = 0;
    while ($i < sizeof($TEAR)) {
        echo "<br> values are " . $TEAR[$i];
        $i++;
    }

    function names(float $hgd, float $gdhw)
    {

        return (int)($gdhw * $hgd);
    }
    echo "<br>" . names(28.21, 18);
    $nume1=10;$nume2=0;
    try
    {
        if($nume2===0)
        throw new Exception("NON SENCE");

    }catch(Exception $e){ echo $e->getMessage();}

    ?>
   




    <a style="color: RED;" href="otherpage.php?id=4.67">CLICK ME</a>
    <?php
    include "footer.php"

    ?>
</body>

</html>