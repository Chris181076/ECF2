<?php
include_once './connection.php';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['name'], $_POST['email'], $_POST['password'])){
    $name = $_POST['name'] ?? '';
    $first_name = $_POST['first_name'] ?? '';
    $email = $_POST['email'] ??'';
    $password = $_POST['password'] ??'';

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO user (name, first_name, email, password) VALUES (:name, :first_name, :email, :password)";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->execute();
    header('Location: login.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form action="" method="POST" >
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="first_name">Prénom :</label>
        <input type="text" id="first_name" name="first_name" required>
        <br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
