<?php
session_start();
?>
<?php
include_once './connection.php';


$id=$_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_message = $_POST['id_messages'];
    $newContent = $_POST['message_content'];

    $req = $bdd->prepare('UPDATE `messages` SET `content` = :content WHERE `id_messages` = :id');
    $req->bindParam(':content', $newContent, PDO::PARAM_STR);
    $req->bindParam(':id', $id_message, PDO::PARAM_INT);
    $req->execute();
    header('location: user.php' );
}