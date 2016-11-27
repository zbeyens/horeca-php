
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-etablissements">
        <article class="etablissements">
            <h2 class="titre">restaurants</h2>
            <div style="overflow: auto;height: 92%; max-width: 100%;">
                <table>
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>
                                <a href="new-restaurant.php">
                                    <button type="submit" class="o-button add x-small" title="Ajouter un établissement">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                            </td>
                            <td>Nom de l'établissement</td>
                            <td>Ajouté par</td>
                            <td>Ajouté le</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="fiche-etabl.php" title="Fiche d'informations"><i class="fa fa-file-text icon-large"></i></a></td>
                            <td>Restaurant 1</td>
                            <td>Ziyad</td>
                            <td>01/04/2016</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="fiche-etabl.php" title="Fiche d'informations"><i class="fa fa-file-text icon-large"></i></a></td>
                            <td>Restaurant 2</td>
                            <td>Ziyad</td>
                            <td>01/04/2016</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="fiche-etabl.php" title="Fiche d'informations"><i class="fa fa-file-text icon-large"></i></a></td>
                            <td>Restaurant 3</td>
                            <td>Ziyad</td>
                            <td>01/04/2016</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </section>
</body>
</html>