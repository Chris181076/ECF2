<?php
session_start();
?>
<?php
include_once './connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_message = $_POST['id_messages'];

    $delete = $bdd->prepare('DELETE FROM `messages` WHERE `id_messages` = :id_messages');
    $delete->bindParam(':id_messages', $id_message, PDO::PARAM_INT);
    $delete->execute();
}

header('location: user.php' );