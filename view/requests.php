
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-etablissements">
        <article class="etablissements" style="height: 90%;">
            <h2 class="titre"> resultat </h2>
            <div style="overflow: auto;height: 91%; width: 100%;">
                <table class="big-table">
                    <thead>
                        <tr>
                            <?php if ($search == "etablissements") { ?>
                            <td><i class="fa fa-star icon-large"></i></td>
                            <td> </td>
                            <td>Nom de l'établissement</td>
                            <td>Ajouté par</td>
                            <td>Ajouté le</td>
                            <?php }

                            else if ($search == "membres") {?>
                            <td>#</td>
                            <td></td>
                            <td>Nom d'utilisateur</td>
                            <td>Email</td>
                            <td>Commentaires</td>
                            <td>Inscrit le</td>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($search == "etablissements" && !empty($estabs)) {
                            foreach ($estabs as $est) {
                                $meanComment = $comment->getMeanComment($est['EstabID'])?>
                            <tr>
                            <td><?php echo number_format($meanComment['mean'], 1, '.', '');?></td>
                            <td><a href="
                                <?php echo "fiche-etabl.php?estabID=" . $est['EstabID'];?>"  
                                title="Fiche d'informations"><i class="fa fa-file-text icon-large"></i></a></td>
                                <td><?php echo $est['Name'];?></td>
                                <td><?php echo $est['CreatorNickname'];?></td>
                                <td><?php echo date('d/m/Y',strtotime($est['CreationDate']));?></td>
                            </tr>
                        <?php }}

                        else if ($search == "membres" && !empty($users)) {
                            foreach ($users as $membre) {
                            $counterComment = $comment->getNumberComment($membre['UserID'])["counter"]; 
                            $isAdmin = $admin->existAdmin($membre['UserID']); ?>
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
                        <?php }}?>
                    </tbody>
                </table> 
                        <?php if ($search == "commentaires" && !empty($comments)) {
                            foreach ($comments as $fcomment) { 
                                $estabComment = $comment->getEstabComment($fcomment['CommentID']);
                                $fcommentUser = $comment->getCreator($fcomment['CommentID']);
                                $fthumbs = $thumbs->getThumbs($fcomment['CommentID']); 
                                if (isset($_SESSION['userID'])) {
                                    $updown = $thumbs->getUpDown($_SESSION['userID'], $fcomment['CommentID']);
                                    $myupdown = $updown['UpDown'];
                                }
                                ?>
                            <li>
                                <div class="comment-main-level" style="width: 95%; margin: 1%;">
                                    <!-- Conteneur d'un commentaire -->
                                    <div class="comment-box" style="width: 100%;">
                                        <div class="comment-head">
                                            <h6 class="comment-name 
                                            <?php if ($fcommentUser['UserID'] == $_SESSION['userID']) {
                                                echo "by-author";}?>">
                                                <a href="fiche-membre.php?userID=<?php echo $fcommentUser['UserID'];?>">
                                            <?php echo $fcommentUser['Nickname'];?></a></h6>
                                            <span class="c-date"><?php echo //H:i
                                            date('d-m-Y',strtotime($fcomment['ComDate']));?></span>
                                            <a href="fiche-etabl.php?estabID=<?php echo $estabComment['EstabID']; ?>">
                                            <span><?php echo $estabComment['Name'];?></span></a>
                                            <div class="thumbs">
                                                <span><?php echo $fcomment['ComScore'];?></span>
                                                <i class="fa fa-star"></i>
                                                <?php if (isset($_SESSION['userID'])) { ?>
                                                <a href="afterthumbs.php?estabID=<?php 
                                                echo $fcomment['EstabID']; ?>&commentID=<?php 
                                                echo $fcomment['CommentID']; ?>&name=up">
                                                <i class="fa fa-thumbs-up" 
                                                <?php if ($thumbs->existThumbs($_SESSION['userID'], $fcomment['CommentID'])) { if ($myupdown == '1') {
                                                    echo "style='color: #0EAF02'"; } }?> ></i></a> 

                                                <span class="t-point bold" style="color:
                                                <?php if ($fthumbs['somme'] >= 0) {
                                                    echo "#00D600"; }
                                                    else { echo "red"; } ?>;">
                                                    <?php if ( isset($fthumbs['somme']) ) {
                                                        echo $fthumbs['somme']."   "; }
                                                        else { echo '0'; }?>
                                                </span>

                                                <a href="afterthumbs.php?estabID=<?php 
                                                echo $fcomment['EstabID']; ?>&commentID=<?php 
                                                echo $fcomment['CommentID']; ?>&name=down">
                                                <i class="fa fa-thumbs-down"
                                                <?php if ($thumbs->existThumbs($_SESSION['userID'], $fcomment['CommentID'])) { if ($myupdown == '-1') {
                                                    echo "style='color: red'"; } }?> ></i></a> 
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            <?php echo $fcomment['ComText'];?>
                                        </div>
                                    </div>
                                </div>
                            </li> 
                        <?php }}
                        if ($search == "tags" && !empty($tags)) {
                            foreach ($tags as $ftag) {
                                $creatorTag = $tag->getCreator($ftag['Name'], $ftag['EstabID']);
                                $poidsTag = $tag->getPoids($ftag['Name'], $ftag['EstabID']);?>
                                <p class="poids">
                                    <p class="poids" style="margin: 1%;" 
                                    title="Par <?php foreach ($creatorTag as $ctag) {
                                        echo " - ".$ctag['Nickname']; }?>"> <?php echo number_format($ftag['mean'], 2, '.', ''). " : ";?>
                                        <i class="fa fa-hashtag"></i><a href="fiche-etabl.php?estabID=<?php echo $ftag['EstabID'];?>">
                                        <?php echo $ftag['Name'] . "<span>" ?></span></a>
                                    </p>
                                </p>
                        <?php }}?> 
            </div>
        </article>
    </section>
</body>
</html>