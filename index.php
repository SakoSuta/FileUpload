<?php
include 'FileImageUploader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploader = new FileImageUploader();
    $fileName = $uploader->uploadFile($_FILES['image']);
    if ($fileName) {
        echo "<p>Image téléchargée avec succès: <a href='uploads/$fileName'>$fileName</a></p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload d'Image</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <br><br>
        <label for="image">Choisir une image:</label>
        <br><br>
        <input type="file" name="image" id="image">
        <br><br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>

