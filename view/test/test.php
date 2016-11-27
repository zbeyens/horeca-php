<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="styletest.css" />
        <title>Annuaire d'établissements horeca</title>
    </head>
    <body>
        <h1>Balises </h1>
        <h2 id="ancre">Balises paires :</h2>
        <p>
            h1 : titre très immportant <br />
            h2 à h6 : titres de moins en moins importants <br />
            p  : paragraphes <br />
            br : saut de ligne <br /> <br />

            <em>em</em> : italique <br />
            <strong>strong</strong> : important <br />
            <mark>mark</mark> : marquer le texte <br />
            !!! : HTML pour le fond, CSS pour la forme. Le fond sert pour les recherches Google. <br /> 

            <ul><li>ul, li : liste non ordonnée, une puce par li </li></ul>
            <ol><li>ol, li : liste ordonnée, une puce par li </li></ol>

            a href="", renvoi vers un autre <a href="mailto:miyuki_ziyad@hotmail.com">site</a> ou <a href="test.php">page html</a><br />
            h2 id="...", a href="#..." renvoi vers l'
            <a href="#ancre" title="infobulle" target="_blank"> 
            ancre 
            </a>,
            vers une autre page "test.html#ancre". title="infobulle". target="_blank" pour ouvrir dans une new window. href="mailto:miyuki_ziyad@hotmail.com" ou fichier.ext pour télécharger.<br /> <br />

<!-- commentaire -->
            css: selecteur { propriété: valeur; } <br />
            dans les balises: class ou id pour distinguer des parties (pour le css) <br />
            l'id ne peut être utilisé qu'une seule fois, à utiliser quand c'est unique. <br />
            span class="..." : balise universelle de type inline (famille em, strong)<br />
            div class="..." : balise universelle de type block (famille p, h1) <br /> <br />

            selecteurs : p, h1, em, .class, #id, * (= sélecteur universel, toutes les balises), h3 em 
            (= balises em dans h3), h3 + p (= balises p après h3), a[title], a[title="Valeur"], a[title*="ici"] (= l'attribut doit contenir au moins "ici"). <br /> <br />

            css propriétés : taille absolue :<span class="un">font-size: 16px;</span> <br />
            taille relative : font-size: xx-small, x-small, small, medium, large, 0.8em <span class="b">font-size: small;</span> <br />
            font-family: police1, police2 (essaie la police2 si l'user ne l'a pas) <br />
            @font-face : polices personnalisées... <br />
            font-style: <span class="c"> italic </span> (ou) <span class="d">oblique</span> (ou) normal <br />
            font-weight: <span class="e">bold</span> (ou) normal <br />
            text-decoration: <span class="f">underline</span>, line-through (barré), overline, blink (clignotant), none <br />
            text-align: left, center, right, justify <br /><br />

            flottants (autour d'un texte): float: left, right (à un block (ex: image) précédent le block texte)<br />
            clear: both; <br />
            background-color: <br />
            

            <form> yo </form>
            <fieldset> yo </fieldset>
            <figure><textarea> hey </textarea><figcaption>figure, figcaption</figcaption></figure>
            <input value="OK" type="submit"/> 

        </p>

        <h2> Balises impaires :</h2>   
        <p>
            br : saut de ligne
        </p>
        <ul>
        <li style="color: blue;">Texte en bleu</li>
        <li style="color: red;">Texte en rouge</li>
        <li style="color: green;">Texte en vert</li>
        </ul>
    </body>
</html>