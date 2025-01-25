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

echo "<h1>Bonjour, " . htmlspecialchars($_SESSION['user_first_name']) . " !</h1>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User account | <?= htmlspecialchars($_SESSION['user_first_name']) ?></title>
    <link rel=stylesheet href="./assets/style.css">
</head>
<body>
    <P><?= htmlspecialchars($_SESSION['user_first_name']) ?></p>
    <P><?= htmlspecialchars($_SESSION['user_name']) ?></p>

    <form action="" method="POST">
    <label for="message">Votre message :</label><br>
    <textarea id="message" name="message" rows="5" cols="30" maxlength="255" required></textarea><br>
    <button type="submit">Envoyer</button>
    </form>


    <p><a href="http://localhost/ecf2/index">Accueil</a></p>
</body>
</html>