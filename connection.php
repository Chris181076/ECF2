<?php 
 try{
      $bdd = new PDO('mysql:host=localhost; dbname=ecf2', 'root');
 }catch(PDOException $e){
    echo $e -> getmessage();
 }
?>