<?php
session_start();
if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailS"]))
    header("location:../../WITHDBREC/index.php");
$idR = $_SESSION["ID_RE"];
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>Liste des candidats</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="cssb/bak1.css">
</head>

<body>
    <!-- zyada-->
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
        <h1 class="my-4">Liste des candidats</h1>
        <a href="../recruiter.php" class="return">
            <h3 class="my-4">return home</h3>
        </a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <!-- <th>id</th> -->
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email
                    </th>
                    <th>POST</th>
                    <th>date de postulation</th>
                    <th>phone</th>
                    <th>CV</th>
                    <th>score</th>
                    <th>FULL DATA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $i = 1;
                $sqlC = $conn->prepare("SELECT id_cl FROM logincan");
                $sqlC->execute();

                while ($idCa = $sqlC->fetch()) :
                    // echo $idCa['id_ca'];

                    $sql = $conn->prepare("SELECT * FROM postulation WHERE id_c=:idca AND id_r=:idR");
                    $sql->bindParam(':idca', $idCa['id_cl'], PDO::PARAM_INT);
                    $sql->bindParam(':idR', $idR, PDO::PARAM_INT);
                    $sql->execute();
                    while ($ligne = $sql->fetch()) :
                        //echo $ligne['id_ca'];


                ?>
                        <tr>

                            <td><?php echo $ligne['nom']; ?></td>
                            <td><?php echo $ligne['prenom']; ?></td>
                            <td><?php echo $ligne['mail']; ?></td>
                            <td><?php echo $ligne['POST']; ?></td>
                            <td><?php echo $ligne['date_postulation']; ?></td>
                            <td><?php echo $ligne['phone']; ?></td>

                            <td>
                                <?php

                                if ($sql && $sql->rowcount() > 0) {
                                    $fileURL = '../../FILES/UPLOADS/' . $ligne["cv"];
                                ?>
                                    <a href="<?php echo $fileURL; ?>" class="btn btn-primary" download="CAN_CV.pdf">Download PDF</a>
                                <?php } else { ?>
                                    <p>No PDF file found for this application...</p>
                                <?php } ?>
                            </td>
                            <td style=""><?php echo $ligne['score']; ?><i class="fa-solid fa-star" style="color: #f5ef42;"></i></td>
                            <td><a href="autreinformation.php?id=<?php echo $ligne['id_c'] ?>">FULL DATA</a></td>

                        </tr>
                    <?php endwhile; ?>
                <?php endwhile; ?>
            </tbody>

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