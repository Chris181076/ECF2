<?php
ob_start();
session_start();

include_once './connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
   
    $imageTmpName = $_FILES['image']['tmp_name']; 
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];

   
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $fileType = mime_content_type($imageTmpName);

   
    if (!in_array($fileType, $allowedTypes)) {
        echo "Format d'image non supporté.";
        exit;
    }

    
    switch ($fileType) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($imageTmpName);
            break;
        case 'image/png':
            $image = imagecreatefrompng($imageTmpName);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($imageTmpName);
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($imageTmpName);
            break;
        default:
            echo "Format d'image non supporté.";
            exit;
    }

    
    $originalWidth = imagesx($image);
    $originalHeight = imagesy($image);

   
    $newWidth = 150;  
    $newHeight = 150;

  
    $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

    
    imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

   

    $newImageName = uniqid('profile_', true) . '.' . pathinfo($imageName, PATHINFO_EXTENSION);
    $uploadDir = 'uploads/';
    $resizedImagePath = $uploadDir . $newImageName;
   
    switch ($fileType) {
        case 'image/jpeg':
            imagejpeg($resizedImage, $resizedImagePath);
            break;
        case 'image/png':
            imagepng($resizedImage, $resizedImagePath);
            break;
        case 'image/gif':
            imagegif($resizedImage, $resizedImagePath);
            break;
        case 'image/webp':
            imagewebp($resizedImage, $resizedImagePath);
            break;
    }

    $id = $_SESSION['user_id'];
    $req= $bdd->prepare('UPDATE `user` SET `image`= :imagePath WHERE `id_user` = :id');
    $req->bindParam(':imagePath', $resizedImagePath, PDO::PARAM_STR);
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

    $_SESSION['profile_image'] = $resizedImagePath;
    
    imagedestroy($image);
    imagedestroy($resizedImage);

    
     header('Location: user.php');
     ob_end_flush();
     exit;
}
?>

