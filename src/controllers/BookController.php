<?php

declare(strict_types=1);

namespace App\src\controllers;

class BookController extends CoreController {

    /** print view */
    public function showForm () : void {

        $this->view->render("BookForm", "BookForm");
    }

    /** print view upate Book */
    public function showFormUpdate (int $bookId) : void {

        $bookmanager = new \App\src\models\BookManager();
        $book = $bookmanager->getBookId($bookId);

        $this->view->render("BookFormUpdate", "BookFormUpdate", ['book' => $book]);
    }

    /** print view all Book */
    public function showAllBook () : void {

        $bookmanager = new \App\src\models\BookManager();
        $books = $bookmanager->getAllBook();

        $this->view->render("AllBook", "AllBook", ['books' => $books] );
    }

    /** print view all Book */
    public function showDetailsBook (int $bookId) : void {

        $bookmanager = new \App\src\models\BookManager();
        $book = $bookmanager->getBookId($bookId);

        $this->view->render("BookDetails", "BookDetails", ['book' => $book] );
    }

    /** print view details book */
    public function showIdBook () : void {

        $this->view->render("BookForm", "BookForm");
    }

    /** delete book */
    public function deleteBook (int $bookId) : void
    {
        $bookManager = new \App\src\models\BookManager();

        $book = $bookManager->getBookId($bookId);
        $bookPath = dirname(__DIR__, 2) . '/public/' . $book->getPicture();

        if (file_exists($bookPath)) {
            unlink($bookPath);
        }

        $bookManager->deleteBookById($bookId);
        $this->pathModels("type=User&action=UserPage");
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
            $idBook = $_POST['idBook'];
            $oldPicture = $_POST['oldPicture'];

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

                            if (isset($idBook)) {

                                // img no midified
                                if (empty($_FILES['filesPictures']['tmp_name'])) {

                                    $bookInput = [
                                        'idBook' => $idBook,
                                        'autor' => $autor,
                                        'title' => $title,
                                        'comment' => $comment,
                                        'availability' => $availabilityInt,
                                        'fileName' => $oldPicture,
                                    ];

                                } else {

                                    // New picture
                                    if ($FileUploader->pictureValidate($filePicture)) {

                                        $fileName = $FileUploader->fileUpload($filePicture);

                                        $bookInput = [
                                            'idBook' => $idBook,
                                            'autor' => $autor,
                                            'title' => $title,
                                            'comment' => $comment,
                                            'availability' => $availabilityInt,
                                            'fileName' => $fileName,
                                        ];

                                    } else {

                                        $_SESSION['error'] = "L'image est invalide";
                                        $this->pathModels("type=User&action=UserPage");
                                        return;

                                    }
                                }

                                $BookManager->updateBook($bookInput);
                                $this->pathModels("type=User&action=UserPage");

                            } else {

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