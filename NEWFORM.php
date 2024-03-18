<?php
session_start();
if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailc"]))
    header("location:WITHDBCAN/index.php");



else {

?>


    <?php



    include "./DBCLASS.php";
    $DB = new DBH();
    $connect = $DB->DATABASE();
    $FORMATION = [];
    $FORMAKEY = [];
    $SKILLS = [];
    $SKILLSKEY = [];
    $EXPER = [];
    $EXPERKEY = [];
    $PROJECT = [];
    $PROJECTKEY = [];
    $LANGS = [];
    $LANGSKEY = [];
    $i = 0;
    $j = 0;
    $k = 0;
    $l = 0;
    $m = 0;

  
    
    $content=$connect->prepare("select * from logincan where id_cl=?");
    $content->execute(array($_SESSION["ID_C"]));
    $VALUES=$content->fetch();
     try
     {
        $DATAA = $connect->prepare("select * from logincan where id_cl=?");
        $DATAA->execute(array($_SESSION["ID_C"]));
        $LINE=$DATAA->fetch();
        $TEL=$LINE["TEL"];
        $ADRE=$LINE["ADRESSE"];
        $DOMI=$LINE["domain"];

     }catch(PDOException $e){echo $e->getMessage();};

    try {
        $FOR = $connect->prepare("select * from  educt where id_c=?");
        $FOR->execute(array($_SESSION["ID_C"]));
        $OL = $FOR->fetchAll(PDO::FETCH_ASSOC);
        foreach ($OL as $VALUE) {

            foreach ($VALUE as $KEY => $V) {
                if ($KEY !== "ID_ED" && $KEY !== "id_c"){
                    $FORMATION[$i] = $V;
                    $FORMAKEY[$i] = $KEY;
                    $i++;
                }
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
    try {

        $SKILL = $connect->prepare("select * from  skills where id_c=?");
        $SKILL->execute(array($_SESSION["ID_C"]));
        $SK = $SKILL->fetchAll(PDO::FETCH_ASSOC);
        foreach ($SK as $VALUE) {

            foreach ($VALUE as $KEY => $V) {
                if ($KEY !== "id_skills" && $KEY !== "id_c") {
                    $SKILLS[$j] = $V;
                    $SKILLSKEY[$j] = $KEY;
                    $j++;
                }
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
    try {
        $EXPRT = $connect->prepare("select * from  exprt where id_c=?");
        $EXPRT->execute(array($_SESSION["ID_C"]));
        $EXPRNUM = $EXPRT->rowCount();
        if ($EXPRNUM > 0) {
            $OL = $EXPRT->fetchAll(PDO::FETCH_ASSOC);
            foreach ($OL as $VALUE) {

                foreach ($VALUE as $KEY => $V) {
                    if ($KEY !== "id_exp" && $KEY !== "id_c") {
                        $EXPER[$k] = $V;
                        $EXPERKEY[$k] = $KEY;
                        $k++;
                    }
                }
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };


    try {



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

        $ID_F = $ID_ET[$G - 1] ?? null;
        $ID_X = $ID_EX[$G1 - 1] ?? null;


        $PROJE = $connect->prepare("select * from  projects where id_etud=?  or id_exp=?");
        $PROJE->execute(array($ID_F, $ID_X));
        $PROJECTNUM = $PROJE->rowCount();
        $OL = $PROJE->fetchAll(PDO::FETCH_ASSOC);
        foreach ($OL as $VALUE) {

            foreach ($VALUE as $KEY => $V) {
                if ($KEY !== "id_exp" && $KEY !== "id_etud" && $KEY !== "id_PRO") {
                    $PROJECT[$l] = $V;
                    $PROJECTKEY[$l] = $KEY;
                    $l++;
                }
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
    try {
        $LAN = $connect->prepare("select * from  languages where id_c=?");
        $LAN->execute(array($_SESSION["ID_C"]));
        $OL = $LAN->fetchAll(PDO::FETCH_ASSOC);
        foreach ($OL as $VALUE) {

            foreach ($VALUE as $KEY => $V) {
                if ($KEY !== "id_lang" && $KEY !== "id_c") {
                    $LANGS[$m] = $V;
                    $LANGSKEY[$m] = $KEY;
                    $m++;
                }
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };




    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="NORMALIZE.css">
        <link rel="icon" href="fantasy-flight-games.svg">

        <title>NEW PROJECTJS
        </title>
    </head>


    <body>
        <!--
        <div class="settings" title="SETTINGS">

            <div class="SOUSCONTAINER">
                <i class="fa fa-gear" id="II"></i>
            </div>
            <div class="settings_container">
                SETTING OPTIONS
                <div class="options">
                    <h4>COLORS </h4>
                    <ul class="LIST">
                        <li data-color="red"></li>
                        <li data-color="blue"></li>
                        <li data-color="yellow"></li>
                        <li data-color="green"></li>
                        <li data-color="pink"></li>
                        <li data-color="black"></li>
                    </ul>
                    !-- <button id="SPEC" style=" cursor: pointer;text-align: center; border-radius:20px;padding:10px;border:none;">RESET</button> --
                </div>
                <div class="options">
                    <h4>RANDOM OPTIONS</h4>
                    <div class="RANDOM">
                        <span class="YEAS" data-text="YEAS">YES</span>
                        <span class="NO" data-text="NO">NO</span>
                    </div>
                </div>
                !-- <button id="SPEC" style="position:absolute;bottom:0;cursor: pointer;;text-align: center;border-radius:20px;padding:10px;border:none;margin:10px;"><a href="decon.php" style="text-decoration:none;color:red">DISCONNECT</a></button> --

            </div>
        </div>
-->
        <div class="page" id="pager">

            <div class="container">
                <button class="btn"></button>
                <h2 class="LOGO"><i class="fa-brands fa-fantasy-flight-games icon"></i>JoBNesT</h2>
                <nav>
                    <ul>
                    <li> <a href="./acceuil1-main/NEWCANDIDATE.php">About</a></li>
                        <li><a href="./acceuil1-main/NEWCANDIDATE.php ">Home</a> </li>
                        <li><a href="./acceuil1-main/NEWCANDIDATE.php ">Service</a></li>
                        <li><a href="./acceuil1-main/NEWCANDIDATE.php ">Contact</a></li>

                    </ul>
                </nav>
                <section class="articles">
                <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
                    <div class="upload">
        <?php
       
        $image = $VALUES["IMAGE"];
      
        ?>
        <img src="./FILES/UPLOADS/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>">
        <div class="round">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
    </form>
    <script type="text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
     <?php
    if(isset($_FILES["image"]["name"])){


      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
      
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
        
        </script>
        ";
      }
      else{
        $newImageName = "IMG-". " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
       $content=$connect->prepare("update logincan set IMAGE=? where id_cl=?");

       $content->execute(array($newImageName,$_SESSION["ID_C"]));
        move_uploaded_file($tmpName,'/xampp/htdocs/HTML/PRACTICE/PROJECTXXL/FILES/UPLOADS/'. $newImageName);
        echo
        "
        <script>
        document.location.href='./NEWFORM.php';
        </script>
        ";
      }
    }
    ?>

                    <form action="./CHANGING.php" method="post" novalidate enctype="multipart/form-data">

                        <div class="PERSON">
                            <label for="NOM">Nom</label>
                            <input type="text" readonly value="<?php echo $_SESSION["nomc"] ?>" id="NOM">
                            <label for="PRENOM">Prenom</label>
                            <input type="text" readonly value="<?php echo $_SESSION["prenomc"] ?>" id="PRENOM">
                            <label for="email">Email</label>
                            <input type="email" readonly value="<?php echo $_SESSION["emailc"] ?>" id="email" />
                            <label for="DOMAINE">Domain</label>
                            <input type="text" name="DOMAIN" id="DOMAINE" required placeholder="Domain" value="<?php echo $DOMI ?>" />
                            <label for="ADRESSE">Adress</label>
                            <input type="text" name="ADRESSE" id="ADRESSE" required placeholder="...@gmail.com" value="<?php echo $ADRE ?>" />
                            <label for="TEL">Tele</label>
                            <input type="text" name="TEL" minlength="10" maxlength="12" required id="TEL" placeholder="Tel-Number" value="<?php echo $TEL ?>">
                            <!-- <label for="NOM" >NOM</label>
    <input type="text" readonly value="" id="NOM" >
    <label for="NOM">NOM</label>
    <input type="text" readonly value="" id="NOM" > -->
                        </div>
                        <div class="DYNAMIC">
                            <div class="PART1">
                                <h1>Formation</h1>
                                <div class="FORMAT">
                                    <input type="text" id="TASK1" placeholder="INSTITUTION">
                                    <label for="TASK">Graduation_Date</label>
                                    <input type="DATE" id="TASK1" placeholder="DATE" title="Graduation_Date">
                                    <input type="text" id="TASK1" placeholder="Fillier">
                                    <input type="text" id="TASK1" placeholder="Diplome">
                                    <button type="button" title="ADD FORMATIONS" class="FOR">+</button>

                                </div>

                                <div class="TAHT1">



                                    <script type="text/javascript">
                                        function PUTTING(TE, TAHT) {

                                            this.ABTAHT1 = document.querySelector(`form .DYNAMIC .TAHT${TAHT}`);
                                            this.TERM = `${TE}[]`;
                                            
                                            this.GRABER = document.createElement("div");
                                       



                                            // let FORMA=FORMATION();


                                            this.IMPO = function(TAB, KEY) {
                                                let ELEMENTS = document.createElement("div");
                                                ELEMENTS.className = "TOTAL";
                                                let TEXT = document.createTextNode(`${KEY}`);
                                                let span = document.createElement("span");
                                                let SAVE = document.createElement("button");
                                                let B1 = document.createElement("button");

                                                B1.innerHTML = "EDIT";
                                                B1.className = "BED";
                                                SAVE.innerHTML = "SAVE";

                                                SAVE.className = "SAEDIT disap";
                                                let CA = document.createElement("input");
                                                CA.type = "text";
                                                CA.className = `${TAB} CHOICES`;
                                                CA.readOnly = true;
                                                CA.style.cssText = "background-color:BLACK;outline:none;border-radius:10px; width:fit-content;padding:20px;margin:10px auto;color:white;"
                                                CA.value = TAB;
                                                CA.name = this.TERM;
                                                B1.type = "button";
                                                SAVE.type = "button";
                                                // CA.append(el.value);
                                                span.append(TEXT);
                                                span.style.cssText = "COLOR:var(--maincolor,RED);";
                                                ELEMENTS.append(CA);
                                                ELEMENTS.append(B1);
                                                ELEMENTS.append(SAVE);
                                                this.GRABER.append(span);
                                                this.GRABER.append(ELEMENTS);



                                            }
                                            this.SEPERATOR=function()
                                            {
                                                let HR = document.createElement("hr");
                                            HR.style.cssText = "border:3px dashed red;width:300px;margin:20px;";
                                               
                                                this.GRABER.append(HR);

                                            }

                                            this.ENDING = function() {
                                                this.GRABER.className = "DATA1";
                                                this.GRABER.style.cssText = "margin:60px;position:relative;";
                                                this.ABTAHT1.append(this.GRABER);
                                                // window.sessionStorage.setItem(TE1.value,TE1.value);
                                            }

                                        }
                                        let ADDING1 = new PUTTING("NFOR", "1");
                                    </script>
                                    <?php
                                    for ($i = 0; $i < count($FORMATION); $i=$i+4) {
                                            
                                        $first=$i;
                                        $second=$i+1;
                                        $third=$i+2;
                                        $FOURTH=$i+3;
                                        echo "<script>
                                        ADDING1.SEPERATOR();
ADDING1.IMPO('$FORMATION[$first]','$FORMAKEY[$first]');
ADDING1.IMPO('$FORMATION[$second]','$FORMAKEY[$second]');
ADDING1.IMPO('$FORMATION[$third]','$FORMAKEY[$third]');
ADDING1.IMPO('$FORMATION[$FOURTH]','$FORMAKEY[$FOURTH]');
 </script>";


                   };
                                    echo "<script>
                                    ADDING1.ENDING();

</script>";


                                    ?>

                                </div>
                            </div>
                            <div class="PART2">
                                <h1>Competences</h1>
                                <div class="FORMAT">

                                    <input type="text" id="TASK2" placeholder="SKILL">
                                    <input type="text" id="TASK2" placeholder="LEVEL">


                                    <button type="button" class="SKILL" title="ADD COMPETENCES">+</button>

                                </div>
                                <div class="TAHT2">
                                    <script type="text/javascript">
                                        let ADDING2 = new PUTTING("NSKILL", "2");
                                    </script>
                                    <?php
                                    for ($i = 0; $i < count($SKILLS); $i=$i+2) {
                                        $first=$i;
                                        $second=$i+1;
                                        echo "<script>
                                        ADDING2.SEPERATOR();
ADDING2.IMPO('$SKILLS[$first]','$SKILLSKEY[$first]');
ADDING2.IMPO('$SKILLS[$second]','$SKILLSKEY[$second]');


 </script>";
                                    };
                                    echo "<script>
     
ADDING2.ENDING();
</script>";


                                    ?>

                                </div>
                            </div>
                            <div class="PART3">
                                <h1>Experiences</h1>
                                <div class="FORMAT">

                                <input type="text" id="TASK3" placeholder="Societe">
                                    <input type="text" id="TASK3" placeholder="Period">
                                    <input type="text" id="TASK3" placeholder="Poste">

                                    <button type="button" class="EXPS" title="ADD EXPERIANCES">+</button>

                                    
                                </div>
                                <div class="TAHT3">
                                <?php if ($EXPRNUM > 0) { ?>
                                    <script type="text/javascript">
                                        let ADDING3 = new PUTTING("NEXPR", "3");
                                    </script>
                                    <?php
                                        for ($i = 0; $i < count($EXPER); $i=$i+3) {
                                            $first=$i;
                                            $second=$i+1;
                                            $third=$i+2;
                                            echo "<script>
                                            ADDING3.SEPERATOR();
ADDING3.IMPO('$EXPER[$first]','$EXPERKEY[$first]');
ADDING3.IMPO('$EXPER[$second]','$EXPERKEY[$second]');
ADDING3.IMPO('$EXPER[$third]','$EXPERKEY[$third]');
</script>";
                                        };
                                        echo "<script>
  
ADDING3.ENDING();
</script>";


                                    ?>

                                <?php } ?>

                                </div>
                            </div>
                            <div class="PART4">
                                <h1>Projects</h1>
                                <div class="FORMAT">

                                    <input type="text" id="TASK4" placeholder="Project_name">
                                    <textarea style="margin-left: 5px; min-height:150px;min-width:300px;outline:none;border-raduis:20px; border:3px solid black; caret-color:red;max-width:400px" id="TASK4" placeholder="DESCRIPTION"></textarea>


                                    <button type="button" class="PROJET" title="ADD PROJECTS">+</button>

                                </div>
                                <div class="TAHT4">
                                    <?php if ($PROJECTNUM > 0) { ?>
                                        <script type="text/javascript">
                                            let ADDING4 = new PUTTING("NPROJECT", "4");
                                        </script>
                                        <?php
                                        for ($i = 0; $i < count($PROJECT); $i=$i+2) {
                                            $first=$i;
                                            $second=$i+1;
                                            echo "<script>
  ADDING4.SEPERATOR();
       ADDING4.IMPO('$PROJECT[$first]','$PROJECTKEY[$first]');
       ADDING4.IMPO('$PROJECT[$second]','$PROJECTKEY[$second]');

</script>";



                                        };
                                        echo "<script>
  
ADDING4.ENDING();
</script>";
                                        ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="PART5">
                            <h1>Languages</h1>
                                <div class="FORMAT">
                                    <input type="text" id="TASK5" placeholder="Language">
                                    <input type="text" id="TASK5" placeholder="Level">

                                    <button type="button" class="LANG" title="ADD LANGUAGES">+</button>

                                </div>
                                <div class="TAHT5">

                                    <script type="text/javascript">
                                        let ADDING5 = new PUTTING("NLANGS", "5");
                                    </script>
                                    <?php
                                    for ($i = 0; $i < count($LANGS); $i=$i+2) {
                                        $first=$i;
                                        $second=$i+1;
                                        echo "<script>
                                        ADDING5.SEPERATOR();
ADDING5.IMPO('$LANGS[$first]','$LANGSKEY[$first]');
ADDING5.IMPO('$LANGS[$second]','$LANGSKEY[$second]');

</script>";
                                    };
                                    echo "<script>
  
ADDING5.ENDING();
</script>";


                                    ?>

                                </div>
                            </div>
                            <div class="PART6">
                            <h1>Votre CV</h1>
                                <div class="FORMAT">
                                    
                                
                                


                                    <input type="file"   id="file"  name="FISH">
                                    
                                
                    
                                </div>
                            
                            </div>
                        </div>

                        <button  class="FINISH"  style="margin-left:45%;border-radius:7px;padding:10px;margin-bottom:120px;background-color:BLUE;color:black;cursor:pointer" >CHANGE YOUR CV</button>

                    </form>
                    <script src="INPUTS.js"></script>
                    <!-- <div class="IMPO"></div>
    <button>RESET</button>
    </div>  -->



                    <!-- <div class="skills">
                        <h3>SKILLS</h3>
                        <div class="skill-box">
                            <div class="skill-name">JAVASCRIPT</div>
                            <div class="skill-progress">
                                <span data-progress="89%"></span>
                            </div>
                        </div>
                        <div class="skill-box">
                            <div class="skill-name">HTML</div>
                            <div class="skill-progress" >
                                <span data-progress="60%"></span>
                            </div>
                        </div>
                        <div class="skill-box">
                            <div class="skill-name">CSS</div>
                            <div class="skill-progress" >
                                <span data-progress="50%"></span>
                            </div>
                        </div>
                        
                    </div> -->
                    <!-- <div class="POPUP" style="padding: 20px;">
                <div class="POPUP_box">
                    <img style="width: 100px; height:100px" src="images/Screenshot2024-01-22153054.png" alt="image one">
                    <img style="width: 100px; height:100px" src="images/pexels-pixabay-373543.jpg" alt="image two">
                </div>
                        </div> -->



                </section>
            </div>
        </div>
        <footer> Copyright &copy; All Rights Reserved</footer>
        <script src="backend.js"></script>
    </body>

    </html>
<?php } ?>