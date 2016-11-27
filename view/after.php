
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-login">
        <article class="login afterinscription">
            <h2 class="titre">
                <?php if ($after == "connexion") {
                        echo "Bonjour " . $nickname . " !</h2><p>Connexion réussie."; 
                    }
                    else if ($after == "inscription") {
                        echo "Felicitations " . $nickname . " !</h2><p> Votre inscription a bien été enregistrée. <br /> 
                        Vous pouvez dès à présent vous <a href='connexion.php'>connecter</a> avec votre compte.";
                    }
                    else if ($after == "deconnexion") {
                        echo "Au revoir " . $nickname . " !";
                    }
                    ?>
            </h2>
        </article>
    </section>
</body>
</html>