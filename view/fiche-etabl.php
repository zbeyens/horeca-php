
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-etablissements">
        <article class="fiche-etabl">
            <div class="a-header"> 
                <h2 class="titre"><?php echo toASCII($ficheEstab['Name']); ?></h6></h2>

                <h4 class="moy" title="Score moyen">
                <?php echo number_format($meanComment['mean'], 1, '.', ''); ?>
                <i class="fa fa-star"></i></h4>
                <h6 class="reference italic">ajouté par 
                <?php
                    echo $ficheEstab['CreatorNickname'];?> le <?php echo date('d/m/Y',strtotime($ficheEstab['CreationDate'])); ?></h6>
                <div class="fiche-container">
                    <div class="pictaginfos visit"> 
                        <div class="pictag">
                            <img src="<?php echo $ficheEstab['Pic']; ?>" />
                            <div class="tags"> 
                            <?php if (isset($_SESSION['nickname'])) {?>
                                <form method="post" action="aftertag.php?estabID=<?php echo $_GET['estabID']; ?>" enctype="multipart/form-data">
                                    <button type="submit" class="button blue small" title="Tagger">
                                        <i class="fa fa-tags"></i>
                                    </button>
                                    <p class="dropdown">
                                        <select class="dropdown-select italic small" name="droptag"> 
                                            <option>Tags...</option>
                                            <?php foreach ($ficheTag as $ftag) {?>
                                            <option><?php echo $ftag['Name'];}?></option>
                                        </select>
                                    </p>
                                    <input type="text" placeholder="..." name="inputtag">
                                    <i class="fa fa-hashtag input"></i>
                                </form> <?php }?>

                                <div class="tags-content white"> <!-- poids p-2 p-1-->
                                    <?php foreach ($ficheTag as $ftag) {
                                    $creatorTag = $tag->getCreator($ftag['Name'], $_GET['estabID']);
                                    $poidsTag = $tag->getPoids($ftag['Name'], $_GET['estabID']);?>
                                    <p class="poids" style="font-size:calc(0.75em + 0.1*<?php echo $poidsTag['poids'];?>em)" 
                                    title="Par <?php foreach ($creatorTag as $ctag) {
                                        echo " - ".$ctag['Nickname']; }?>">
                                        <i class="fa fa-hashtag"></i>
                                        <?php echo $ftag['Name'] . "<span> (".$poidsTag['poids'].")" ?></span>
                                    </p>
                                    <?php }?>
                                </div><style>#map_canvas { width:500px; height: 400px; }</style>
                            </div>
                        </div>
                        <div class="infos visit"> 
                            <?php if ($isAdmin) {?>
                            <form method="post" action="
                                <?php if ($estab == "hotel") { 
                                    echo "edit_afterdelete-hotel.php?estabID="; }
                                else if ($estab == "cafe") {
                                    echo "edit_afterdelete-cafe.php?estabID="; }
                                else if ($estab == "restaurant") {
                                    echo "edit_afterdelete-restaurant.php?estabID="; }
                                    echo $_GET['estabID']; ?>" enctype="multipart/form-data">
                            <button type="submit" name="edit" class="o-button edit small" title="Editer">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="submit" name="delete" class="o-button delete small" title="Supprimer">
                                <i class="fa fa-remove"></i>
                            </button>
                            </form>
                            <?php }?>
                            <ul>
                                <li><span>Rue : </span><?php echo $ficheEstab['AdStreet'];?></li>
                                <li><span>N° : </span><?php echo $ficheEstab['AdNum'];?></li>
                                <li><span>Code postal : </span><?php echo $ficheEstab['AdZip'];?></li>
                                <li><span>Ville : </span><?php echo $ficheEstab['AdCity'];?></li>
                                <li><span><i class="fa fa-phone"></i> : </span><?php echo $ficheEstab['Tel'];?></li>
                                <li><span><i class="fa fa-external-link"></i> : </span><a href="<?php echo $ficheEstab['SiteLink']?>" class="white"><?php echo $ficheEstab['SiteLink'];?></a></li>
                            <?php if ($estab == "cafe") {?>
                                <li><span>Fumeur : </span><?php 
                                    if ($ficheEstab['Smoking'] == 1) {?>
                                    <i class="fa fa-check-circle"></i> <?php }
                                    else {?>
                                    <i class="fa fa-ban"></i> <?php }?>
                                </li>
                                <li><span>Snack : </span><?php 
                                    if ($ficheEstab['Snack'] == 1) {?>
                                    <i class="fa fa-check-circle"></i> <?php }
                                    else {?>
                                    <i class="fa fa-ban"></i> <?php }?>
                                </li>

                            <?php } else if ($estab == "restaurant") {?>
                                <li class="resto"><span><i class="fa fa-money"></i> Plat € ~ </span><?php echo $ficheEstab['PriceRange'];?></li>
                                <li class="resto"><span>Places banquet : </span><?php echo $ficheEstab['BanquetCapacity'];?></li>
                                <li><span>A emporter : </span><?php 
                                    if ($ficheEstab['TakeAway'] == 1) {?>
                                    <i class="fa fa-check-circle"></i> <?php }
                                    else {?>
                                    <i class="fa fa-ban"></i> <?php }?>
                                </li>
                                <li><span>Livraison : </span><?php 
                                    if ($ficheEstab['Delivery'] == 1) {?>
                                    <i class="fa fa-check-circle"></i> <?php }
                                    else {?>
                                    <i class="fa fa-ban"></i> <?php }?>
                                </li>
                                <li class="resto"><span>Horaire : </span>
                                    <table class="t-horaire">
                                        <thead>
                                            <tr>
                                                <td></td>
                                                <td>Lun</td>
                                                <td>Mar</td>
                                                <td>Mer</td>
                                                <td>Jeu</td>
                                                <td>Ven</td>
                                                <td>Sam</td>
                                                <td>Dim</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>am</td>
                                                <?php foreach ($days as $day) {
                                                if ($day != 0) {
                                                    if ($day['Hour'] == 'pm') {?>
                                                    <td class="horaire green"><i class="fa fa-check"></td>
                                                    <?php } else {?>
                                                    <td class="horaire red"><i class="fa fa-ban"></i> </td>
                                                <?php } } else {?>
                                                <td class="horaire green"><i class="fa fa-check"></td>
                                                <?php } }?>
                                            </tr>
                                            <tr>
                                                <td>pm</td>
                                                <?php foreach ($days as $day) {
                                                if ($day != 0) {
                                                    if ($day['Hour'] == 'am') {?>
                                                    <td class="horaire green"><i class="fa fa-check"></td>
                                                    <?php } else {?>
                                                    <td class="horaire red"><i class="fa fa-ban"></i> </td>
                                                <?php } } else {?>
                                                <td class="horaire green"><i class="fa fa-check"></td>
                                                <?php } }?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>

                            <?php } else if ($estab == "hotel") {?>
                                <li><span><i class="fa fa-star"></i> : </span><?php echo $ficheEstab['Stars'];?></li>
                                <li><span>Chambres : </span><?php echo $ficheEstab['Bedrooms'];?></li>
                                <li><span>Prix chambre double : </span><?php echo $ficheEstab['PrizeDoubleRoom'];?></li>
                            <?php }?>

                             <li><div style="text-align:center; margin-top: 3%"><span><i class="fa fa-map-marker"></i> : </span><a class="white" style="font-weight: bold ;" href=
                                "http://google.com/maps/?q=<?php echo $ficheEstab['AdLatitude'].','.$ficheEstab['AdLongitude']?>">
                                Localiser sur Google Maps</a></div></li>
                            <?php include("design/google-map.php"); ?>
                            <style>#map_canvas { width:90%; height: 300px; margin: 0 auto; vertical-align: text-top}</style>
                            <div id="map_canvas"></div>

                            </ul>
                        </div>
                    </div>
                    <div class="comments">
                        <ul class="comments-list">
                            <?php if (isset($_SESSION['nickname'])) {?>
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"><img src="<?php 
                                    echo $_SESSION['pic']; ?>" alt=""></div> 
                                    <!-- Conteneur d'un commentaire -->
                                    <div class="comment-box">
                                        <form method="post" action="aftercomment.php?estabID=<?php echo $_GET['estabID']; ?>" enctype="multipart/form-data">
                                            <div class="comment-head">

                                                <div class="stars write"> 
                                                <!-- pourquoi design marche pas si on met pas les memes name ?--> 
                                                    <input class="star" id="star-5" type="radio" value="5" name="star"/>
                                                    <label class="star" for="star-5"></label>
                                                    <input class="star" id="star-4" type="radio" value="4" name="star"/>
                                                    <label class="star" for="star-4"></label>
                                                    <input class="star" id="star-3" type="radio" value="3" name="star"/>
                                                    <label class="star" for="star-3"></label>
                                                    <input class="star" id="star-2" type="radio" value="2" name="star"/>
                                                    <label class="star" for="star-2"></label>
                                                    <input class="star" id="star-1" type="radio" value="1" name="star"/>
                                                    <label class="star" for="star-1"></label>
                                                </div>
                                                <button type="submit" class="button blue small" title="Poster">
                                                    <i class="fa fa-chevron-right"></i>
                                                </button>
                                            </div>
                                            <div class="comment-content">
                                                <form>
                                                    <textarea class="w-comment" required name="comtext" placeholder="Votre commentaire..." ></textarea>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                            <p class="line"></p>

                            <?php foreach ($ficheComment as $fcomment) { 
                                $fcommentUser = $comment->getCreator($fcomment['CommentID']);
                                $fthumbs = $thumbs->getThumbs($fcomment['CommentID']); 
                                if (isset($_SESSION['userID'])) {
                                    $updown = $thumbs->getUpDown($_SESSION['userID'], $fcomment['CommentID']);
                                    $myupdown = $updown['UpDown'];
                                }
                                ?>
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"><img src="<?php 
                                    echo $fcommentUser['Pic']; ?>" alt=""></div> 
                                    <!-- Conteneur d'un commentaire -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name 
                                            <?php if ($fcommentUser['UserID'] == $_SESSION['userID']) {
                                                echo "by-author";}?>">
                                                <a href="fiche-membre.php?userID=<?php echo $fcommentUser['UserID'];?>">
                                            <?php echo $fcommentUser['Nickname'];?></a></h6>
                                            <span class="c-date"><?php echo //H:i
                                            date('d-m-Y',strtotime($fcomment['ComDate']));?></span>
                                            <div class="thumbs">
                                                <span><?php echo $fcomment['ComScore'];?></span>
                                                <i class="fa fa-star"></i>
                                                <?php if (isset($_SESSION['userID'])) { ?>
                                                <a href="afterthumbs.php?estabID=<?php 
                                                echo $_GET['estabID']; ?>&commentID=<?php 
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
                                                echo $_GET['estabID']; ?>&commentID=<?php 
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
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </article>
        </section>
    </body>
    </html>