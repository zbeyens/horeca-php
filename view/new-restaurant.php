
<?php include("main-head.php");?>

<body>
    <?php include("main-header.php");?>

    <section class="s-etablissements">
        <article class="fiche-edit">
            <div class="a-header"> 
                <h2 class="titre"><?php 
                  if (isset($_POST['edit'])) {
                      echo "Editer (restaurant)"; }
                  else {
                      echo "Ajouter un restaurant"; }?>
                </h2>
                <div class="fiche-container">
                    <div class="pictaginfos edit"> 
                        <form method="post" action="<?php 
                                if (isset($_POST['edit'])) {
                                    echo "afternew-restaurant.php?estabID=" . $_GET['estabID']; }
                                else {
                                    echo "afternew-restaurant.php"; }
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
                                       <td align="right"><span style="color:#FF0000">*</span><i class="fa fa-money"></i> Plat</td>
                                       <td><input size="20" name="pricerange" maxlength="30" required class="input" type="text" pattern="[0-9]{1,}" value="<?php if (isset($festab)) { echo $festab['PriceRange']; }?>"></td>
                                   </tr>
                                   <tr>
                                       <td align="right"><span style="color:#FF0000">*</span>Places banquet</td>
                                       <td><input size="20" name="banquetcapacity" maxlength="30" required class="input" type="text" pattern="[0-9]{1,}" value="<?php if (isset($festab)) { echo $festab['BanquetCapacity']; }?>"></td>
                                   </tr>
                                   <tr>
                                       <td align="right">À emporter</td>
                                       <td><input type="checkbox" name="takeaway" 
                                       <?php if (isset($festab)) { if ($festab['TakeAway'] == 1) {
                                       echo "checked='checked'"; }}?> /></td>
                                   </tr>
                                   <tr>
                                       <td align="right">Livraison</td>
                                       <td><input type="checkbox" name="delivery"
                                       <?php if (isset($festab)) { if ($festab['Delivery'] == 1) {
                                       echo "checked='checked'"; }}?> /></td>
                                   </tr>
                                   <tr>
                                       <td align="right">Fermeture</td>
                                       <td> <table class="t-horaire">
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
                                                <td><input type="checkbox" name="lun_am" /></td>
                                                <td><input type="checkbox" name="mar_am" /></td>
                                                <td><input type="checkbox" name="mer_am" /></td>
                                                <td><input type="checkbox" name="jeu_am" /></td>
                                                <td><input type="checkbox" name="ven_am" /></td>
                                                <td><input type="checkbox" name="sam_am" /></td>
                                                <td><input type="checkbox" name="dim_am" /></td>
                                            </tr>
                                            <tr>
                                                <td>pm</td>
                                                <td><input type="checkbox" name="lun_pm" /></td>
                                                <td><input type="checkbox" name="mar_pm" /></td>
                                                <td><input type="checkbox" name="mer_pm" /></td>
                                                <td><input type="checkbox" name="jeu_pm" /></td>
                                                <td><input type="checkbox" name="ven_pm" /></td>
                                                <td><input type="checkbox" name="sam_pm" /></td>
                                                <td><input type="checkbox" name="dim_pm" /></td>
                                            </tr>
                                        </tbody>
                                    </table></td>
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
    </article>
</section>
</body>
</html>