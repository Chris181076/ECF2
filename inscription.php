<?php
session_start();
?>
<?php
include_once './connection.php';
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
    <form action="" method="POST">
    <div id="containerRow">
    <div class="row g-3 align-items-center justify-content-center">
        <div class="col-auto">
        <label for="inputName" class="col-form-label">Nom</label>
        </div>
        <div class="col-auto">
        <input type="text" id="inputName" name="name"class="form-control">
        </div>
        </div>
        </div>

        <div class="row g-3 mt-3 align-items-center justify-content-center">
        <div class="col-auto">
        <label for="inputFirstName" class="col-form-label">Prénom</label>
        </div>
        <div class="col-auto">
        <input type="text" id="inputFirstName" name="first_name"class="form-control">
        </div>
        </div>
        </div>

        <div class="row g-3 mt-3 align-items-center justify-content-center">
        <div class="col-auto">
        <label for="inputEmail" class="col-form-label">Email</label>
        </div>
        <div class="col-auto">
        <input type="email" id="inputEmail" name="email"class="form-control">
        </div>
        </div>
        </div>

        <div class="row g-3 mt-3 align-items-center justify-content-center">
        <div class="col-auto">
        <label for="inputPassword6" class="col-form-label">Password</label>
        </div>
        <div class="col-auto">
        <input type="password" id="inputPassword6" name="password" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        </div>
        </div>

        <div class="col-12 mt-5">
        <div class="d-flex justify-content-center">
        <button class="btn btn-light" type="submit">Validation</button>
        </div>
        </div>
    </div>
    </form>
</main>
    <script src="./assets/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
