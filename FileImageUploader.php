<?php
class FileImageUploader {
    private $allowedExtensions = ['jpg', 'png'];
    private $maxFileSize = 2097152; // 2 MB

    public function uploadFile($file) {
        if ($this->validateFile($file)) {
            $uniqueName = $this->generateUniqueFileName($file['name']);
            move_uploaded_file($file['tmp_name'], 'uploads/' . $uniqueName);
            return $uniqueName;
        }
        return false;
    }

    private function validateFile($file) {
        if ($file['size'] > $this->maxFileSize) {
            echo "Fichier trop grand. Taille maximale est de 2MB.";
            return false;
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!in_array($extension, $this->allowedExtensions)) {
            echo "Type de fichier non autorisé. Seuls jpg et png sont acceptés.";
            return false;
        }

        return true;
    }

    private function generateUniqueFileName($fileName) {
        $name = pathinfo($fileName, PATHINFO_FILENAME);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $i = 1;
        while (file_exists('uploads/' . $fileName)) {
            $fileName = $name . '_' . $i . '.' . $extension;
            $i++;
        }
        return $fileName;
    }
}
?>

<!-- empecher l'envoie du fichier exate (si oui cree le fichier _1) -->