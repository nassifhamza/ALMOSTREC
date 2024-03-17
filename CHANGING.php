<?php

session_start();
if (!isset($_POST["NFOR"]) || !isset($_POST["NSKILL"]) || !isset($_POST["NLANGS"])) {
    header("location:./acceuil1-main/condidat.php");
} else { ?>

    <?php

    include './DBCLASS.php';
    $DB = new DBH();
    $connect = $DB->DATABASE();
    $DOMAIN = htmlspecialchars($_POST["DOMAIN"]);
    $ADRESSE = htmlspecialchars($_POST["ADRESSE"]);
    $TEL = htmlspecialchars($_POST["TEL"]);

    if (isset($_FILES["FISH"])) {
        $filename = $_FILES["FISH"]["name"];
        $temp_name = $_FILES["FISH"]["tmp_name"];
        $file_ex = pathinfo($filename, PATHINFO_EXTENSION);
        $ALLOWEDEXTNS = array("pdf", "word", "jpg", "jpeg", "png");
        $NEEX = strtolower($file_ex);
        if (in_array($NEEX, $ALLOWEDEXTNS)) {
            $newfile = uniqid("FILE-", true) . "." . $file_ex;
            $FILE_UPLOAD_PATH = "/xampp/htdocs/HTML/PRACTICE/PROJECTXXL/FILES/UPLOADS/" . $newfile;
            move_uploaded_file($temp_name, $FILE_UPLOAD_PATH);
            $content = $connect->prepare("update logincan set path_file=? where id_cl=?");
            $content->execute(array($newfile, $_SESSION["ID_C"]));
        } else {
            echo "<script> 
           alert('YOUR FILE TYPE IS NOT SUPPORTED');
           </script>";
        }
    }






    $SETDOMAIN = $connect->prepare("update logincan set domain=? where id_cl=?");
    $SETDOMAIN->execute(array($DOMAIN, $_SESSION["ID_C"]));
    $SETADRESSE = $connect->prepare("update logincan set ADRESSE=? where id_cl=?");
    $SETADRESSE->execute(array($ADRESSE, $_SESSION["ID_C"]));
    $SETTEL = $connect->prepare("update logincan set TEL=? where id_cl=?");
    $SETTEL->execute(array($TEL, $_SESSION["ID_C"]));

    $FORMAT1 = [];
    $SKILLS1 = [];
    $EXPER1 = [];
    $PROJETS1 = [];
    $LANGS1 = [];


    $FORMAT = [];
    $SKILLS = [];
    $EXPER = [];
    $PROJETS = [];
    $LANGS = [];
    $i1 = 0;
    $j1 = 0;
    $k1 = 0;
    $l1 = 0;
    $m1 = 0;








    $FIRST1 = $_POST["NFOR"];
    $SECOND1 = $_POST["NSKILL"];
    $FIFTH1 = $_POST["NLANGS"];


    foreach ($FIRST1 as $TAB) {
        $FORMAT1[$i1] = htmlspecialchars($TAB);
        $i1++;
    }

    try {

        $content = $connect->prepare("update educt set INSTUT=?,date_OBT=?,FILIER=?,diplome=? where ID_ED=? and id_c=?");
        $content3 = $connect->prepare("select  * from educt where id_c=? ");
        $content3->execute(array($_SESSION["ID_C"]));
        for ($i = 0; $i < sizeof($FORMAT1); $i = $i + 4) {
            $IDVAL = $content3->fetch();
            $ID = $IDVAL["ID_ED"];
            $content->execute(array($FORMAT1[$i], $FORMAT1[$i + 1], $FORMAT1[$i + 2], $FORMAT1[$i + 3], $ID, $_SESSION["ID_C"]));
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };




    foreach ($SECOND1 as $TAB) {
        $SKILLS1[$j1] = htmlspecialchars($TAB);
        $j1++;
    }


    foreach ($FIFTH1 as $TAB) {
        $LANGS1[$k1] = htmlspecialchars($TAB);
        $k1++;
    }



    try {

        $content = $connect->prepare("update skills set  skills=?,level=? where id_skills=? and id_c=?");
        $content4 = $connect->prepare("select  * from skills where id_c=? ");
        $content4->execute(array($_SESSION["ID_C"]));
        for ($i = 0; $i < sizeof($SKILLS1); $i = $i + 2) {

            $IDVAL = $content4->fetch();
            $ID = $IDVAL["id_skills"];
            $content->execute(array($SKILLS1[$i], $SKILLS1[$i + 1], $ID, $_SESSION["ID_C"]));
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };

    try {

        $content = $connect->prepare("update languages set  langs=?,level=? where id_lang=? and id_c=?");
        $content5 = $connect->prepare("select  * from skills where id_c=? ");
        $content5->execute(array($_SESSION["ID_C"]));
        for ($i = 0; $i < sizeof($LANGS1); $i = $i + 2) {
            $IDVAL = $content5->fetch();
            $ID = $IDVAL["id_skills"];
            $content->execute(array($LANGS1[$i], $LANGS1[$i + 1], $ID, $_SESSION["ID_C"]));
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };





    // if (isset($_POST["NEXPR"])) {
    //     $THIRD1 = $_POST["NEXPR"];

    //     foreach ($THIRD1 as $TAB) {
    //         $EXPER1[$l1] = htmlspecialchars($TAB);

    //         $l1++;
    //         echo  $TAB . "<br>";
    //     }

    //     try {



    //         for ($i = 0; $i < sizeof($EXPER1); $i = $i + 3) {

    //             $content = $connect->prepare("update exprt set  societe=?,period=?,POSTE=? where id_c=?");
    //             $content->execute(array($EXPER1[$i], $EXPER1[$i + 1], $EXPER1[$i + 2], $_SESSION["ID_C"]));
    //         }
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     };
    // }
    if (isset($_POST["NEXPR"])) {
        $THIRD1 = $_POST["NEXPR"];
        $EXPER1 = [];
        $l1 = 0; // Initialize the counter variable

        foreach ($THIRD1 as $TAB) {
            $EXPER1[$l1] = htmlspecialchars($TAB);
            $l1++;
        }



        try {
            $content1 = $connect->prepare("UPDATE exprt SET societe = ?, period = ?, POSTE = ? WHERE id_exp = ? and id_c = ?");
            $content2 = $connect->prepare("select  * from exprt where id_c=? ");
            $content2->execute(array($_SESSION["ID_C"]));

            for ($i = 0; $i < count($EXPER1); $i += 3) {
                // Ensure there are enough elements for each update

                if (isset($EXPER1[$i], $EXPER1[$i + 1], $EXPER1[$i + 2])) {

                    $IDVAL = $content2->fetch();
                    $ID = $IDVAL["id_exp"];
                    $content1->execute([$EXPER1[$i], $EXPER1[$i + 1], $EXPER1[$i + 2], $ID, $_SESSION["ID_C"]]);
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    if (isset($_POST["NPROJECT"])) {

        $FOURTH1 = $_POST["NPROJECT"];
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




        foreach ($FOURTH1 as $TAB) {
            $PROJETS1[$m1] = htmlspecialchars($TAB);
            $m1++;
        }


        $ID_ETV = $ID_ET[$G - 1] ?? null;
        $ID_EXV = $ID_EX[$G1 - 1] ?? null;


        try {



            $content = $connect->prepare("update projects set  project_name=?,project_desc=? where (id_exp=? or id_etud=?) and id_PRO=?");

            $content7 = $connect->prepare("select  * from projects where id_exp=? or id_etud=? ");
            $content7->execute(array($ID_EXV,$ID_ETV));


            for ($i = 0; $i < sizeof($PROJETS1); $i = $i + 2) {

                $IDVAL = $content7->fetch();
                $ID = $IDVAL["id_PRO"];
                $content->execute(array($PROJETS1[$i], $PROJETS1[$i + 1], $ID_EXV, $ID_ETV,$ID));
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        };
    }
    $i = 0;
    $j = 0;
    $k = 0;
    $l = 0;
    $m = 0;

    if (isset($_POST["FORMATS"])) {

        $FIRST = $_POST["FORMATS"];

        foreach ($FIRST as $TAB) {
            $FORMAT[$i] = htmlspecialchars($TAB);

            $i++;
        }



        try {

            $content9 = $connect->prepare("insert into educt (id_c,INSTUT,date_OBT,FILIER,diplome) values (?,?,?,?,?)");

            for ($i = 0; $i < sizeof($FORMAT); $i = $i + 4) {



                $content9->execute(array($_SESSION["ID_C"], $FORMAT[$i], $FORMAT[$i + 1], $FORMAT[$i + 2], $FORMAT[$i + 3]));
            }
        } catch (PDOException $e) {

            echo $e->getMessage();
        };
    }

    if (isset($_POST["SKILLS"])) {
        $SECOND = $_POST["SKILLS"];
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
    }

    if (isset($_POST["LANGS"])) {
        $FIFTH = $_POST["LANGS"];
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
    }
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

                background-color: green;
                position: absolute;
                top: 50%;
                left: 50%;
                border-radius: 10px;
                padding: 10px;
                transform: translate(-50%, -50%);
                text-align: center;


            }
        </style>
        <h1>YOU HAVE CHANGED YOUR DATA SUCCESSFULLY</h1>
        <script>
            setTimeout(() => {



                location.href = "./acceuil1-main/NEWCANDIDATE.php";




            }, 3000);
        </script>

    </body>

    </html>


<?php } ?>