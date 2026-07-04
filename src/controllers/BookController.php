<?php

declare(strict_types=1);

namespace App\src\controllers;

class BookController extends CoreController {

    /** print view */
    public function showForm () : void {

        $this->view->render("BookForm", "BookForm");
    }

    /** print view all Book */
    public function showAllBook () : void {

        $bookmanager = new \App\src\models\BookManager();
        $books = $bookmanager->getAllBook();

        $UserManager = new \App\src\models\UserManager();
        $user = $UserManager->getUserById($_SESSION['id']);

        $this->view->render("AllBook", "AllBook", ['books' => $books] );
    }

    /** print view all Book */
    public function showDetailsBook (int $bookId) : void {

        $bookmanager = new \App\src\models\BookManager();
        $UserManager = new \App\src\models\UserManager();

        $book = $bookmanager->getBookId($bookId);
        $user = $UserManager->getUserById($_SESSION['id']);

        $this->view->render("BookDetails", "BookDetails", ['book' => $book, 'user' => $user] );
    }

    /** print view details book */
    public function showIdBook () : void {

        $this->view->render("BookForm", "BookForm");
    }

    /**
     * Manage form add book
     */
    public function formValidate () : void
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $ValidateInput = new \App\src\utils\ValidateInput;
            $FileUploader = new \App\src\utils\FileUploader;
            $BookManager = new \App\src\models\BookManager;

            $bookInput = [];
            $availabilityInt = 0;

            $autor = $_POST['autor'];
            $title = $_POST['title'];
            $comment = $_POST['comment'];
            $availability = $_POST['availability'];
            $userId = $_SESSION['id'];

            $filePicture = $_FILES['filesPictures'];

            if ($ValidateInput->isStringValid($title)) {

                if ($ValidateInput->isStringValid($autor)) {

                    if ($ValidateInput->isStringValid($comment)) {

                        if ($ValidateInput->isAvailabilityValid($availability)) {

                            if ($availability === "disponible") {
                                $availabilityInt = 1;
                            } else {
                                $availabilityInt = 0;
                            }

                            if ($FileUploader->pictureValidate($filePicture)) {

                                $fileName = $FileUploader->fileUpload($filePicture);

                                $bookInput = [
                                    'user_id' => $userId,
                                    'autor' => $autor,
                                    'title' => $title,
                                    'comment' => $comment,
                                    'availability' => $availabilityInt,
                                    'fileName' => $fileName,
                                ];

                                $BookManager->createBook($bookInput);
                                $this->pathModels("type=User&action=UserPage");

                            } else {
                                $_SESSION['error'] = "Aucune image importé";
                                $this->pathModels("type=Book&action=addBook");
                            }

                        } else {
                            $_SESSION['error'] = "La disponibilité n'est pas renseigner";
                            $this->pathModels("type=Book&action=addBook");
                        }

                    }else {
                        $_SESSION['error'] = "Le commentaire est vide";
                        $this->pathModels("type=Book&action=addBook");                       
                    }

                } else {
                    $_SESSION['error'] = "Le nom de l'auteur est vide";
                    $this->pathModels("type=Book&action=addBook");
                }

            } else {
                $_SESSION['error'] = "Le titre du livre est vide";
                $this->pathModels("type=Book&action=addBook");
            }

        } else {
            exit;
        }
    }


}