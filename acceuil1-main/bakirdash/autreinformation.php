<?php
session_start();



if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailS"]))
    header("location:../../WITHDBREC/index.php");

else {  include 'config.php';
    $email=$_SESSION["emailS"];
    if(!isset($_GET['id'])){
        echo"la pade n'est pas valable";
    }else {
       $id=$_GET['id'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FULL DATA</title>
    <link rel="stylesheet" href="cssb/bak1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <header class="header">
        <section class="flex">
            <div class="img">
            <h1><i class="fa-brands fa-fantasy-flight-games" style="color: #FFD43B;font-size:50px;margin-left:50px"></i><span style="margin-left: 20px;"></span></h1>
            </div>
           
            <nav class="navbar">
                <a href="../recruiter.php">Home</a>
                <a href="../recruiter.php">About Us</a>
                <a href="../recruiter.php">Search</a>
                <a href="../recruiter.php">Contact Us</a>
                <a href="../recruiter.php">Account</a>
            </nav>
        </section>
    </header>
    <!-- zyada-->
    <div class="container">
        <h1 class="my-4">FULL DATA</h1>
        <a href="view_applyb.php" class="return"><h3 class="my-4">return home</h3></a>
        <table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Formation</th>
            <th>Experience</th>
            <th>Skills</th>
            <th>Languages</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = $conn->prepare("SELECT * FROM educt WHERE id_c=:idCa");
        $sql->bindParam(':idCa', $id, PDO::PARAM_INT);
        $sql->execute();
        $formations = $sql->fetchAll();

        $sqlE = $conn->prepare("SELECT * FROM exprt WHERE id_c=:idCa");
        $sqlE->bindParam(':idCa', $id, PDO::PARAM_INT);
        $sqlE->execute();
        $experiences = $sqlE->fetchAll();

        $sqlS = $conn->prepare("SELECT * FROM skills WHERE id_c=:idCa");
        $sqlS->bindParam(':idCa', $id, PDO::PARAM_INT);
        $sqlS->execute();
        $skills = $sqlS->fetchAll();

        $sqlG = $conn->prepare("SELECT * FROM languages WHERE id_c=:idCa");
        $sqlG->bindParam(':idCa', $id, PDO::PARAM_INT);
        $sqlG->execute();
        $languages = $sqlG->fetchAll();

        // Find the maximum count of rows to display
        $maxRows = max(count($formations), count($experiences), count($skills), count($languages));

        for ($i = 0; $i < $maxRows; $i++) {
            echo "<tr>";
            // Formation
            echo "<td>";
            if (isset($formations[$i])) {
                echo $formations[$i]['FILIER'];
            }
            echo "</td>";

            // Experience
            echo "<td>";
            if (isset($experiences[$i])) {
                echo $experiences[$i]['societe'] . " : " . $experiences[$i]['period'];
            }
            echo "</td>";

            // Skills
            echo "<td>";
            if (isset($skills[$i])) {
                echo $skills[$i]['skills'] . " : " . $skills[$i]['level'];
            }
            echo "</td>";

            // Languages
            echo "<td>";
            if (isset($languages[$i])) {
                echo $languages[$i]['langs'] . " : " . $languages[$i]['level'];
            }
            echo "</td>";

            echo "</tr>";
        }
        ?>
    </tbody>
</table>

    </div>
    <footer class=footer>
        <section> 
            <div class="copy">
            &copy;copyright @2024
            </div>
        </section>
    </footer>
    
    
   
</body>
</html>
<?php } ?>
<?php } ?>