
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-rechercher">
        <article class="rechercher">
            <h2 class="titre"> recherche <?php echo $search?> </h2>

            <form class="s-element" method="post" action="requests.php" enctype="multipart/form-data">

                <?php if ($search == "etablissements") {?>
                <p class="dropdown">
                    <select class="dropdown-select italic" name="estab"> 
                        <option value="">Type...</option>
                        <option value="hotel">Hôtel</option>
                        <option value="restaurant">Restaurant</option>
                        <option value="cafe">Café</option>
                    </select>
                </p>
                <p class="field">
                    <input type="search" placeholder="Nom de l'établissement" name="estabname">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>
                <p class="field">
                    <input type="search" placeholder="Ville" name="estabcity">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>    
                <p class="field">
                    <input type="search" placeholder="Commune" name="estabzip">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>       
                <p class="field">
                    <input type="search" placeholder="Label" name="estabtag">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>    

                <p class="dropdown">
                    <select class="dropdown-select italic" onchange="divSelectCheck3(this, 'estabCheck121', 'estabCheck221', 'estabCheck321'); divSelectCheck3(this, 'estabCheck122', 'estabCheck221', 'estabCheck321'); divSelectCheck3(this, 'estabCheck123', 'estabCheck221', 'estabCheck321'); divSelectCheck3(this, 'estabCheck124', 'estabCheck221', 'estabCheck321');"> 
                        <option id="option" value="0">Suite...</option>
                        <option id="option" value="1">apprécié par un score de ...</option>
                        <option id="option" value="2">pour lesquels il y a au plus ... commentaires</option>
                        <option id="option" value="3">pour lesquels il y a au moins ... commentaires</option>
                    </select>
                </p>

                <p class="dropdown" id="estabCheck121" style="display:none;">
                    <select class="dropdown-select italic" name="estabScore"> 
                        <option id="option" value="">Etoiles...</option>
                        <option id="option" value="3">3</option>
                        <option id="option" value="4">4</option>
                        <option id="option" value="5">5</option>
                    </select>
                </p>
                <p class="dropText" id="estabCheck122" style="display:none;">... sur 5 par au moins ... utilisateur(s)</p>
                <p class="field" id="estabCheck123" style="display:none;">
                    <input type="search" placeholder="Nombre d'utilisateurs qui apprécie l'établissement..." name="estabUserNb">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>
                <p class="dropdown" id="estabCheck124" style="display:none;">
                    <select class="dropdown-select italic" onchange="divSelectCheck(this, 'estabCheck131');"> 
                        <option id="option" value="0">Suite...</option>
                        <option id="option" value="1">qui apprécie(nt) tous les établissements que ... apprécie</option>
                    </select>
                </p>
                <p class="field" id="estabCheck131" style="display:none;">
                    <input type="search" placeholder="Nom d'utilisateur..." name="estabUser">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>

                <p class="field" id="estabCheck221" style="display:none;">
                    <input type="search" placeholder="Nombre de commentaires maximum..." name="estabMaxComment">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>

                <p class="field" id="estabCheck321" style="display:none;">
                    <input type="search" placeholder="Nombre de commentaires minimum..." name="estabMinComment">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>
                <?php }

                else if ($search == "membres") {?>
                <p class="dropdown">
                    <select class="dropdown-select italic" name="droits"> 
                        <option value="">Utilisateur</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </p>
                <p class="field">
                    <input type="search" placeholder="Nom de l'utilisateur" name="userName">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>


                <p class="dropdown">
                    <select class="dropdown-select italic" name="userComment"> 
                        <option id="option" value="">Suite...</option>
                        <option id="option" value="1">n'ayant pas commenté tous les établissements qu'ils ont créé</option>
                    </select>
                </p>
                <p class="dropdown">
                    <select class="dropdown-select italic" onchange="divSelectCheck(this, 'userCheck121'); divSelectCheck(this, 'userCheck122'); divSelectCheck(this, 'userCheck123'); divSelectCheck(this, 'userCheck124');"> 
                        <option id="option" value="0">Suite...</option>
                        <option id="option" value="1">qui apprécie par un score de ... sur 5</option>
                    </select>
                </p>
                <p class="dropdown" id="userCheck121" style="display:none;">
                    <select class="dropdown-select italic" name="userScore"> 
                        <option id="option" value="">Etoiles...</option>
                        <option id="option" value="3">3</option>
                        <option id="option" value="4">4</option>
                        <option id="option" value="5">5</option>
                    </select>
                </p>
                <p class="dropText" id="userCheck122" style="display:none;">au moins ... établissement(s)</p>
                <p class="field" id="userCheck123" style="display:none;">
                    <input type="search" placeholder="Nombre d'établissements appréciés..." name="userEstabNb">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>
                <p class="dropdown" id="userCheck124" style="display:none;">
                    <select class="dropdown-select italic" onchange="divSelectCheck(this, 'userCheck131');"> 
                        <option id="option" value="0">Suite...</option>
                        <option id="option" value="1">apprécié par ...</option>
                    </select>
                </p>
                <p class="field" id="userCheck131" style="display:none;">
                    <input type="search" placeholder="Nom d'utilisateur..." name="userScoreName">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>

                <?php }
                else if ($search == "commentaires") {?>

                <p class="field">
                    <input type="search" placeholder="Mot(s) dans le commentaire..." name="commentText">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>
                <p class="field">
                    <input type="search" placeholder="Score minimum..." name="commentScore">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>
                <p class="field">
                    <input type="search" placeholder="Thumbs-up minimum..." name="commentThumbs">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>

                <?php }

                else if ($search == "tags") {?>

                <p class="field">
                    <input type="search" placeholder="Mot(s) dans le tag..." name="tagName">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>
                <p class="field">
                    <input type="search" placeholder="appliqués à au moins ... établissements" name="tagNb">
                    <i class="fa fa-search-plus icon-large"></i>
                </p>

                <?php }?>

                <button type="submit" class="o-button" name="search">
                    <span><i class="fa fa-search"></i> Rechercher</span>
                </button>
            </form>
        </article>
    </section>
</body>
</html>