<?php
session_start();
?>
<?php

if(!isset($_SESSION['user_id'])){
    header('location: login.php');
}else{
    header('location: user.php');
}