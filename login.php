<?php
session_start();
?>
<?php
include_once './connection.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$erreur = '';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!empty($email) && !empty($password)){
        $stmt = $bdd->prepare("SELECT*FROM user WHERE email= ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO:: FETCH_ASSOC);
    }
    if($user && password_verify($password, $user['password'])){
        $_SESSION['user_id']= $user['id_user'];
        $_SESSION['user_name']= $user['name'];
        $_SESSION['user_first_name']=$user['first_name'];
        header('Location: user.php?id=' . $user['id_user']);
    }else{
        $erreur='try again';    
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel=stylesheet href="./assets/style.css">
</head>
<body>
    <form action="" method="post">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="">
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" value="">
    <label for="valider"></label>
    <input type="submit" id="valider" name="valider" value="Valider">
    </form>
    <div id="redirectionCreateAccount">
        <p>Si vous n'êtes pas encore incrit<a href="inscription.php">Cliquez ici</a></p>
    </div>
</body>
</html>