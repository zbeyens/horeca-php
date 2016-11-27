
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-etablissements">
        <article class="fiche-membre">
            <div class="a-header"> 
                <h2 class="titre">Profil</h2>
                <div class="fiche-container">
                    <div class="pictaginfos visit"> 
                        <div class="pictag">
                            <img src="<?php echo $ficheMembre['Pic']; ?>" />
                            <div class="tags visit">
                                <?php foreach ($ficheTag as $ftag) {?>
                                    <p class="poids">
                                        <a href="fiche-etabl.php?estabID=<?php echo $ftag['eEstabID'];?>">
                                        <i class="fa fa-hashtag"></i>
                                        <?php echo $ftag['tName'];?> <span>: <?php echo $ftag['eName'];?></span></a>
                                    </p>
                                <?php }?>
                            </div>
                        </div>
                        <div class="infos visit">
                            <ul style="font-size: 1.125em;">
                            <?php if ($isAdmin) {?>
                                <li><span class="admin">Admin</span></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['userID'])) { if ($meAdmin) {?>
                            <form method="post" action="
                                <?php echo "addadmin-delete.php?userID=".$ficheMembre['UserID']; ?>" enctype="multipart/form-data">
                            <button type="submit" name="addadmin" class="o-button edit small" title="Donner les droits d'Admin" >
                                <i class="fa fa-key"></i><br />
                            </button>
                            <button type="submit" name="deleteuser" class="o-button delete small" title="Bannir l'utilisateur">
                                <i class="fa fa-remove"></i>
                            </button>
                            </form>
                            <?php } }?>
                                <li><span>Nom d'utilisateur : </span><?php echo $ficheMembre['Nickname'];?></li>
                                <li><span>Mail : </span><?php echo $ficheMembre['Mail'];?></li>
                                <li><span>Inscrit le : </span><?php echo date('d/m/Y',strtotime($ficheMembre['RegisterDate']));?></li>
                                <li><span>Commentaires : </span><?php echo $counterComment['counter'];?></li>
                                <li><span>Tags : </span><?php echo $counterTag['counter'];?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="comments">
                        <ul class="comments-list">
                            
                            <?php foreach ($ficheComment as $fcomment) {
                                $estabComment = $comment->getEstabComment($fcomment['CommentID']);?>
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"><img src="<?php echo $ficheMembre['Pic']; ?>" alt=""></div> 
                                    <!-- Conteneur d'un commentaire -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name"><a href="fiche-membre.php?userID=<?php echo $ficheMembre['UserID'];?>"><?php echo $ficheMembre['Nickname'];?></a></h6>
                                            <span class="c-date"><?php echo date('d-m-Y',strtotime($fcomment['ComDate']))?></span>
                                            <a href="fiche-etabl.php?estabID=<?php echo $estabComment['EstabID']; ?>">
                                            <span><?php echo $estabComment['Name'];?></span></a>
                                            <div class="thumbs">
                                                <span><?php echo $fcomment['ComScore'];?></span>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            <?php echo $fcomment['ComText'];?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </article>
        </section>
    </body>
    </html>