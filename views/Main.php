<?php
$type = $_GET['type'] ?? '';
$action = $_GET['action'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- style sheet -->
    <link rel="stylesheet" href="public/styles/main.css">
    <link rel="stylesheet" href="public/styles/home.css">
    <link rel="stylesheet" href="public/styles/book.css">
    <link rel="stylesheet" href="public/styles/user.css">
    <link rel="stylesheet" href="public/styles/message.css">
    <link rel="stylesheet" href="public/styles/bookFroms.css">
    <!-- Police Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <!-- Checkbox -->
            <input type="checkbox" id="menu-toggle" class="menu-toggle">

            <div class="logo">
                <img src="public/img/logo.svg" alt="logo du site TomTroc"/>
            </div>

            <label for="menu-toggle" class="hamburger">
                <span class="sr-only">Ouvrir ou fermer le menu</span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </label>
            
            <div class="menu-container">
                <ul class="main-menu">
                    <li><a href="index.php" class="<?= ($type === '' && $action === '') ? 'active' : '' ?>">Accueil</a></li>
                    <li><a href="index.php?type=Book&action=allBook" class="<?= ($type === 'Book' && $action === 'allBook') ? 'active' : '' ?>">Nos livres à l’échange</a></li>
                </ul>

                <ul class="dynamic-menu">
                    <?php if (isset($_SESSION['id']) && $_SESSION['id'] >= 0 ) : ?>
                        <li>
                            <img src="public/img/icon_messagerie.svg" alt="Messagerie">
                            <a href="index.php?type=Message&action=MessageHome" class="<?= ($type === 'Message' && $action === 'MessageHome' || $action === 'Message') ? 'active' : '' ?>">
                                Messagerie
                            </a>
                        </li>
                        <li>
                            <img src="public/img/icon_mon_compte.svg" alt="Mon compte">
                            <a href="index.php?type=User&action=UserPage" class="<?= ($type === 'User' && $action === 'UserPage') ? 'active' : '' ?>">
                                Mon compte
                            </a>
                        </li>
                        <li><a href="index.php?type=Book&action=addBook" class="<?= ($type === 'Book' && $action === 'addBook') ? 'active' : '' ?>">Ajouter un livre</a></li>
                        <li><a href="index.php?type=User&action=LogOut">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="index.php?type=User&action=SingIn">Connexion</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <main>    
        <?= $content ?>
    </main>
    
    <footer>
        <nav class="footer">
            <ul>
                <li><a href="index.php">Politique de confidentialité</a></li>
                <li><a href="index.php">Mentions légales</a></li>
                <li><p>Tom Troc©</p></li>
                <li><img src="public/img/logo_no_write.svg" alt="logo du site TomTroc"/></li>
            </ul>
        </nav>
    </footer>
</body>
</html>

<script src="public/script/searchBook.js"></script>
<script src="public/script/previewPicture.js"></script>