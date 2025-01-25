<?php
session_start();
?>
<?php 
include_once './connection.php';


if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    echo "<h4>Bonjour, " . $_SESSION['user_first_name'] . " !</h4>";
} else {
    echo "<h4>Aucun utilisateur trouvé.</h4>";
}

$req=$bdd->query("SELECT `content` FROM `messages`");
$listeMessages= $req->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECF2</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <header>
        <div id="burger">
            <img src="./images/burger_triangle_bleu.png" alt="menu burger">
            <div id="mainMenu">
            <ul>
                <li>Votre livre d’Or</li>
                <li>Votre livre d’Or Zoom</li>
                <li><a href="./redirection.php">Votre espace</a></li>
                <li><a href="./deconnection.php">Déconnection</a></li>
            </ul>
            </div>
        </div>
        <div id="logo">
            <img src="./images/logo2.png" alt="logo">
        </div>
    </header>
    <main>
        <div id="evenement">
            <img src="./images/taches.png" alt="taches de couleur">
            <p>100% tâches</p>
        </div>
        <div id="titre">
            <h1>Votre livre d’Or</h1>
        </div>
        <div id="carousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="./images/peinture1.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./images/peinture2.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./images/peinture3.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./images/peinture4.jpg" class="d-block" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div id="userAccount">
            <div id="connectionClick">
                <img src="./images/triangleUser.png" alt="triangle click connection">
                <p><a href="http://localhost/ecf2/login.php">Connection</a></p>
            </div>
            <div id="createAccountClick"> 
                <img src="images/triangleUser.png" alt="triangle click account">
                <p><a href="http://localhost/ecf2/inscription.php">Create Account</a></p>
            </div>
        </div>
        <h3>L'expo t'en as pensé quoi?</h3>
      
        
        <div class="card w-50 mx-auto">
            <?php foreach ($listeMessages as $index=>$message): 
                $cardClass = ($index % 2 == 0) ? 'card-white' : 'card-orange';
                ?>
                <div class="card <?= $cardClass ?>">
                    <div class="row g-0">
                    <div class="col-md-2">
                    <img src="./images/default-avatar.png" class="img-fluid rounded-start" alt="Avatar utilisateur">
                    </div>
                    <div class="col-md-10">
                    <div class="card-body">
                        <p class="card-text"><?= htmlspecialchars($message['content']) ?></p>
                    </div>
                    </div>
                </div>
        </div>
            <?php endforeach; ?>
        </div>
    </main>
    <script src="./assets/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>