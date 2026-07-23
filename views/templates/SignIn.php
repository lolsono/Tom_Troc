<div class="FormUser">
    <form
        action="index.php?type=User&action=SingInValidate"
        method="POST"
        aria-labelledby="form-title"
        novalidate
    >
        <fieldset>
            <legend id="form-title">Connexion</legend>

            <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
                <p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <!-- email -->
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                >
            </div>

            <!-- password -->
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    minlength="8"
                    title="Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial."
                >
            </div>

            <!-- submit button -->
            <button type="submit" class="buttonWhiteGreen">
                Se connecter
            </button>

            <!-- redirect form Sign Up -->
            <a class="link-page" href="index.php?type=User&action=SingUp">Pas de compte ? <span class="underline">Inscrivez-vous</span></a>
        </fieldset>
    </form>
    
    <img src="public/img/img_log_user_book.svg" alt="image de livre"/>

</div>



