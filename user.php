<?php
session_start();
?>
<?php
include_once './connection.php';


$id=$_SESSION['user_id'];


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $message = $_POST['message'];
    $req=$bdd->prepare('INSERT INTO `messages`(`content`, `id_user`) VALUES (:content ,:id_user)');
    $req->bindParam(':content', $message, PDO::PARAM_STR);
    $req->bindParam(':id_user', $id, PDO::PARAM_INT);
    $req->execute();
}

echo "<h4>Bonjour, " . htmlspecialchars($_SESSION['user_first_name']) . " !</h4>";

$imagePath = './images/default-avatar.png';

$req=$bdd->prepare('SELECT `image` FROM `user` WHERE `id_user` = :id');
$req->bindParam(':id', $id, PDO::PARAM_INT);
$req->execute();
$user=$req->fetch(PDO::FETCH_ASSOC);

$req = $bdd->prepare('SELECT `id_messages`, `content` FROM `messages` WHERE id_user = :id');
$req->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
$req->execute();
$messages = $req->fetchAll(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User account | <?= htmlspecialchars($_SESSION['user_first_name']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<header>
        <div id="burger">
            <img src="./images/burger1.png" alt="menu burger">
            <div id="mainMenu">
            <ul>
                <li><a href="http://localhost/ecf2/index">Votre livre d’Or</a></li>
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
    <div id="imgUser" class="d-flex align-items-center justify-content-center">
        <?php 
        ?>
        <img src="<?= $user['image']?>" class="object-fit-contain border rounded me-3" style="width: 6rem; height: 6rem; object-fit: cover;" alt="imageUser">
        <div class="flex-column">
            <p class="mb-3 fs-3"><?= htmlspecialchars($_SESSION['user_first_name']) ?></p>
            <p class="fs-3"><?= htmlspecialchars($_SESSION['user_name']) ?></p>
        </div>
    </div>

    <form action="imageresized.php" method="POST" enctype="multipart/form-data" class="mt-4" id="colorBlue">
        <div class="mb-3 text-center">
            <label for="image" class="form-label fs-3 mb-4 mt-4 text-center">Sélectionner une nouvelle image de profil :</label>
            <input type="file" name="image" id="image" accept="image/*" class="form-control d-block mx-auto" style="max-width: 300px;"required>
        </div>
        <button type="submit" class="btn btn-light mt-3 d-block mx-auto">Télécharger l'image</button>
    </form>
    
    <div id="centerForm">
    <form action="" method="POST">
    <label for="message" class="d-flex justify-content-center mt-5 fs-3">L'expo t'en as pensé quoi? </label><br>
    <textarea id="message" name="message" rows="5" cols="30" maxlength="255" required></textarea><br>
    <button type="submit" class="d-block mx-auto mt-2 rounded btn btn-light mb-3">Envoyer</button>
    </form>
    </div>

    <div id="messagesEnvoyes">
    <h2>Messages Expo</h2>
    <?php foreach ($messages as $message) { ?>
    <div id=centerForm>
    <form action="updateMessages.php" method="POST" class="card w-50">
        <textarea name="message_content" rows="3" cols="25" style="border-radius: 0;"><?= htmlspecialchars($message['content']) ?></textarea>
        <input type="hidden" name="id_messages" value="<?= $message['id_messages'] ?>">
        <button type="submit" class="btn btn-light d-block">Modifier</button>
    </form>
    <form action="deleteMessages.php" method="POST">
            <input type="hidden" name="id_messages" value="<?= htmlspecialchars($message['id_messages']) ?>">
            <button type="submit" class="btn btn-light">Supprimer</button>
    </form>
    </div>
    <?php } ?>
    </div>
</main>
    <script src="./assets/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>