
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-etablissements">
        <article class="fiche-edit">
            <div class="a-header"> 
                <h2 class="titre"><?php 
                if (isset($_POST['edit'])) {
                    echo "Editer (cafe)"; }
                else {
                    echo "Ajouter un cafe"; }?>
                </h2>
                <div class="fiche-container">
                    <div class="pictaginfos edit"> 
                            <form method="post" action="<?php 
                                if (isset($_POST['edit'])) {
                                    echo "afternew-cafe.php?estabID=" . $_GET['estabID']; }
                                else {
                                    echo "afternew-cafe.php"; }
                                    ?>" enctype="multipart/form-data"> 
                            <div class="pictag edit">
                                <img src="<?php if (empty($festab['Pic'])) {
                                    echo "view/pic/house.jpg";} else {
                                        echo $festab['Pic']; }?>" />
                                <label  class="custom-file-input file-blue">
                                    <input type="file" name="pic">
                                </label>
                                <button type="submit" class="o-button" name="connexion">
                                    <span>Appliquer</span>
                                </button>
                            </div>
                            <div class="infos edit">
                                <table class="t-form" border="0" cellpadding="4" cellspacing="3" width="10%">

                                 <?php include("new-estab.php");?>
                                 <tr>
                                     <td align="right">Fumeur</td>
                                     <td><input type="checkbox" name="smoking"
                                     <?php if (isset($festab)) { if ($festab['Smoking'] == 1) {
                                       echo "checked='checked'"; }}?>/></td>
                                 </tr>
                                 <tr>
                                     <td align="right">Snack</td>
                                     <td><input type="checkbox" name="snack" 
                                     <?php if (isset($festab)) { if ($festab['Snack'] == 1) {
                                       echo "checked='checked'"; }}?>/></td>
                                 </tr>
                             </tr>
                             <tr>
                                <td></td>
                                <td height="30">
                                    <input value="Reset" class="btnbg" type="reset">&nbsp;&nbsp;&nbsp;
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>
</section>
</body>
</html>