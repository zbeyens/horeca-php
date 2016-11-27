
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>
    <section class="s-membres">
        <article class="membres">
            <h2 class="titre"> listes des membres </h2>
            <div style="overflow: auto;height: 91%; width: 100%; ">
                <table class="big-table">
                	<thead>
                		<tr>
                			<td>#</td>
                			<td></td>
                			<td>Nom d'utilisateur</td>
                			<td>Email</td>
                			<td>Commentaires</td>
                			<td>Inscrit le</td>
                		</tr>
                	</thead>
                	<!--tfoot-->
                	<tbody>
                        <?php foreach ($membres as $membre) {
                            $counterComment = $comment->getNumberComment($membre['UserID'])["counter"]; 
                            $isAdmin = $user->existAdmin($membre['UserID']); ?>
                		<tr>
                            <td><?php if ($isAdmin) { echo "<i title='Admin' class='fa fa-key'></i>"; }?></td>
                            <td><a href="
                            <?php echo "fiche-membre.php?userID=" . $membre['UserID'];?>" 
                            title="Fiche d'informations"><i class="fa fa-file-text icon-large"></i></a></td>
                            <td><?php echo $membre['Nickname'];?></td>
                            <td><?php echo $membre['Mail'];?></td>
                            <td><?php echo $counterComment; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($membre['RegisterDate']));?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </article>
    </section>
</body>
</html>