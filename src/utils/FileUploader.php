<?php 

declare(strict_types=1);

namespace App\src\utils;

class FileUploader {

    /**
     * Validated format picture upload
     * @param array $picture
     * @return bool
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
     * cut and path on the finaly folder and add random name.
     * @param array $filesPictures array
     * @return string relatif path
     */
    public function fileUpload(array $filesPictures): string
    {
        $fileInfo = pathinfo($filesPictures['name']);
        $extension = strtolower($fileInfo['extension'] ?? '');

        $uniqueName = md5(uniqid((string) rand(), true));

        $uploadDir = __DIR__ . '/../../public/upload/';

        $fileName = $uploadDir . $uniqueName . '.' . $extension;

        $result = move_uploaded_file(
            $filesPictures['tmp_name'],
            $fileName
        );

        if ($result) {
            return 'upload/' . $uniqueName . '.' . $extension;
        }

        return "";
    }

}