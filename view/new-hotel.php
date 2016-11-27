
<?php include("main-head.php");?>

<body>
  <?php include("main-header.php");?>

  <section class="s-etablissements">
    <article class="fiche-edit">
      <div class="a-header"> 
        <h2 class="titre"><?php 
          if (isset($_POST['edit'])) {
              echo "Editer (hotel)"; }
          else {
              echo "Ajouter un hotel"; }?>
        </h2>
        <div class="fiche-container">
          <div class="pictaginfos edit"> 
            <form method="post" action="<?php 
              if (isset($_POST['edit'])) {
                  echo "afternew-hotel.php?estabID=" . $_GET['estabID']; }
              else {
                  echo "afternew-hotel.php"; }
                  ?>" enctype="multipart/form-data"> 
              <div class="pictag edit"> 
              <img src="<?php if (empty($festab['Pic'])) {
                                    echo "view/pic/house.jpg";} else {
                                        echo $festab['Pic']; }?>" /> <?php //peut modif...?>
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
                   <td align="right"><span style="color:#FF0000">*</span><i class="fa fa-star"></i></td>
                   <td><input size="20" name="stars" maxlength="30" required class="input" type="text"
                   value="<?php if (isset($festab)) { echo $festab['Stars']; }?>" pattern="[0-5]{1}"></td>
                 </tr>
                 <tr>
                   <td align="right"><span style="color:#FF0000">*</span>Chambres</td>
                   <td><input size="20" name="bedrooms" maxlength="30" required class="input" type="text"
                   value="<?php if (isset($festab)) { echo $festab['Bedrooms']; }?>" pattern="[0-9]{1,}"></td>
                 </tr>
                 <tr>
                   <td align="right"><span style="color:#FF0000">*</span>Prix chambre double</td>
                   <td><input size="20" name="prizedoubleroom" maxlength="30" required class="input" type="text"
                   value="<?php if (isset($festab)) { echo $festab['PrizeDoubleRoom']; }?>" pattern="[0-9]{1,}"></td>
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