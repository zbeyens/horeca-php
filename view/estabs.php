
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-etablissements">
        <article class="etablissements">
            <h2 class="titre">
            <?php if ($estab == "hotel") {
                echo "hotels";
            }
            else if ($estab == "restaurant") {
                echo "restaurants";}
            else if ($estab == "cafe") {
                echo "cafes";
            }?>
            </h2>
            <div style="overflow: auto;height: 92%; max-width: 100%;">
                <table>
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>
                            <?php if (isset($_SESSION['userID'])) { if ($isAdmin) { ?>
                                <a href="<?php if ($estab == "hotel") {
                                        echo 'new-hotel.php';
                                    }
                                    else if ($estab == "restaurant") {
                                        echo 'new-restaurant.php';
                                    }
                                    else if ($estab == "cafe") {
                                        echo 'new-cafe.php';
                                    }?>">
                                    <button type="submit" class="o-button add x-small" title="Ajouter un établissement">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                            <?php } }?>
                            </td>
                            <td>Nom de l'établissement</td>
                            <td>Ajouté par</td>
                            <td>Ajouté le</td>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        if ($estab == "hotel") { 
                            foreach ($hots as $hot) {?>
                            <tr>
                            <td><?php echo $hot['HotelID'];?></td>
                            <td><a href="
                                <?php echo "fiche-etabl.php?estabID=" . $hot['EstabID'];?>"  
                                title="Fiche d'informations"><i class="fa fa-file-text icon-large"></i></a></td>
                                <td><?php echo $hot['Name'];?></td>
                                <td><?php echo $hot['CreatorNickname'];?></td>
                                <td><?php echo date('d/m/Y',strtotime($hot['CreationDate']));?></td>
                            </tr>
                        <?php } }
                        else if ($estab == "restaurant") { 
                            foreach ($restos as $resto) {?>
                            <tr>
                            <td><?php echo $resto['RestID'];?></td>
                            <td><a href="
                                <?php echo "fiche-etabl.php?estabID=" . $resto['EstabID'];?>"  
                                title="Fiche d'informations"><i class="fa fa-file-text icon-large"></i></a></td>
                                <td><?php echo $resto['Name'];?></td>
                                <td><?php echo $resto['CreatorNickname'];?></td>
                                <td><?php echo date('d/m/Y',strtotime($resto['CreationDate']));?></td>
                            </tr>
                        <?php } }
                        else if ($estab == "cafe") {
                        foreach ($coffees as $coffee) {?>
                            <tr>
                            <td><?php echo $coffee['CafeID'];?></td>
                            <td><a href="
                                <?php echo "fiche-etabl.php?estabID=" . $coffee['EstabID'];?>"  
                                title="Fiche d'informations"><i class="fa fa-file-text icon-large"></i></a></td>
                                <td><?php echo $coffee['Name'];?></td>
                                <td><?php echo $coffee['CreatorNickname'];?></td>
                                <td><?php echo date('d/m/Y',strtotime($coffee['CreationDate']));?></td>
                            </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </article>
    </section>
</body>
</html>