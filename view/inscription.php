
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>
    
    </div>
    <section class="s-inscription white">
        <article class="inscription">
            <h2 class="titre"> inscription </h2>
            <div class="pictag inscription">
            <form class="s-element" method="post" action="afterinscription.php" enctype="multipart/form-data">
                    <div class="first">
                        <img src="view/pic/dango.png" />

                        <label  class="custom-file-input file-blue">
                            <input type="file" name="pic">
                        </label>
                    </div>
                    <div class="second">

                        <p class="field">
                            <input type="name" name="nickname" placeholder="Nom d'utilisateur" maxlength="30" required>
                            <i class="fa fa-user icon-large"></i>

                        </p>
                        <p class="field">
                            <input type="password" name="password" placeholder="Mot de passe" required>
                            <i class="fa fa-lock icon-large"></i>
                        </p>     
                        <p class="field">
                            <input type="password" name="password-bis" placeholder="Confirmez votre mot de passe" required>
                            <i class="fa fa-lock icon-large"></i>
                        </p>   
                        <p class="field">
                            <input type="email" name="mail" placeholder="Adresse email" required>
                            <i class="fa fa-envelope icon-large"></i>
                        </p>      
                        <button type="submit" class="o-button" name="inscription">
                            <span>S'inscrire</span>
                        </button>
                        <div class="g-recaptcha" data-sitekey="6Lf84x4TAAAAAP2Af-67OnHP7AvSyxaTUGwWN_bk"></div>
                    </div>
                </form>
            </div>
        </article>
    </section>
</body>
</html>