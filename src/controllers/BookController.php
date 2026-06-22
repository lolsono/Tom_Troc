<?php

declare(strict_types=1);

namespace App\src\controllers;

class BookController extends CoreController {

    /**affichage des vues */
    public function showForm () : void {

        $this->view->render("BookForm", "BookForm");
    }

    /**
     * Manage form add book
     */
    public function formValidate () : void
    {
        //premier condition valider que l'utilisateur et bien connecter

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $FormManager = new \App\src\models\FormManager;

            $autor = $_POST['autor'];
            $title = $_POST['title'];
            $comment = $_POST['comment'];
            $aviability = $_POST['aviability'];


            if ($FormManager->isPseudoValid($pseudo)) {

                if ($FormManager->isEmailValid($email)) {

                    if ($FormManager->isPasswordValid($password)) {

                        //une fois que c'est crée demande l'ajout en db

                        $_SESSION['error'] = "";
                        $FormManager->createUser($email, $password, $pseudo);
                        header("Location: /Tom_Troc/index.php?type=User&action=SingIn");

                    }else {
                        $_SESSION['error'] = "Mot de passe incorrect";
                        header("Location: /Tom_Troc/index.php?type=User&action=SingUp");                       
                    }

                } else {
                    $_SESSION['error'] = "Adresse email invalide";
                    header("Location: /Tom_Troc/index.php?type=User&action=SingUp");
                }

            } else {
                $_SESSION['error'] = "Pseudo invalide";
                header("Location: /Tom_Troc/index.php?type=User&action=SingUp");
            }

        } else {
            exit;
        }
    }


}