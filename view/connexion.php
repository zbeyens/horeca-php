
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-login white">
        <article class="login">
            <h2 class="titre"> connexion </h2>
            <form class="s-element" method="post" action="afterconnexion.php" enctype="multipart/form-data">
                <p class="field">
                    <input type="name" name="nickname" placeholder="Nom d'utilisateur" maxlength="30" required>
                    <i class="fa fa-user icon-large"></i></
                    
                </p>
                <p class="field">
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <i class="fa fa-lock icon-large"></i>
                </p>               
                <button type="submit" class="o-button" name="connexion">
                    <span>Se connecter</span>
                </button>
            </form>
        </article>
    </section>
</body>
</html>

        <!--<i class="icon-arrow-right icon-large"></i> 

        Ajouter des commentaires sur les établissements <br />

        Ajouter et créer des labels sur des établissements<br />

        Consulter les fiches des établissements et des utilisateurs<br />

        Rechercher des établissements<br />

        Ajouter et modifier des établissements<br />

        Supprimer des établissements<br />

        Visualiser le résultat des requêtes à l'endroit où cela vous semble pertinent<br />-->