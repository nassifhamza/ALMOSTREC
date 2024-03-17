<?php
session_start();
if (!isset($_POST["FORMATS"]) || !isset($_POST["SKILLS"]) || !isset($_POST["LANGS"]) || !isset($_FILES["FILES"])) {
    header("location:./ALERT.php");
} else { ?>

    <?php

    include './DBCLASS.php';
    $DB = new DBH();
    $connect = $DB->DATABASE();
    $DOMAIN = htmlspecialchars($_POST["DOMAIN"]);
    $ADRESSE = htmlspecialchars($_POST["ADRESSE"]);
    $TEL = htmlspecialchars($_POST["TEL"]); 

    $_SESSION["TEL"] = $TEL;
    $_SESSION["ADR"] = $ADRESSE;
    $_SESSION["domain"] = $DOMAIN;

    $SETDOMAIN = $connect->prepare("update logincan set domain=? where id_cl=?");
    $SETDOMAIN->execute(array($DOMAIN, $_SESSION["ID_C"]));
    $SETADRESSE = $connect->prepare("update logincan set ADRESSE=? where id_cl=?");
    $SETADRESSE->execute(array($ADRESSE, $_SESSION["ID_C"]));
    $SETTEL = $connect->prepare("update logincan set TEL=? where id_cl=?");
    $SETTEL->execute(array($TEL, $_SESSION["ID_C"]));


    $filename = $_FILES["FILES"]["name"];
    $temp_name = $_FILES["FILES"]["tmp_name"];

    $file_ex = pathinfo($filename, PATHINFO_EXTENSION);
    $ALLOWEDEXTNS = array("pdf", "word", "jpg", "jpeg", "png");
    $NEEX = strtolower($file_ex);
    if (in_array($NEEX, $ALLOWEDEXTNS)) {
        $newfile = uniqid("FILE-", true) . "." . $file_ex;
        $FILE_UPLOAD_PATH = "/xampp/htdocs/HTML/PRACTICE/PROJECTXXL/FILES/UPLOADS/".$newfile;
        move_uploaded_file($temp_name, $FILE_UPLOAD_PATH);
        $content = $connect->prepare("update logincan set path_file=? where id_cl=?");
        $content->execute(array($newfile, $_SESSION["ID_C"]));
        $_SESSION["FILE"] = $newfile;
    } else {
        echo "<script> alert('FILE TYPE IS NOT SUPPORTED')</script>";
    }
   
    $FORMAT = [];
    $SKILLS = [];
    $EXPER = [];
    $PROJETS = [];
    $LANGS = [];
    $i = 0;
    $j = 0;
    $k = 0;
    $l = 0;
    $m = 0;
    $FIRST = $_POST["FORMATS"];
    $SECOND = $_POST["SKILLS"];
    $FIFTH = $_POST["LANGS"];


    foreach ($FIRST as $TAB) {

        $FORMAT[$i] = htmlspecialchars($TAB);
        $i++;
    }



    try {

        $content = $connect->prepare("insert into educt (id_c,INSTUT,date_OBT,FILIER,diplome) values (?,?,?,?,?)");

        for ($i = 0; $i < sizeof($FORMAT); $i = $i + 4) {

            $content->execute(array($_SESSION["ID_C"], $FORMAT[$i], $FORMAT[$i + 1], $FORMAT[$i + 2], $FORMAT[$i + 3]));
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
    foreach ($SECOND as $TAB) {

        $SKILLS[$j] = htmlspecialchars($TAB);
        $j++;
    }

    try {
        //         $ID_ETUD = $connect->prepare("select  * from educt where id_c=? ");
        // $ID_ETUD->execute(array($_SESSION["ID_C"]));
        // $VAL=$ID_ETUD->fetchAll(PDO::FETCH_ASSOC);
        // $G=0;
        // $ID_ET=[];
        // foreach($VAL as $TABLE)
        // {
        //    if (is_array($TABLE))
        //   {
        //     $ID_ET[$G]=$TABLE["ID_ED"];
        //     $G++;
        //   }

        // }

        // echo $ID_ET[$G-1];



        $content = $connect->prepare("insert into skills (id_c,skills,level) values (?,?,?)");

        for ($i = 0; $i < sizeof($SKILLS); $i = $i + 2) {

            $content->execute(array($_SESSION["ID_C"], $SKILLS[$i], $SKILLS[$i + 1]));
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
    foreach ($FIFTH as $TAB) {
        $LANGS[$k] = htmlspecialchars($TAB);
        $k++;
    }

    try {

        $content = $connect->prepare("insert into languages (id_c,langs,level) values(?,?,?)");

        for ($i = 0; $i < sizeof($LANGS); $i = $i + 2) {

            $content->execute(array($_SESSION["ID_C"], $LANGS[$i], $LANGS[$i + 1]));
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
    if (isset($_POST["EXPS"])) {
        $THIRD = $_POST["EXPS"];

        foreach ($THIRD as $TAB) {
            $EXPER[$l] = htmlspecialchars($TAB);
            $l++;
        }

        try {

            $content = $connect->prepare("insert into exprt (id_c,societe,period,POSTE) values(?,?,?,?)");

            for ($i = 0; $i < sizeof($EXPER); $i = $i + 3) {

                $content->execute(array($_SESSION["ID_C"], $EXPER[$i], $EXPER[$i + 1], $EXPER[$i + 2]));
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        };
    }
    if (isset($_POST["PROJETS"])) {

        $FOURTH = $_POST["PROJETS"];
        //PART OF GRABBING ID OF ID FORMATION
        $ID_ETUD = $connect->prepare("select  * from educt where id_c=? ");
        $ID_ETUD->execute(array($_SESSION["ID_C"]));
        $VAL = $ID_ETUD->fetchAll(PDO::FETCH_ASSOC);
        $G = 0;
        $ID_ET = [];

        foreach ($VAL as $TABLE) {
            if (is_array($TABLE)) {
                $ID_ET[$G] = $TABLE["ID_ED"];
                $G++;
            }
        }



        //PART OF GRABBING ID OF ID EXPERIANCE
        $ID_EXPR = $connect->prepare("select  * from exprt where id_c=? ");
        $ID_EXPR->execute(array($_SESSION["ID_C"]));
        $VAL1 = $ID_EXPR->fetchAll(PDO::FETCH_ASSOC);
        $G1 = 0;
        $ID_EX = [];
        foreach ($VAL1 as $TABLE) {
            if (is_array($TABLE)) {
                $ID_EX[$G1] = $TABLE["id_exp"];
                $G1++;
            }
        }




        foreach ($FOURTH as $TAB) {
            $PROJETS[$m] = htmlspecialchars($TAB);
            $m++;
        }

        $ID_ETV = $ID_ET[$G - 1] ?? null;
        $ID_EXV = $ID_EX[$G1 - 1] ?? null;
        // echo $ID_EXV ." THE NEXT VALUE ".$ID_ETV;

        try {



            $content = $connect->prepare("insert into projects (id_exp,project_name,project_desc,id_etud) values(?,?,?,?)");

            for ($i = 0; $i < sizeof($PROJETS); $i = $i + 2) {

                $content->execute(array($ID_EXV, $PROJETS[$i], $PROJETS[$i + 1], $ID_ETV));
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        };
    }

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
            h1 {
                background-color: GREEN;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                border-radius: 5px;
                padding: 10px;
                text-align: center;

            }
        </style>
        <h1> ALL YOUR DATA ARE READY TO SUBMIT</h1>
        <script>
            setTimeout(() => {
                location.href = "./acceuil1-main/NEWCANDIDATE.php";
            }, 3000);
        </script>

    </body>

    </html>


<?php } ?>