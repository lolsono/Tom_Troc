<?php 

declare(strict_types=1);

namespace App\src\utils;

use LDAP\Result;

class FileUploader {

    /**vérification du fichier uploader par l'utilisateur */

    /**
     * Validated format picture upload
     * @param file $picture
     */
    public function pictureValidate(array $filesPictures): bool
    {
        $maxsize = 1000000; // 100 Ko
        if ($filesPictures['size'] > $maxsize) {
            $_SESSION['error'] = "Fichier trop volumineux (max 100 Ko)";
            return false;
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $extension = strtolower(pathinfo($filesPictures['name'], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions)) {
            $_SESSION['error'] = "Format non autorisé (jpg, jpeg, png, webp)";
            return false;
        }

        return true;
    }

    /**
     * Déplace le fichier uploadé et retourne son chemin relatif
     * @param array $filesPictures Tableau $_FILES['filesPictures']
     * @return string Chemin relatif du fichier (ex: "upload/abc123.jpg")
     */
    public function fileUpload(array $filesPictures): string
    {
        // 1. Récupère l'extension (en minuscules)
        $fileInfo = pathinfo($filesPictures['name']);
        $extension = strtolower($fileInfo['extension'] ?? '');

        // 2. Génère un nom unique
        $uniqueName = md5(uniqid((string) rand(), true));

        $uploadDir = __DIR__ . '/../../public/upload/';

        $fileName = $uploadDir . $uniqueName . '.' . $extension;

        // 4. Déplace le fichier
        $result = move_uploaded_file(
            $filesPictures['tmp_name'],
            $fileName
        );

        if ($result) {
            return 'upload/' . $uniqueName . '.' . $extension; // ✅ Chemin relatif (ex: "upload/abc123.jpg")
        }

        return "";
    }


}