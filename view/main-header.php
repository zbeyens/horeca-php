<header class="lightgray">
    <ul class="menu">

        <li class="menu-el"><a href="index.php">accueil</a></li>
        <li class="menu-el">
        <?php 
        if (!isset($_SESSION['nickname'])) {?>
        <a href="inscription.php">inscription</a></li>
        <li class="menu-el"><a href="connexion.php">connexion
        <?php } ?>

        <?php 
        if (isset($_SESSION['nickname'])) {?>
        <a href="<?php echo "fiche-membre.php?userID=" . $_SESSION['userID'];?>">profil</a></li>
        <li class="menu-el"><a href="afterdeconnexion.php">déconnexion
        <?php } ?>

        </a></li>
        <li class="menu-el"><a>établissements</a>
            <ul class="sous-menu avant-plan">
                <li class="sous-menu-el">
                    <i class="fa fa-hotel"></i>
                    <a href="hotels.php">hôtels</a>
                </li>
                <li class="sous-menu-el">
                    <i class="fa fa-cutlery"></i>
                    <a href="restaurants.php">restaurants</a>
                </li>
                <li class="sous-menu-el">
                    <i class="fa fa-coffee"></i>
                    <a href="cafes.php">cafés</a>
                </li>
            </ul>
        </li>
        <li class="menu-el"><a href="membres.php">membres</a></li>
        <li class="menu-el"><a>rechercher</a>
            <ul class="sous-menu avant-plan">
                <li class="sous-menu-el search">
                    <i class="fa fa-home"></i>
                    <a href="search-estab.php">établissements</a>
                </li>
                <li class="sous-menu-el search">
                    <i class="fa fa-users"></i>
                    <a href="search-users.php">membres</a>
                </li>
                <li class="sous-menu-el search">
                    <i class="fa fa-comment"></i>
                    <a href="search-comments.php">commentaires</a>
                </li>
                <li class="sous-menu-el search">
                    <i class="fa fa-hashtag"></i>
                    <a href="search-tags.php">tags</a>
                </li>
            </ul>
        </li>
 
    </ul>
    <div class="marque"><span class="lightblue">ZH</span><span class="white">OREC</span><span class="lightblue">A</span> </div>
</header>

<?php 
if (isset($_SESSION['error'])) {?>
<div class="error"><img src="view/pic/knobs/errorb.png" />
<?php foreach ($_SESSION['error'] as $error) {
    echo $error . " "; }
    unset($_SESSION['error']); }?>
</div>